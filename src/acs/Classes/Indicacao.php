<?php
namespace ACS\Classes;

class Indicacao
{

    public $usuario;

    public function __construct($nome, $pontuacao)
    {
        if (! isset($this->usuario)) {
            $this->usuario = new Usuario($nome, $pontuacao);
        } else {
            $this->usuario->setUsuario($nome, $pontuacao);
        }
    }

    public function Indicacao($nome, $pontuacao)
    {
        if (! isset($this->usuario)) {
            $this->usuario = new Usuario($nome, $pontuacao);
        } else {
            $this->usuario->setUsuario($nome, $pontuacao);
        }
    }
}