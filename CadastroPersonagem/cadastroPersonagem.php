<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    class Pessoa {
        private $nomePersonagem;
        private $primeiraAparicao;
        private $maiorFeito;
        private $quemE;
        private $vivoMorto;
        private $causaDaMorte;

        public function __construct($nomePersonagem, $primeiraAparicao, $maiorFeito, $quemE, $vivoMorto, $causaDaMorte) {
            $this->nomePersonagem = $nomePersonagem;
            $this->primeiraAparicao = $primeiraAparicao;
            $this->maiorFeito = $maiorFeito;
            $this->quemE = $quemE;
            $this->vivoMorto = $vivoMorto;
            $this->causaDaMorte = $causaDaMorte;
        }

        public function getNomePersonagem() {
            return $this->nomePersonagem;
        }

        public function getPrimeiraAparicao() {
            return $this->primeiraAparicao;
        }

        public function getMaiorFeito() {
            return $this->maiorFeito;
        }

        public function getQuemE() {
            return $this->quemE;
        }

        public function getVivoMorto() {
            return $this->vivoMorto;
        }

        public function getCausaDaMorte() {
            return $this->causaDaMorte;
        }

        public function setNomePersonagem($nomePersonagem) {
            $this->nomePersonagem = $nomePersonagem;
        }

        public function setPrimeiraAparicao($primeiraAparicao) {
            $this->primeiraAparicao = $primeiraAparicao;
        }

        public function setMaiorFeito($maiorFeito) {
            $this->maiorFeito = $maiorFeito;
        }

        public function setQuemE($quemE) {
            $this->quemE = $quemE;
        }

        public function setVivoMorto($vivoMorto) {
            $this->vivoMorto = $vivoMorto;
        }

        public function setCausaDaMorte($causaDaMorte) {
            $this->causaDaMorte = $causaDaMorte;
        }
    }

    if (!isset($_SESSION['cadastro'])) {
        $_SESSION['cadastro'] = [];
    }

    if (isset($_POST['limpa'])) {
        unset($_SESSION['cadastro']);
    }

    if (isset($_POST['submit'])) {
        $erroNomePersonagem = '';
        $erroPrimeiraAparicao = '';
        $erroMaiorFeito = '';
        $erroQuemE = '';
        $erroVivoMorto = '';
        $erroCausaDaMorte = '';

        if (empty($_POST['nomePersonagem'])) {
            $erroNomePersonagem = '<p class="text-danger">Informe o nome do personagem.</p>';
        } else if (empty($_POST['primeiraAparicao'])) {
            $erroPrimeiraAparicao = '<p class="text-danger">Informe a primeira aparição.</p>';
        } else if (empty($_POST['maiorFeito'])) {
            $erroMaiorFeito = '<p class="text-danger">Informe o maior feito.</p>';
        } else if (empty($_POST['quemE'])) {
            $erroQuemE = '<p class="text-danger">Diga quem é o personagem.</p>';
        } else if (empty($_POST['vivoMorto'])) {
            $erroVivoMorto = '<p class="text-danger">Informe se ele está vivo/morto.</p>';
        } else if (empty($_POST['causaMorte']) && $_POST['vivoMorto'] == 'morto') {
            $erroCausaDaMorte = '<p class="text-danger">Informe a causa da morte.</p>';
        } else {
            $postNome = $_POST['nomePersonagem'];
            $postAparicao = $_POST['primeiraAparicao'];
            $postFeito = $_POST['maiorFeito'];
            $postQuem = $_POST['quemE'];
            $postVivo = $_POST['vivoMorto'];
            $postMorte = isset($_POST['causaMorte']) ? $_POST['causaMorte'] : '';

            $personagem = new Pessoa($postNome, $postAparicao, $postFeito, $postQuem, $postVivo, $postMorte);

            $_SESSION['cadastro'][] = $personagem;

            echo '<p class="text-success">Personagem adicionado com sucesso.</p>';
        }
    }
}
include 'cadastro.html';
