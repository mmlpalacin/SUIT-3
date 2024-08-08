<?php

namespace App\Policies;

use App\Models\Anuncio;
use App\Models\User;

class AnuncioPolicy
{
    public function author(User $user, Anuncio $anuncio){
        if($user->id==$anuncio->user_id){
            return true;
        }else{
            return false;
        }
    }
    
    public function __construct()
    {
        //
    }
}
