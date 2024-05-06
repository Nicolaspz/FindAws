<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',


     ];
    public function muncicipio() {
        return $this->hasMany(municipio::class);
    }
}
