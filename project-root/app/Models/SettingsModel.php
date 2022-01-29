<?php

namespace App\Models;
use CodeIgniter\Model;

class SettingsModel extends Model
{
    public $table = 'settings';
    public $primaryKey = 'lang, constantName';
    public $allowedFields = [
        'constantName',
        'appView',
        'constantValue',
        'title',
        'input',
    ];

    public function getDirectory(){
        return 'aaa';
    }
}