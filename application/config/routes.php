<?php

return [
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

    'api' => [
        'controller' => 'main',
        'action' => 'api',
    ],

    'add' => [
        'controller' => 'main',
        'action' => 'add',
    ],

    'edit/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'edit',
    ],

];