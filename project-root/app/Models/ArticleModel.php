<?php

namespace App\Models;
use CodeIgniter\Model;

class ArticleModel extends Model
{
    public $table = 'article';
    public $primaryKey = 'pageID';
    public $allowedFields = [
        'article',
        'relatedArticles',
        'isNovelty'
    ];
}