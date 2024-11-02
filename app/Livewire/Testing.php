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
        $this->validate([
            'name'=>'required|min:4',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        $this->reset(['name','email','password']);
        session()->flash('message', 'Registration Successful');

    }
    public function render()
    {
        return view('livewire.testing',
        [
            'users'=> User::all(),
        ]);
    }
}

