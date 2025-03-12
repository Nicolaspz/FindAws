<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{ use HasFactory;

    protected $fillable = ['property_id', 'url', 'title', 'order', 'type'];

    // ✅ Conversão automática de JSON para array
    protected $casts = [
        'url' => 'array', // Agora `url` armazena múltiplos valores
    ];

    // ✅ Regras de validação ajustadas
    public function rules() {
        return [
            'property_id'   => 'required|exists:properties,id',
            'files'         => 'required',
            'files.*'       => 'mimes:jpg,jpeg,png,webp,webm,mp4', // Corrigido para `files.*`
            'title'         => 'max:100',
            'order'         => 'integer',
            'type'          => 'integer'
        ];
    }

    public function updateRules() {
        return [
            'title'         => 'max:100',
            'order'         => 'integer',
            'type'          => 'integer'
        ];
    }

    public function feedback() {
        return [
            'files.*.mimes' => 'O arquivo deve ser uma imagem ou vídeo do tipo PNG, JPG, JPEG, WEBP, WEBM ou MP4'
        ];
    }

    public function property() {
        return $this->belongsTo(Propertie::class);
    }

    // ✅ Remover arquivos do storage ao excluir o registro
    public function removeFiles() {
        if (!empty($this->url)) {
            foreach ($this->url as $file) {
                if (Storage::disk('public')->exists($file)) {
                    Storage::disk('public')->delete($file);
                }
            }
        }
    }

    // ✅ Atualizar a ordem das imagens mantendo a lógica anterior
    public function updateImages($images, $propertyId, $type) {
        $oldImages = $this->where('property_id', $propertyId)->where('type', $type)->pluck('id')->toArray();

        foreach ($oldImages as $img) {
            if (!in_array($img, $images)) {
                $imageToRemove = $this->find($img);
                $imageToRemove->removeFiles(); // Remove os arquivos do disco
                $imageToRemove->delete();
            }
        }

        foreach ($images as $k => $img) {
            $newImg = $this->find($img);
            $newImg->order = $k;
            $newImg->save();
        }

        return true;
    }
}