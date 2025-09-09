<?php
namespace App\Core;
class Controller {
    protected function view(string $template, array $data = []) {
        extract($data);
        $viewPath = __DIR__ . '/../Views/' . $template . '.php';
        $header = __DIR__ . '/../Views/layouts/header.php';
        $footer = __DIR__ . '/../Views/layouts/footer.php';
        include $header;
        include $viewPath;
        include $footer;
    }
    protected function redirect(string $path) {
        header("Location: " . $path);
        exit;
    }
    protected function isPost(): bool { return $_SERVER['REQUEST_METHOD']==='POST'; }
    protected function authUser(): ?array {
        return $_SESSION['user'] ?? null;
    }
    protected function requireAuth(): void {
        if (!$this->authUser()) { $this->redirect('/auth/login'); }
    }
}
