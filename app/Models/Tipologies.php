<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipologies extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function getTypologies() {
        return $this->select(['id','name'])->get()->toArray();
    }
}
