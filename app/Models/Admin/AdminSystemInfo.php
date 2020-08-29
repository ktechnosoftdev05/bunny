<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminSystemInfo extends Model
{
    protected $table = 'admins_system_infos';
    protected $fillable = ['admin_id','ip','device','browser'];
}
