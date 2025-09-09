<?php
// Autoloader simples (sem Composer)
spl_autoload_register(function($class){
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) return;
    $relative = substr($class, strlen($prefix));
    $file = $base_dir . str_replace('\\', '/', $relative) . '.php';
    if (file_exists($file)) require $file;
});

use App\Controllers\PageController;

$pageController = new PageController();

// rotas das suas páginas
$router->get('/alugar', fn() => $pageController->show('Alugar'));
$router->get('/cadastrar', fn() => $pageController->show('Cadastrar'));
$router->get('/historico', fn() => $pageController->show('Historico'));
$router->get('/favoritos', fn() => $pageController->show('Favoritos'));
$router->get('/suporte', fn() => $pageController->show('Suporte'));
$router->get('/perfil', fn() => $pageController->show('Perfil'));