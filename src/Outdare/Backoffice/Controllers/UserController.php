<?php

namespace Outdare\Backoffice\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Outdare\Backoffice\Traits\Navigation;
use Config;
use Log;
use Lang;

class UserController extends Controller
{
  use Navigation;
  public function accounts(){
    $pageConfig = Config::get('backoffice::backoffice.eauth.accounts_list');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.eauth.account_edit');

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
      'package_name' => 'account',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }
}
