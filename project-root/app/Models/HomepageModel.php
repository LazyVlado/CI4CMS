<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Models\ArticleModel;


class HomepageModel extends Model
{
//    public $table = 'article';
//    public $primaryKey = 'pageID';
//    public $allowedFields = [
//        'article',
//        'relatedArticles',
//        'isNovelty'
//    ];
//    public $additionalData;
    public $db;

    public function __construct(?ConnectionInterface &$db = null, ?ValidationInterface $validation = null)
    {
        parent::__construct($db, $validation);
        $this->db = $db;
    }

    public function getPageTypeData( $pageID ){
        $ageTypeData = array(
            'styles' => array(

            ),
            'scripts' => array(

            ),
        );
        $articles = $this->db->query("SELECT a.article, a.galleryID, p.pageName, p.pageUri FROM article a JOIN page p ON p.pageID = a.pageID limit 8");
        $dbData['articles'] = $articles->getResultArray();
//        dmp($dbData);
//        $ageTypeData = array_merge($ageTypeData, $dbData[0]);
        return $dbData;
    }

}