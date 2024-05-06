<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function rules($id = null) {
        return [
            'name' => "required|min:3|max:20"
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }
}
