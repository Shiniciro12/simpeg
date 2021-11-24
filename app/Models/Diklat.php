<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diklat extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $table = 'diklat';
    protected $primaryKey = 'diklat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['diklat_id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama', 'like', '%'.$search.'%')->orWhere('penyelenggara', 'like', '%'.$search.'%');
        });
    }

}
