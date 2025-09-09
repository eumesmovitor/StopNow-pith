<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\Vaga;
use App\Models\Reserva;

class VagaController extends Controller {
    public function index() {
        $vagas = Vaga::all();
        $user = $this->authUser();
        return $this->view('vagas/index', compact('vagas','user'));
    }
    public function create() {
        $this->requireAuth();
        $msg = $error = null;
        return $this->view('vagas/create', compact('msg','error'));
    }
    public function store() {
        $this->requireAuth();
        $titulo = trim($_POST['titulo'] ?? '');
        $endereco = trim($_POST['endereco'] ?? '');
        $preco = floatval($_POST['preco_hora'] ?? 0);
        $descricao = trim($_POST['descricao'] ?? '');
        if ($titulo && $endereco and $preco>0) {
            if (Vaga::create($this->authUser()['id'],$titulo,$endereco,$preco,$descricao?:null)) {
                return $this->redirect('/vagas');
            }
            $error = "Não foi possível salvar a vaga.";
        } else $error = "Preencha todos os campos obrigatórios.";
        $msg = null;
        return $this->view('vagas/create', compact('msg','error'));
    }
    public function reservar() {
        $this->requireAuth();
        $vaga_id = (int)($_POST['vaga_id'] ?? 0);
        $inicio = $_POST['inicio'] ?? '';
        $fim = $_POST['fim'] ?? '';
        if ($vaga_id && $inicio && $fim) {
            if (Reserva::reservar($vaga_id,$this->authUser()['id'],$inicio,$fim)) {
                return $this->redirect('/vagas');
            }
            $error = "Conflito de horário ou erro ao reservar.";
        } else $error = "Dados inválidos.";
        $vagas = Vaga::all();
        $user = $this->authUser();
        return $this->view('vagas/index', compact('vagas','user','error'));
    }
}
