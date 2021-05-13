<?php

namespace Outdare\Backoffice\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Outdare\Backoffice\Traits\Navigation;
use Config;
use Log;
use Lang;

class ShopController extends Controller
{
  use Navigation;
  public function collections(){
    $pageConfig = Config::get('backoffice::backoffice.shop.collection_list');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.shop.collection_edit');

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
      'package_name' => 'collection',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }
  public function orders() {
    $pageConfig = Config::get('backoffice::backoffice.shop.order_list');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.shop.order_edit');

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
      'package_name' => 'shop',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }

  public function products(){
    $pageConfig = Config::get('backoffice::backoffice.shop.product_list');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.shop.product_edit');

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
      'package_name' => 'product',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }

  public function services(){
    $pageConfig = Config::get('backoffice::backoffice.shop.service_list');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.shop.service_edit');

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
      'package_name' => 'service',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }

  public function availability() {
    $pageConfig = Config::get('backoffice::backoffice.shop.availability_list');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.shop.availability_edit');

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
      'package_name' => 'availability',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }

  public function brands(){
    $pageConfig = Config::get('backoffice::backoffice.shop.brand_list');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.shop.brand_edit');

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
      'package_name' => 'brand',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }

  public function packages(){
    $pageConfig = Config::get('backoffice::backoffice.shop.package_list');
    $pageConfig['item_config'] = Config::get('backoffice::backoffice.shop.package_edit');

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
      'package_name' => 'package',
      'contentId' => '',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }

  // public function stores(){
  //   $pageConfig = Config::get('backoffice::backoffice.shop.store_list');
  //   $pageConfig['item_config'] = Config::get('backoffice::backoffice.shop.store_edit');

  //   $title = Lang::get('auth.title');
  //   if($title == 'auth.title')
  //   {
  //     $title = Lang::get('backoffice::auth.title');
  //   }

  //   $data = array(
  //     'mainDivId' => 'main',
  //     'title' => $title,
  //     'dashbordName' => $title,
  //     'pageConfig' => $pageConfig,
  //     'package_name' => 'store',
  //     'contentId' => '',
  //     'navConfig' => $this->getNavConfig(),
  //   );
  //   return view('backoffice::dashboard',$data);
  // }
}
