<?php

namespace App\Livewire\Forms\Admin;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|email')]
    public $email = '';
 
    #[Validate('required|min:8')]
    public $password = '';
}
