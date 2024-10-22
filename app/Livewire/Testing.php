<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Testing extends Component
{
    public $name='';
    public $email='';
    public $password='';

    public function register()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

    }
    public function render()
    {
        return view('livewire.testing');
    }
}

