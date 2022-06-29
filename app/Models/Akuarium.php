<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akuarium extends Model
{
    use HasFactory;
    use Sluggable;

    // protected $fillable = ['nama_ikan', 'jumlah_ikan', 'harga_ikan'];
    protected $guarded = ['id'];
    protected $with = ['kategori'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_ikan', 'like', '%' . $search . '%')->
            orWhere('kode_akuarium', 'like', '%' . $search . '%')->
            orWhere('jumlah_ikan', 'like', '%' . $search . '%')->
            orWhere('harga_ikan', 'like', '%' . $search . '%');
        });


        $query->when($filters['kategori'] ?? false, function($query, $kategori){
            return $query->whereHas('kategori', function($query) use ($kategori){
                $query->where('slug', $kategori);
            });
        });
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function pengiriman(){
        return $this->hasMany(Pengiriman::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
