<?php

namespace App\Livewire\V1\Auth;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Mary\Traits\Toast;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;

#[Layout('components.layouts.admin')]

class Login extends Component
{
    use Toast;

    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];


     public function mount()
    {
        // It is logged in
        if (auth()->user()) {
            return redirect('/dashboard');
        }
    }


    public function login()
    {
        //$this->rateLimit();
        $credentials = $this->validate();

        
        if (Auth::attempt($credentials)) {
            
            return redirect()->intended('dashboard');

            $this->success('Vous êtes connecté avec succès.', timeout: 5000);

        } else {
            //session()->flash('error', 'Invalid credentials.');
            $this->error('Identifiants invalides. Veuillez réessayer.', timeout: 5000);
            $this->reset(['password']); // Reset password field after failed login
        }  
    }     
     
    protected function rateLimit()
        {
        $key = 'login-attempt:' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            throw ValidationException::withMessages([
                'email' => __('Trop de tentatives. Réessayez dans :seconds secondes.', [
                    'seconds' => RateLimiter::availableIn($key),
                ]),
            ]);
        }

        RateLimiter::hit($key, 60);
        
    }
    

    


    public function render()
    {
         if (auth()->check()) {
        return redirect()->to('/dashboard');
    }
        return view('livewire.v1.auth.login');
    }
}
