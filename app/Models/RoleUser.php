<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $guarded = ['id_role_user'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'id_user','id');
    }
    
}
