<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Propertie extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Verifica se há um usuário autenticado
            if (Auth::check()) {
                // Define o ID do usuário autenticado como o ID do usuário para este modelo
                $model->user_id = Auth::id();
            }

            $model->reference = sprintf('%6d', rand(900000, 999999)); // String aleatória com 10 dígitos
            $model->publish=false;
        });
    }
    use HasFactory;
    protected $fillable = [
        'user_id',
        'reference',
        'business_id',
        'tipologies_id',

        'property_types_id',
        'price',
        'conditions_id',
        'tipe_energies_id',
        'lng',
        'lat',
        'title',
        'abstract',
        'description',
        'distritos_id',
        'municipios_id',
        'provinces_id',
        'cidade',
        'area',
        'ano_construcao',
        'quarto',
        'banheiro',
        'ar_condicionado',
        'roupeiro_imbutido',
        'elevator',
        'park',
        'jardin',
        'piscina',
        'terraco',
        'dispensa',
        'propiedade_acessivel',
        'reservedo',
        'negociavel',
        'visible_until',
        'publish',
        'destaque',
        'order',
        'technical_details_img',
        'the_project',
        'the_renders',
        'movie'
    ];
    protected $casts = [
        'visible_until' => 'datetime:Y-m-d'
    ];

    public function rules() {
        return [
            'user_id'                   => 'required|exists:users,id',
            'reference'                 => "required|size:6",
            'business_id'               => 'exists:businesses,id',
            'tipologies_id'               => 'exists:tipologies,id',

            'property_types_id'           => 'exists:property_types,id',
            'price'                     => 'integer|nullable|between:1,99999999',
            'conditions_id'              => 'exists:conditions,id',
            'tipe_energies_id'     => 'exists:tipe_energies,id',
            'lng'                       => 'numeric|nullable',
            'lat'                       => 'numeric|nullable',
            'title'                     => 'max:100',
            'abstract'                  => 'max:1000',
            'description'               => 'max:1000',
            'distritos_id'               => 'exists:districts,id',
            'municipios_id'                 => 'exists:counties,id',
            'provinces_id'              => 'exists:freguesias,id',
            'cidade'                      => 'max:100',
            'area'                      => 'integer|nullable',
            'ano_construcao'                      => 'integer|between:1050,2050|nullable',
            'quarto'                   => 'integer|nullable',
            'banheiro'                  => 'integer|nullable',
            'ar_condicionado'          => 'boolean',
            'roupeiro_imbutido'          => 'boolean',
            'elevator'                  => 'boolean',
            'park'                   => 'integer|nullable',
            'jardin'                    => 'boolean',
            'piscina'             => 'boolean',
            'terraco'                   => 'boolean',
            'dispensa'              => 'boolean',
            'propiedade_acessivel'       => 'boolean',
            'reservedo'                      => 'boolean',
            'negociavel'                  => 'boolean',
            'visible_until'             => 'date|nullable',
            'publish'                   => 'boolean',
            'order'                     => 'integer|nullable',
            'technical_details_img'     => 'mimes:jpg,jpeg,png',
            'the_project'               => 'mimes:pdf,zip',
            'the_renders'               => 'mimes:pdf,zip',
            'movie'                     => 'mimes:mp4,webp',
        ];
    }
    public function getTechnicalDetailsImgUrlAttribute()
    {
    return Storage::url($this->technical_details_img);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function images() {
        return $this->hasMany(Image::class)->orderBy('order', 'asc');
    }

    public function visitas() {
        return $this->hasMany(Visit::class);
    }

     public function regional_points() {
        return $this->hasMany(Image::class);
    }


    public function business() {
        return $this->belongsTo(Business::class);
    }
    public function business_name() {
        return $this->belongsTo(Business::class)->select('name');
    }

    public function tipologies() {
        return $this->belongsTo(Tipologies::class);
    }

    public function property_types() {
        return $this->belongsTo(PropertyTypes::class);
    }

    public function conditions() {
        return $this->belongsTo(Condition::class);
    }

    public function tipe_energies() {
        return $this->belongsTo(TipeEnergie::class);
    }

    public function distrito() {
        return $this->belongsTo(Distrito::class);
    }

    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function municipio() {
        return $this->belongsTo(Municipio::class);
    }




}
