<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller {
    public function login() {
        if ($this->isPost()) {
            $email = trim($_POST['email'] ?? '');
            $pass = $_POST['password'] ?? '';
            $u = User::findByEmail($email);
            if ($u && password_verify($pass, $u['password_hash'])) {
                $_SESSION['user'] = ['id'=>$u['id'],'name'=>$u['name'],'email'=>$u['email']];
                return $this->redirect('/vagas');
            }
            $error = "E-mail ou senha inválidos.";
            return $this->view('auth/login', compact('error'));
        }
        $error = null;
        return $this->view('auth/login', compact('error'));
    }
    public function register() {
        $msg = $error = null;
        if ($this->isPost()) {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $pass = $_POST['password'] ?? '';
            if ($name && $email && $pass) {
                if (User::create($name,$email,$pass)) {
                    $msg = "Cadastro realizado! Faça login.";
                } else {
                    $error = "Não foi possível cadastrar (e-mail já existe?).";
                }
            } else $error = "Preencha todos os campos.";
        }
        return $this->view('auth/register', compact('msg','error'));
    }
    public function logout() {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }
        session_destroy();
        return $this->redirect('/');
    }
}
