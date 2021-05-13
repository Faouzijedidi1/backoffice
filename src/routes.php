<?php

use Outdare\Backoffice\Traits\Navigation;

Route::post('/helpdesk/add','\Outdare\Backoffice\Controllers\Helpdesk@add');

//backoffice routes
Route::group(array('prefix' => '/dashboard'), function() {
  $middles = array();

  $moreMiddles = Config::get('backoffice::backoffice.middlewares');
  if($moreMiddles == null) {
    $moreMiddles = array();
  }
  foreach($moreMiddles as $middle)
  {
    $middles[] = $middle;
  }
  // Log::info("middleware backoffice auth: ".json_encode($middles));

  Route::group(array('middleware' => $middles), function() {

  	Route::get('/','\Outdare\Backoffice\Controllers\Index@index');
    Route::get('/helpdesk','\Outdare\Backoffice\Controllers\Index@helpdesk');

    /**
     * Pages
     */

     $pageObj = 'Etnos\Pages\Page';
     if (Schema::hasTable('etnos_page') && class_exists($pageObj)) {
       Route::group(array('prefix' => '/pages'), function() use($pageObj) {
          $pages = $pageObj::all();
          foreach($pages as $page)
          {
            if($page->method == null){
              $page->method = 'index';
            }
            Route::get('/{id}','\Outdare\Backoffice\Controllers\PagesController@'.$page->method);
          }
       });
     }

    /**
     * Shop
     */

     $shop = 'Etnos\Shop\Product';
     if (class_exists($shop)) {
      Route::group(array('prefix' => '/shop'), function() use($pageObj) {
        //$element = Config::get('shop::shop.element');
        Route::get('/collections','\Outdare\Backoffice\Controllers\ShopController@collections');
        if(Config::get('shop::shop.service') == true)
        {
          Route::get('/services','\Outdare\Backoffice\Controllers\ShopController@services');
        }else{
          Route::get('/products','\Outdare\Backoffice\Controllers\ShopController@products');
        }
        if(Config::get('shop::shop.hasOrders') == true)
        {
          Route::get('/orders','\Outdare\Backoffice\Controllers\ShopController@orders');
        }
        if(Config::get('shop::shop.use_availability') == true)
        {
          Route::get('/availability','\Outdare\Backoffice\Controllers\ShopController@availability');
        }
        if(Config::get('shop::shop.product_has_brand') == true)
        {
          Route::get('/brands','\Outdare\Backoffice\Controllers\ShopController@brands');
        }
        if(Config::get('shop::shop.use_packages') == true)
        {
          Route::get('/packages','\Outdare\Backoffice\Controllers\ShopController@packages');
        }
        // if(Config::get('shop::shop.store') == true)
        // {
        //   Route::get('/stores','\Outdare\Backoffice\Controllers\ShopController@stores');
        // }
      });
     }

     /**
      * Geoutils
      */

      $position = 'Etnos\Geoutils\Position';
      if (class_exists($position)) {
       Route::group(array('prefix' => '/geoutils'), function() use($pageObj) {
         Route::get('/positions','\Outdare\Backoffice\Controllers\PositionController@positions');
       });
      }

      /**
       * Social
       */

       $tag = 'Etnos\Social\Tag';
       if (class_exists($tag)) {
        Route::group(array('prefix' => '/social'), function() use($pageObj) {
          Route::get('/tags','\Outdare\Backoffice\Controllers\TagController@tags');
        });
       }

       /**
        * Blog
        */

        $blog = 'Etnos\Blog\BlogEntry';
        if (class_exists($blog)) {
         Route::group(array('prefix' => '/blog'), function() {
           Route::get('/posts','\Outdare\Backoffice\Controllers\BlogController@posts');
         });
        }

      /**
       * Newsletter
       */

       $email = 'Etnos\Etemail\EtEmail';
       if (class_exists($email)) {
         Route::get('/newsletter','\Outdare\Backoffice\Controllers\Index@newsletter');
       }

       /**
        * Accounts
        */

        $account = 'Etnos\Eauth\Account';
        if (class_exists($account)) {
         Route::get('/accounts','\Outdare\Backoffice\Controllers\UserController@accounts');
        }

  });
});
