<?php
namespace App\Controllers;

class PageController {
    public function show(string $page) {
        $file = __DIR__ . "/../Views/pages/" . ucfirst($page) . ".php";

        if (file_exists($file)) {
            require __DIR__ . "/../Views/layouts/header.php";
            require $file;
            require __DIR__ . "/../Views/layouts/footer.php";
        } else {
            http_response_code(404);
            echo "Página não encontrada";
        }
    }
}
