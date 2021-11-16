<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Identitas extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $primaryKey = 'identitas_id';
    protected $table = 'identitas';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['identitas_id', 'password'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%')->orWhere('nip', 'like', '%' . $search . '%');
        });
    }

    public function roles()
    {
        return Identitas::select("identitas.*", "roles.*")->join("roles", "roles.id", "=", "identitas.role_id");
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function hasRole($role_name)
    {
        return $this->roles()->where('identitas.identitas_id', '=', auth()->user()->identitas_id)->where('roles.role_name', '=', $role_name)->count() == 1;
    }
}
