<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public $name;
    public $email;
    public $password;
    public $selectRole;
    public ?User $user;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'selectRole' => 'required'
    ];

    public function addUser()
    {
        $this->validate();

        $addUser = new User();
        $addUser->name = $this->name;
        $addUser->email = $this->email;
        $addUser->password = Hash::make($this->password);
        $addUser->save();
        $addUser->assignRole($this->selectRole);
        // dd($this->selectRole);

        $this->reset();
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->selectRole = $user->getRoleNames()[0];
    }

    public function editUser(User $user)
    {

        $this->user = $user;

        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|string|min:8',
            'selectRole' => 'required'
        ]);
        $user->update($validatedData, [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->syncRoles($this->selectRole);
    }

    // public function editUser($id)
    // {
    // }
}
