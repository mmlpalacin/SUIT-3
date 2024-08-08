<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Anuncio;
use Livewire\WithPagination;

class AnuncioIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
     
    public function updatingSearch()
    {
        $this->resetPage();
    }
     
    public function render()
    {
        return view('livewire.anuncio-index', [
            'anuncios' => Anuncio::where('user_id', auth()->user()->id)
            ->where('title', 'like', '%'.$this->search.'%')->latest('id')->paginate(),//busca lo similar sin importar lo que est adelante o atras
        ]);
    }
}
