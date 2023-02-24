<?php

namespace App\Models;

use CodeIgniter\Model;

class M_login extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['user_uniq', 'user_nama', 'user_telp', 'user_alamat', 'user_email', 'user_username', 'user_password', 'user_role', 'user_updated'];
}