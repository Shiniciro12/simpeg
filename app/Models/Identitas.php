<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Identitas extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'identitas_id';
    protected $table = 'identitas'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];


    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama', 'like', '%'.$search.'%')->orWhere('nip', 'like', '%'.$search.'%');
        });
    }

}
