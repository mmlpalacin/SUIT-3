<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class AnuncioRequest extends FormRequest
{
    public function authorize(): bool
    {
        if($this->user_id == auth()->user()->id){
            return true;
        }
        else{
            return false;
        }
    }

    public function rules()
    {

        $rules = [
            'title' => 'required',
            'status' => 'required|in:1,2'
        ];

        if($this->status == 2){
            $rules = array_merge($rules, [
                'body' => 'required',
                'published_at' => Carbon::now()
            ]);
        }

        return $rules;
    }
}
