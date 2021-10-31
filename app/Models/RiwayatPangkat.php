<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class RiwayatPangkat extends Model
{
    use HasFactory, Uuid;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'riwayat_pangkat_id';
    protected $table = 'riwayat_pangkat'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

}
