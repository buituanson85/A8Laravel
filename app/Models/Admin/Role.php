<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = "roles";

    protected $fillable = [
        "name"
    ];

    public function users(){
        return $this->belongsToMany(User::class,'user_role');
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permission');
    }
    public function groups(){
        return $this->hasMany(Group::class);
    }
}
