<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\StatementHandler;
use \src\handlers\CondominioHandler;
use src\models\User;

class AppController extends Controller {

    private $loggedUser;
    
    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }


    //Funções da pagina inicial do sistema
    public function index() {
        $statementsFeed = StatementHandler::getStatement();
        $countMoradores = UserHandler::countMoradores();
        $this->render('dash', [
            'loggedUser' => $this->loggedUser,
            'statementsFeed' => $statementsFeed,
            'countMoradores' => $countMoradores
        ]);
    }

    public function send_statement() {
        $text = filter_input(INPUT_POST, 'text-statement');

        if($text) {
            StatementHandler::addStatement($text);
            $this->redirect('/app');
        }

    }

    
    //Funções da pagina de condominio
    public function condominio() {
        $condominiosList = CondominioHandler::getCond();
        $this->render('condominio', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList
        ]);
    }

    public function addCondominio() {
        $name = filter_input(INPUT_POST, 'name');
        $cnpj = filter_input(INPUT_POST, 'cnpj');
        $email = filter_input(INPUT_POST, 'email');
        $endereco = filter_input(INPUT_POST, 'endereco');
        $numero = filter_input(INPUT_POST, 'numero');
        $complemento = filter_input(INPUT_POST, 'complemento');
        $bairro = filter_input(INPUT_POST, 'bairro');

        if($name && $email) {
            CondominioHandler::addCond($name, $cnpj, $email, $endereco, $numero, $complemento, $bairro);
            $this->redirect('/app/condominios');
        }

    }

    public function editCondominio($atts) {
        $condItem = CondominioHandler::getCondItem($atts['id']);
        $this->render('edit_cond', [
            'loggedUser' => $this->loggedUser,
            'condItem' => $condItem
        ]);

    }

    public function saveCondominio() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $cnpj = filter_input(INPUT_POST, 'cnpj');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $endereco = filter_input(INPUT_POST, 'endereco');
        $numero = filter_input(INPUT_POST, 'numero');
        $complemento = filter_input(INPUT_POST, 'complemento');
        $bairro = filter_input(INPUT_POST, 'bairro');

        if($nome && $email) {
            CondominioHandler::saveCond($id, $nome, $cnpj, $email, $endereco, $numero, $complemento, $bairro);
            $this->redirect('/app/condominios');
        }
    }

    public function deleteCondominio() {
        $condominioId = filter_input(INPUT_GET, 'id');
        if($condominioId) {
            CondominioHandler::delCond($condominioId);
            $this->redirect('/app/condominios');
        }

    }


    //Funções da página de prédios
    public function predio() {
        $prediosList = CondominioHandler::getPredios();
        $condominiosList = CondominioHandler::getCond();
        $this->render('predio', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'prediosList' => $prediosList
        ]);
    }

    public function addPredio() {
        $predio = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($predio && $condominio) {
            CondominioHandler::addPrd($predio, $condominio);
            $this->redirect('/app/predios');
        }
    }

    public function editPredio($atts) {
        $prdItem = CondominioHandler::getPrdItem($atts['id']);
        $condominiosList = CondominioHandler::getCond();
        $this->render('edit_prd', [
            'loggedUser' => $this->loggedUser,
            'prdItem' => $prdItem,
            'condominios' => $condominiosList
        ]);

    }

    public function savePredio() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($nome && $condominio) {
            CondominioHandler::savePrd($id, $nome, $condominio);
            $this->redirect('/app/predios');
        }
    }

    public function deletePredio() {
        $predioId = filter_input(INPUT_GET, 'id');
        if($predioId) {
            CondominioHandler::delPrd($predioId);
            $this->redirect('/app/predios');
        }

    }


    //Funções da página de moradores
    public function morador() {
        $prediosList = CondominioHandler::getPredios();
        $condominiosList = CondominioHandler::getCond();
        $moradorList = CondominioHandler::getMorador();
        $this->render('morador', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'predios' => $prediosList,
            'moradores' => $moradorList
        ]);
    }

    public function addMorador() {
        $nome = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $rg = filter_input(INPUT_POST, 'rg');
        $cpf = filter_input(INPUT_POST, 'cpf');
        $phone = filter_input(INPUT_POST, 'phone');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $condominio = filter_input(INPUT_POST, 'condominio');
        $predio = filter_input(INPUT_POST, 'predio');
        $apto = filter_input(INPUT_POST, 'apto');

        if($nome && $email) {
            UserHandler::addUserFromMorador($nome, $email, $rg, $cpf, $phone, $tipo, $condominio, $predio, $apto);
            $this->redirect('/app/moradores');
        }
    }

    public function editMorador($atts) {
        $moradorItem = CondominioHandler::getMoradorItem($atts['id']);
        $condominiosList = CondominioHandler::getCond();
        $prediosList = CondominioHandler::getPredios();
        $this->render('edit_morador', [
            'loggedUser' => $this->loggedUser,
            'morador' => $moradorItem,
            'condominios' => $condominiosList,
            'predios' => $prediosList
        ]);
    }

    public function saveMorador() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $rg = filter_input(INPUT_POST, 'rg');
        $cpf = filter_input(INPUT_POST, 'cpf');
        $phone = filter_input(INPUT_POST, 'phone');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $condominio = filter_input(INPUT_POST, 'condominio');
        $predio = filter_input(INPUT_POST, 'predio');
        $apto = filter_input(INPUT_POST, 'apto');

        if($nome && $email) {
            CondominioHandler::saveMoradorFromMorador($id, $nome, $email, $rg, $cpf, $phone, $tipo, $condominio, $predio, $apto);
            $this->redirect('/app/moradores');
        }
    }

    public function disableMorador() {
        $moradorId = filter_input(INPUT_GET, 'id');
        if(!empty($moradorId)) {
            UserHandler::disableUser($moradorId);
            $this->redirect('/app/moradores');
        } else {
            $this->redirect('/app/moradores');
        }
    }

    public function getPredioField() {
        $idCond = filter_input(INPUT_POST, 'id_cond');
        $prdList = CondominioHandler::getPrdListByCond($idCond);
        echo json_encode($prdList);
    }


    //Funções da página de areas comuns
    public function areas() {
        $areasList = CondominioHandler::getAreas();
        $condominiosList = CondominioHandler::getCond();
        $this->render('areacomum', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'areas' => $areasList
        ]);
    }

    public function addArea() {
        $nome = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($nome && $condominio) {
            CondominioHandler::addNewArea($nome, $condominio);
            $this->redirect('/app/area_comum');
        }
    }

    public function editArea($atts) {
        $areaComumItem = CondominioHandler::getAreaItem($atts['id']);
        $condominiosList = CondominioHandler::getCond();
        $this->render('edit_area', [
            'loggedUser' => $this->loggedUser,
            'areaComumItem' => $areaComumItem,
            'condominios' => $condominiosList
        ]);
    }

    public function saveArea() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($nome && $condominio) {
            CondominioHandler::saveAreaComum($id, $nome, $condominio);
            $this->redirect('/app/area_comum');
        }
    }

    public function deleteArea() {
        $idArea = filter_input(INPUT_GET, 'id');
        if($idArea) {
            CondominioHandler::delArea($idArea);
            $this->redirect('/app/area_comum');
        }
    }


    //Pagina de Reservas
    public function reservas() {
        $areasList = CondominioHandler::getAreas();
        $condominiosList = CondominioHandler::getCond();
        $this->render('reservas', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'areas' => $areasList
        ]);
    }

    public function getAreaField() {
        $idCond = filter_input(INPUT_POST, 'id_cond');
        $areaList = CondominioHandler::getAreaListByCond($idCond);
        echo json_encode($areaList);
    }

}