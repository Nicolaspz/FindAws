<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

        return $this->belongsTo(Propertie::class, 'properties_id');
    }

    public static function visitsByProperty()
    {
        return Visit::query()
            ->select('properties.reference', DB::raw('COUNT(visits.id) as total_visits'))
            ->join('properties', 'visits.properties_id', '=', 'properties.id')
            ->groupBy('properties.reference')
            ->orderBy('total_visits', 'desc')
            ->get();
    }
}
