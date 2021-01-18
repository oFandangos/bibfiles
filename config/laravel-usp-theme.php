<?php

$menu = [

    [
        'text' => 'Enviar Arquivos',
        'url'  => '/enviar',
    ],
    [
        'text' => 'Acessar Arquivos',
        'url'  => '/consulta',
    ],

];

# dashboard_url renomeado para app_url
# USPTHEME_SKIN deve ser colocado no .env da aplicação 

return [
    'title'=> 'Arquivos da Biblioteca',
    'dashboard_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => '/logout',
    'login_url' => '/',
    'menu' => [
        [
            'text'    => 'Menu',
            'submenu' => $menu,
        ]
    ]
];