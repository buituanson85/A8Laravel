<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = "permissions";

    protected $fillable = [
        "name","url","icon"
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'role_permission');
    }
}
