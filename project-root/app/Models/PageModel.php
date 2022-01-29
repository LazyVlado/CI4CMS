<?php

namespace App\Models;
//use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
//use CodeIgniter\Validation\ValidationInterface;

class PageModel extends Model
{
    public $table = 'page';
    public $primaryKey = 'pageID';
    public $allowedFields = [
        'parentPageID',
        'allParentPageIDs',
        'lang',
        'pageUri',
        'pageType',
        'pageName',
        'pageTitle',
        'metaDescription',
        'metaIndex',
        'metaFollow',
        'state',
        'annotation',
        'imgSrc',
        'created',
        'lastUpdate',
        'publishDateFrom',
        'publishDateTo',
        'sort',
        'userPermissionsLevel'
    ];


}