<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriItem extends Model
{
    protected $fillable = ['kode', 'nama'];
    use HasFactory;

    public function masterItems()
    {
        return $this->belongsToMany(MasterItem::class, 'kategori_master_item', 'kategori_item_id', 'master_item_id');
    }
}
