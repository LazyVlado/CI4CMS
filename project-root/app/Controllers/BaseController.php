<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SettingsModel;
use App\Models\PageModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */

//    public function __construct()
//    {
//        dmp($page);

//        $model = new UserModel();
//        $model->delete(1);
//        $this->setDictionary();
//        $config = config('Paths');
//        $this->viewPath = __DIR__ . '/../../public/themes/' . THEME;

//    }

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->setSettings();
        helper(['My_helper']);
//        $session = session();
        $page = $this->getPageByPageUri();

        if($page){
            echo view('common/header' , $page);
            echo view('' . $page['view'] , $page);
            echo view('common/footer' , $page);
            die;
        }

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }


    public function getPageByPageUri(){
        $uri = current_url(true);
        $lastSegmentIndex = $uri->getTotalSegments();
        $uriString = $uri->getPath();
        $lastUriSegment = $uri->getSegment($lastSegmentIndex);
        while( is_numeric( $lastUriSegment )){
            $uriString = str_replace( '/' . $lastUriSegment , '' , $uriString );
            $lastSegmentIndex --;
            $lastUriSegment = $uri->getSegment($lastSegmentIndex);
        }

        $page = new PageModel();
        $pageData = $page->where('pageUri', $uriString)->first();
        if(empty($pageData)){
            return false;
        }
        $pageData['view'] = strtolower( $pageData['pageType'] );
        $pageTypeModel = model('App\Models\\' . camelize($pageData['pageType']) . 'Model', false);

        if($pageTypeModel && $pageTypeModel->table) {
//            $pageData['pageTypeData'] = $pageTypeModel->where('pageID', $pageData['pageID'])->first();
            $pageTypeData = $pageTypeModel->where('pageID', $pageData['pageID'])->first();
            $pageData = array_merge($pageData, $pageTypeData);
        }
        elseif($pageTypeModel && !$pageTypeModel->table) {
//            $pageData['pageTypeData'] = $pageTypeModel->getPageTypeData( $pageData['pageID'] );
            $pageTypeData = $pageTypeModel->getPageTypeData( $pageData['pageID'] );
            $pageData = array_merge($pageData, $pageTypeData);
        }
        else{

        }
//        dmp($pageData);

        return $pageData;
    }


    public function setSettings(){
        $model = new SettingsModel();
        $settings = $model->where('lang', 'sk')->findAll();
        foreach($settings as $option){
            define($option['constantName'], $option['constantValue']);
            define($option['constantName'] . '_TITLE', $option['title']);
        }
    }

}
