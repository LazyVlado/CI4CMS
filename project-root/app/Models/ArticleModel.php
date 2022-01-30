<?php

namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class ArticleModel extends Model
{
    public $table = 'article';
    public $primaryKey = 'pageID';
    public $allowedFields = [
        'article',
        'relatedArticles',
        'isNovelty'
    ];


//    public $db;
//    public function __construct(?ConnectionInterface &$db = null, ?ValidationInterface $validation = null)
//    {
//        parent::__construct($db, $validation);
//        $this->db = $db;
//    }
//
//    public function getPageTypeData( $pageID ){
//        $ageTypeData = array(
//            'styles' => array(
//
//            ),
//            'scripts' => array(
//
//            ),
//        );
//        $article = $this->db->query("SELECT * FROM article a JOIN page p ON p.pageID = a.pageID WHERE a.pageID = '" . $pageID . "'");
//        $dbData = $article->getResultArray();
//        $ageTypeData = array_merge($ageTypeData, $dbData[0]);
//        return $ageTypeData;
//    }

}