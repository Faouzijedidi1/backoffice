<?php

namespace Outdare\Backoffice\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Outdare\Backoffice\Traits\Navigation;
use Config;
use Log;
use Lang;

class Index extends Controller
{
  use Navigation;
  public function index()
  {
    $title = Lang::get('auth.title');
    if($title == 'auth.title')
    {
      $title = Lang::get('backoffice::auth.title');
    }
    $data = array(
      'mainDivId' => 'main',
      'title' => $title,
      'dashbordName' => $title,
      'pageConfig' => [],
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }

  public function newsletter(){
    $pageConfig = Config::get('backoffice::backoffice.newsletter.newsletter_list');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.newsletter.newsletter_edit');

    $title = Lang::get('auth.title');
    if($title == 'auth.title')
    {
      $title = Lang::get('backoffice::auth.title');
    }

    $data = array(
      'mainDivId' => 'main',
      'title' => $title,
      'dashbordName' => $title,
      'pageConfig' => $pageConfig,
      'package_name' => 'newsletter',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }

  public function helpdesk() {
    $pageConfig = Config::get('backoffice::backoffice.helpdesk.helpdesk_page');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.helpdesk.helpdesk_page');

    $title = Lang::get('auth.title');
    if($title == 'auth.title')
    {
      $title = Lang::get('backoffice::auth.title');
    }

    $data = array(
      'mainDivId' => 'main',
      'title' => $title,
      'dashbordName' => $title,
      'pageConfig' => $pageConfig,
      'package_name' => 'helpdesk',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }
}
