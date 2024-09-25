<?php

$menu = [

    [
        'text' => 'Acessar Arquivos',
        'url'  => '/files',
    ],
    [
        'text' => 'Enviar Arquivos',
        'url'  => '/files/create',
        'can'     => 'admin',
    ],
    [
        'text' => 'Requisições Pendentes',
        'url'  => '/pendentes',
        'can'     => 'admin',
    ],
    [
        'text' => 'Pedidos Realizados',
        'url'  => '/pedidos_realizados',
        'can'     => 'admin',
    ],

];

$right_menu = [
    [
        'key' => 'senhaunica-socialite',
    ],
    [
        'text'   => '<i class="fas fa-hard-hat"></i>',
        'title'  => 'logs',
        'target' => '_blank',
        'url'    => config('app.url') . '/logs',
        'align'  => 'right',
        'can'    => 'admin',
    ],
];


# dashboard_url renomeado para app_url
# USPTHEME_SKIN deve ser colocado no .env da aplicação

return [
    'title' => 'Sistema de Arquivos da Biblioteca - FFLCH USP',
    'skin' => env('USP_THEME_SKIN', 'uspdev'),
    'app_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => $menu,
    'right_menu' => $right_menu,
];
