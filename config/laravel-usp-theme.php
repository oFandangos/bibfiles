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
    'title' => config('app.name'),
    'skin' => env('USP_THEME_SKIN', 'uspdev'),
    'app_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => $menu,
];