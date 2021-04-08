<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = "groups";

    public function users(){
        return $this->belongsToMany(User::class,'user_group');
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
