<?php

namespace App\Livewire\Backend;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = "";
    #[Url]
    public $perPage = 10;
    #[Url(history: true)]
    public $shortRole = "";
    public $current_password;
    public $userName;
    public $confirmingUserAdd = false;
    public $confirmingUserEdit = false;
    public $confirmingUserDelete = false;



    public UserForm $form;

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function confirmUserAdd()
    {
        $this->confirmingUserAdd = true;
        $this->form->reset();
    }

    public function addUser()
    {
        $this->validate();

        $this->form->addUser();
        $this->confirmingUserAdd = false;
        flash()->success('User Created!');
    }

    public function confirmUserEdit($id)

    {
        $this->confirmingUserEdit = $id;
        $user = User::findOrFail($id);
        $this->form->setUser($user);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $this->form->editUser($user);
        $this->confirmingUserEdit = false;
        flash()->success('User Edited!');
    }

    public function confirmUserDelete($id)
    {

        $user = User::find($id);
        $this->confirmingUserDelete = $id;
        $this->userName = $user->name;
        $this->reset('current_password');
    }

    public function deleteUser($id)
    {
        $this->validateOnly('current_password', [
            'current_password' => 'required|string|current_password:web'
        ]);

        User::find($id)->delete();
        $this->confirmingUserDelete = false;
        flash()->success('User Deleted!');
    }

    public function render()
    {
        $users = User::Search($this->search)
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.*')
            ->when($this->shortRole !== '', function ($query) {
                $query->where("roles.name", $this->shortRole);
            })
            ->orderBy('roles.name')
            ->paginate($this->perPage);

        $roles = Role::orderBy('id', 'DESC')->get();

        // $users = User::whereHas("roles", function($q){ $q->where("name", $this->admin); })->paginate(5);

        return view('livewire.backend.users', [
            'users' => $users,
            'roles' => $roles,
        ])->layout('backend.layout.app');
    }
}
