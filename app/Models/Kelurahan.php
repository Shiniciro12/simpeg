<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'kelurahan_id';
    protected $table = 'kelurahan';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['kelurahan_id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_kelurahan', 'like', '%'.$search.'%');
        });
    }

}
