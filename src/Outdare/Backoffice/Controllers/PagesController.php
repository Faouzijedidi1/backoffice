<?php

namespace Outdare\Backoffice\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Outdare\Backoffice\Traits\Navigation;
use Etnos\Pages\Page;
use Config;
use Log;
use Lang;



class PagesController extends Controller
{
  use Navigation;
  public function edit_page($page_id)
  {
    $page = Page::find($page_id);
    $pageConfig = Config::get('backoffice::backoffice.pages.'.$page->category);
    if($pageConfig == null){
      $pageConfig = $page->category;
    }

    $pageConfig['title'] .= " ".$page->title;
    $pageConfig['subtitle'] .= " ".$page->title;

    $title = Lang::get('auth.title');
    if($title == 'auth.title')
    {
      $title = Lang::get('backoffice::auth.title');
    }

    $data = array(
      'mainDivId' => 'main',
      'title' => $title,
      'dashbordName' => $title,
      'contentId' => $page_id,
      'pageConfig' => $pageConfig,
      'package_name' => 'page',
      'navConfig' => $this->getNavConfig(),
    );
    return view('backoffice::dashboard',$data);
  }
}
