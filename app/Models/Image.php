<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'url', 'title', 'order', 'type'];

    public function rules() {

        return [
            'property_id'   => 'required|exists:properties,id',
            'files'         => 'required',
            'url.*'       => 'mimes:jpg,jpeg,png,webp,webm,mp4',
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
            'files.*.mimes' => 'O arquivo deve ser uma imagem ou video do tipo PNG, JPG, JPEG, WEBP, WEBM, ou MP4'
        ];
    }

    public function property() {
        return $this->belongsTo(Propertie::class);
    }

    /*public function removeFile() {
        if (Storage::disk('public')->exists($this->url)) {
            Storage::disk('public')->delete($this->url);
        }
    }

    public function updateImages($images, $propertyId, $type) {

        $oldImages = $this->select('id')->where('property_id', $propertyId)->where('type', $type)->get()->toArray();
        foreach($oldImages as $img) { // Verify remoded media to remove storage files
            if (!in_array($img['id'], $images)) {
                $imageToRemove = $this->find($img['id']);
                if (Storage::disk('public')->exists($imageToRemove->url)) {
                    Storage::disk('public')->delete($imageToRemove->url);
                }
                $imageToRemove->delete();
            }
        }

        foreach($images as $k => $img) {
            $newImg = $this->find($img);
            $newImg->order = $k;
            $newImg->save();
        }

        return true;
    }*/
}
