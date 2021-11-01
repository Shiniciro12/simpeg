<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class RiwayatJabatan extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'riwayat_jabatan_id';
    protected $table = 'riwayat_jabatan'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('no_sk', 'like', '%'.$search.'%');
        });
    }

}
