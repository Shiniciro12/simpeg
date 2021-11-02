<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'jabatan_id';
    protected $table = 'jabatan'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['jabatan_id'];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_jabatan', 'like', '%'.$search.'%')->orWhere('jenis_jabatan', 'like', '%'.$search.'%');
        });
    }

}
