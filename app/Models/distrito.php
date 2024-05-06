<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distrito extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_distrito',
        'bairro',
        'municipio_id',
     ];
    public function municipio() {
        return $this->belongsTo(municipio::class);
    }
}
