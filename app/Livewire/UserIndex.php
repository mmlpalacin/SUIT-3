<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    public $search = '';
    public $roleSeleccionado = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $roles = Role::all(); 
        
        $role = Role::where('name', $this->roleSeleccionado)->first();
    
    $usersQuery = User::query()->with('roles');

    if ($role) {
        $usersQuery->whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role->name);
        });
    }

    $usersQuery->where(function ($query) {
        $query->where('email', 'like', '%'.$this->search.'%')
              ->orWhere('name', 'like', '%'.$this->search.'%')
              ->orWhere('lastname', 'like', '%'.$this->search.'%');
    });

    $users = $usersQuery->latest('id')->paginate();

            return view('livewire.user-index', compact('users', 'roles'));
    }
}