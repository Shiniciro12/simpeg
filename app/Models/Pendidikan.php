<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Pendidikan extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'pendidikan';
    protected $primaryKey = 'pendidikan_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama_lembaga_pendidikan', 'like', '%' . $search . '%');
        });
    }
}
