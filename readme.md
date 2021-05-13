## commands root /project
php artisan backoffice:install
php artisan backoffice:update

## configuração
### Configurar Navigation Traint

Exemplo de um separador
```php
[
	'name' => 'nome que aparece na navbar',
	'url' => 'url da pagina (deixar vazio caso seja um separador)',
	'type' => 'tipo de vida (deixa vazio caso seja um separador)',
	'childs' => [
		[
			'name' => 'Coleccções',
			'url' => '/collections',
			'type' => 'collections_grid'
		],
		[
			'name' => 'Produtos',
			'url' => '/products',
			'type' => 'products_grid'
		],
	]
]
```

exemplo de um link
```php
[
	'name' => 'nome que aparece na navbar',
	'url' => 'url da pagina (deixar vazio caso seja um separador)',
	'type' => 'tipo de vida (deixa vazio caso seja um separador)',
	'childs' => []
	]
]
```

