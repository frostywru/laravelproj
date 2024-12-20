<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Testing extends Component
{
    use WithPagination;
    public $name = '';
    public $email = '';
    public $password = '';
    public $userId = '';
    public $isEditModalOpen = false;
    public $isDeleteModalOpen = false;

    public function register()
    {
        sleep(2); // Simulate delay for loading spinner
        $this->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->reset(['name', 'email', 'password']);
        session()->flash('message', 'Registration Successful');
    }

    public function openEditModal($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isEditModalOpen = true;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email,' . $this->userId,
        ]);

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->reset(['name', 'email', 'userId']);
        $this->isEditModalOpen = false;

        session()->flash('message', 'User updated successfully');
    }

    public function openDeleteModal($id)
    {
        $this->userId = $id;
        $this->isDeleteModalOpen = true;
    }

    public function deleteUser()
    {
        User::findOrFail($this->userId)->delete();
        $this->reset(['userId']);
        $this->isDeleteModalOpen = false;

        session()->flash('message', 'User deleted successfully');
    }

    public function render()
    {
        return view('livewire.testing', [
            'users' => User::paginate(5),
        ]);
    }
}