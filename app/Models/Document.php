<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Document extends Model
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
        });
    }
    use HasFactory;
    protected $fillable = [

        'user_id',
        'original_name',
        'url',
        'status',
        'user_properties',
    ];

    public function rules($id = null) {
        return [
            'title'       => "required|min:3|max:100",
            'user_id'     => 'required|exists:users,id',
            'document.*'  => 'mimes:jpg,jpeg,png,pdf,xls,xlsx,csv,doc,docx,zip,rar'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'files.*.mimes' => 'O arquivo deve ser do tipo jpg|jpeg|png|pdf|xls|xlsx|csv|doc|docx|zip|rar'
        ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function propertie() {
        return $this->belongsTo(propertie::class);
    }

    public function getStatisticByStatus() {
        return DB::table('documents')
        ->selectRaw('documents.status, COUNT(*) as total')
        ->groupBy('documents.status')
        ->orderBy('documents.status', 'DESC')
        ->get();
    }
}
