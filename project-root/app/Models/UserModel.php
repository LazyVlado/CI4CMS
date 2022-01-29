<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    public $table = 'user';
    public $primaryKey = 'userID';
    public $allowedFields = [
        'username',
        'email',
        'password',
        'created_date',
        'rights'
    ];
}