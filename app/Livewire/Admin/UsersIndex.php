<?php

namespace App\Livewire\Admin;

use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search  ;

        
    //protected $listeners = ['prueba'];

    /*
    public function prueba (){
        dd('desde prueba');
    }
    */
    
    public function updatingSearch(){
        //logger($this->search);
       
        $this->resetPage();
    }
    
    public function render()
    {
        
        $users = User::where('name','LIKE','%'.$this->search.'%')
        ->orWhere('email','LIKE','%'.$this->search.'%')->paginate();

        return view('livewire.admin.users-index', compact('users'));
    }
}
