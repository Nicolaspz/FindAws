<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'provincia_id',
     ];
    public function distrito() {
        return $this->hasMany(distrito::class);
    }

    public function provincia() {
        return $this->belongsTo(province::class);
    }
}
