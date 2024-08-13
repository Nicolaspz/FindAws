<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'phone',
        'info',
        'properties_id',
        'data_vista',
        'data_confirm',
        'status',
    ];
    public function propertie() {
        return $this->belongsTo(propertie::class);
    }
}
