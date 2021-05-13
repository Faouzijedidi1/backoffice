<?php namespace Outdare\Backoffice\Traits;
use Config;
Trait Navigation {
  private function getEtnosPages(){
  	 $page = 'Etnos\Pages\Page';
     if (class_exists($page)) {
       	//Etnos\Pages\Page::all();
  		$pages = $page::all();
  		$childs = array();
  		foreach($pages as $page)
  		{
  			$childs[] = [
  				'name' => $page->title,
  				'url' => $page->url,
          'icon' => 'note',
          'id' => $page->id
  			];
  		}
  		return [
  			'name' => 'Páginas',
  			'id' => 'pages',
  			'url' => '/pages',
  			'type' => '',
        'icon' => 'note_add',
  			'childs' => $childs
  		];
  	}
	  return null;
  }

  private function getEtnosPositions(){
    $position = 'Etnos\Geoutils\Position';
    if (class_exists($position) && Config::get('geoutils::geoutils.in_backoffice') == true) {
      if(Config::get('geoutils::geoutils.key_for_position') != null){
        $childs[] = [
          'name' => 'Posições',
          'url' => '/positions',
          'icon' => 'view_headline'
        ];
        return [
      		'name' => 'Locais',
      		'url' => '/positions',
      		'id' => 'geoutils',
          'icon' => 'location_on',
      		'childs' => $childs
      	];
      }
    }
    return [];
  }

  private function getEtnosProducts(){
    $shop = 'Etnos\Shop\Shop';
    if (class_exists($shop)) {
      $childs = array();
      if(Config::get('shop::shop.hasOrders') == true)
      {
        $childs[] = [
          'name' => 'Encomendas',
          'url' => '/orders',
          'icon' => 'euro_symbol'
        ];
      }
      if(Config::get('shop::shop.service') == true)
      {
        $childs[] = [
  				'name' => 'Serviços',
  				'url' => '/services',
          'icon' => 'view_comfy'
  			];
      }else{
        $childs[] = [
          'name' => 'Produtos',
          'url' => '/products',
          'icon' => 'view_comfy'
        ];
      }
      if(Config::get('shop::shop.use_availability') == true)
      {
        $childs[] = [
  				'name' => 'Disponibilidades',
  				'url' => '/availability',
          'icon' => 'today'
  			];
      }
      if(Config::get('shop::shop.use_collections') == true)
      {
        $childs[] = [
  				'name' => 'Coleccções',
  				'url' => '/collections',
          'icon' => 'view_headline'
  			];
      }
      if(Config::get('shop::shop.hasModel') == true)
      {
        $childs[] = [
          'name' => 'Modelos',
          'url' => '/models',
          'icon' => 'view_array'
        ];
      }
      if(Config::get('shop::shop.use_packages') == true)
      {
        $childs[] = [
  				'name' => 'Pacotes',
  				'url' => '/packages',
          'icon' => 'layers'
  			];
      }
      if(Config::get('shop::shop.hasPromo') == true)
      {
        $childs[] = [
  				'name' => 'Promoções',
  				'url' => '/promotions',
          'icon' => 'euro_symbol'
  			];
      }
      if(Config::get('shop::shop.product_has_brand') == true){
       $childs[] = [
          'name' => 'Marcas',
          'url' => '/brands',
          'icon' => 'branding_watermark'
        ];
      }
      if(Config::get('shop::shop.store') == true){
       $childs[] = [
          'name' => 'Lojas',
          'url' => '/stores',
          'icon' => 'store'
        ];
      }
    	return [
    		'name' => 'E-commerce',
    		'url' => '/shop',
    		'id' => 'shop',
        'icon' => 'business_center',
    		'childs' => $childs
    	];
    }
  }
  private function getEtnosSocial(){
    $social = 'Etnos\Social\Tag';
    if (class_exists($social)) {
      if(Config::get('social::social.tags') == true)
      {
        $childs[] = [
  				'name' => 'Tags',
  				'url' => '/tags',
          'icon' => 'toys',
  			];
      }
      return [
    		'name' => 'Tag Crowd',
    		'url' => '/social',
    		'id' => 'social',
        'icon' => 'toys',
    		'childs' => $childs
    	];
    }

  }

  private function getEtnosBlog(){
    $blog = 'Etnos\Blog\BlogEntry';
    if (class_exists($blog)) {

      $childs[] = [
				'name' => 'Posts',
				'url' => '/posts',
        'icon' => 'content_paste',
			];

      $childs[] = [
				'name' => 'Categorias',
				'url' => '/types',
        'icon' => 'content_copy',
			];

      return [
    		'name' => 'Blog',
    		'url' => '/blog',
    		'id' => 'blog',
        'icon' => 'insert_drive_file',
    		'childs' => $childs
    	];
    }

  }

  private function getEtnosNewsLetter(){
  	return [
  		'name' => 'Newsletter',
  		'url' => '/newsletter',
  		'id' => 'newsletter',
      'icon' => 'email',
  		'childs' => []
  	];
  }

  // private function getHelpdesk() {
  //   return [
  // 		'name' => 'HelpDesk',
  // 		'url' => '/helpdesk',
  // 		'id' => 'newsletter',
  //     'icon' => 'headset_mic',
  // 		'childs' => []
  // 	];
  // }

  private function getEtnosUsers(){
    $eauth = 'Etnos\Eauth\Account';
    if(class_exists($eauth)) {
      if(Config::get('eauth::eauth.dashboard') == true){
        return [
      		'name' => 'Accounts',
      		'url' => '/accounts',
      		'id' => 'users',
          'icon' => 'person',
      		'childs' => []
      	];
      }
    }
  }

  protected function getNavConfig() {
  	$navbar = array();

  	// $products = $this->getEtnosProducts();
  	// if($products != null) $navbar[] = $products;
    //
    // $users = $this->getEtnosUsers();
  	// if($users != null) $navbar[] = $users;
    //
    // $positions = $this->getEtnosPositions();
  	// if($positions != null) $navbar[] = $positions;
    //
  	// $pages = $this->getEtnosPages();
  	// if($pages != null) $navbar[] = $pages;
    //
    // $blog = $this->getEtnosBlog();
    // if($blog != null) $navbar[] = $blog;
    //
    // $social = $this->getEtnosSocial();
    // if($social != null) $navbar[] = $social;

    $extras = Config::get('backoffice::backoffice.navigation');
    if($extras != null && isset($extras['root']))
    {
      foreach($extras['root'] as $entry)
      {
        $navbar[] = $entry;
      }
    }

  	// $newsletter = $this->getEtnosNewsLetter();
  	// if($newsletter != null) $navbar[] = $newsletter;

    // $navbar[] = $this->getHelpdesk();

  	return $navbar;
  }
}
