<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;
  protected $table = 'roles';

  public function users()
  {
    $relation = Identitas::select(['roles.*', 'identitas.*'])->join("identitas", "roles.id", "=", "identitas.role_id");
    return $relation;
  }
}
