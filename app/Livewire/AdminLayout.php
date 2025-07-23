<?php

namespace App\Livewire;

use Livewire\Component;

#[Layout('components.layouts.admin')]
class AdminLayout extends Component
{
    public function render()
    {
        return view('livewire.admin-layout');
    }
}
