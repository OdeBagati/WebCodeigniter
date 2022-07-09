<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Mdlproduct;
use App\Models\Mdlcategory;
use App\Models\Mdlgallery;
use App\Models\Mdlroute;
use App\Models\Mdlorder;
use App\Models\Mdldetailorder;
use App\Models\Mdluser;
use App\Models\Mdlpage;
use App\Models\Mdlpromotion;
use App\Models\Mdlreview;
use App\Models\Mdlgroup;
use App\Models\Mdlgroupuser;
use App\Models\Mdlpoint;
use App\Models\Mdlquestion;
use App\Models\Mdlanswer;
use App\Models\Mdlexchange;
use App\Models\Mdlpointexchange;
use App\Models\Mdlmaster;

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
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		$this->objProduct		= new Mdlproduct;
		$this->objCategory		= new Mdlcategory;
		$this->objGallery		= new Mdlgallery;
		$this->objRoute			= new Mdlroute;
		$this->objOrder			= new Mdlorder;
		$this->objDetailorder	= new Mdldetailorder;
		$this->objUser			= new Mdluser;
		$this->objPage			= new Mdlpage;
		$this->objPromotion		= new Mdlpromotion;
		$this->objReview		= new Mdlreview;
		$this->objGroup			= new Mdlgroup;
		$this->objGroupUser		= new Mdlgroupuser;
		$this->objPoint			= new Mdlpoint;
		$this->objQuestion		= new Mdlquestion;
		$this->objAnswer		= new Mdlanswer;
		$this->objExchange		= new Mdlexchange;
		$this->objPointExchange	= new Mdlpointexchange;
		$this->objMaster		= new Mdlmaster;
		
		$this->render 			= \Config\Services::renderer();
		$this->validation 		= \Config\Services::validation();
        $this->session          = \Config\Services::session();
        $this->request          = \Config\Services::request();

        helper(['url','form']);
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
	}
}
