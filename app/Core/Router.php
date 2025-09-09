<?php
namespace App\Core;

class Router {
    private array $routes = ['GET'=>[], 'POST'=>[]];

    public function get(string $path, $handler) { $this->routes['GET'][$path] = $handler; }
    public function post(string $path, $handler) { $this->routes['POST'][$path] = $handler; }

    public function dispatch(string $uri, string $method) {
        $path = parse_url($uri, PHP_URL_PATH);
        // Remove trailing slash (except root)
        if ($path !== '/' && str_ends_with($path, '/')) $path = rtrim($path, '/');
        $handler = $this->routes[$method][$path] ?? null;
        if (!$handler) {
            http_response_code(404);
            echo "404 - Rota não encontrada";
            return;
        }
        if (is_array($handler)) {
            $controller = $handler[0];
            $action = $handler[1];
            if (is_string($controller)) {
                $controller = new $controller();
            }
            return call_user_func([$controller, $action]);
        }
        if (is_callable($handler)) return call_user_func($handler);
        http_response_code(500);
        echo "Handler inválido";
    }
}
