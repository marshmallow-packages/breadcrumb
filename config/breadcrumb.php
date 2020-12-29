<?php

return [

	'default' => [
        'name' => 'Home',
        'url' => env('APP_URL'),
        'icon' => 'fas fa-home',
	],

    'view' => 'marshmallow::breadcrumb.container',

	'classes' => [
		'container' => 'breadcrumb-container',
		'list' => 'breadcrumb-list',
		'item' => 'breadcrumb-item',
		'link' => 'breadcrumb-link',
		'icon' => 'breadcrumb-icon',
	],
];
