<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use PhpParser\Builder\Property;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function rules($id = null) {
        return [
            'name'    => 'required|min:5|max:20',
        ];
    }
    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }

    public function getBusiness() {

        return $this->hasMany(Property::class);
    }
}
