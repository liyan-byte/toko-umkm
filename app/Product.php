<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'seller_id', 'slug', 'images'
    ];

    // Handle upload foto baru
    public function handleFoto($request)
    {
        if ($request->hasFile('images')) {
            $file     = $request->file('images');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            return $filename; // hanya simpan nama file
        }
        return null;
    }

    // Handle update foto (hapus lama, simpan baru)
    public function updateFoto($request, $oldImage = null)
    {
        if ($request->hasFile('images')) {
            // hapus foto lama jika ada
            if ($oldImage && file_exists(public_path('uploads/' . $oldImage))) {
                unlink(public_path('uploads/' . $oldImage));
            }

            $file     = $request->file('images');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            return $filename;
        }
        return $oldImage; // kalau tidak ada upload baru, pakai yang lama
    }
}
