<?php
namespace ACS\Classes;

class Usuario
{

    private $_nome;

    private $_usuarioEsquerda;

    private $_usuarioDireita;

    private $_pontuacao;

    private $_pontuacaoEsquerda;

    private $_pontuacaoDireita;

    public function __construct($nome, $pontuacao)
    {
        $this->_nome = $nome;
        $this->_pontuacao = $pontuacao;
        $this->_pontuacaoEsquerda = 0;
        $this->_pontuacaoDireita = 0;
        return $this;
    }

    public function getNome()
    {
        return $this->_nome;
    }

    public function toHtml()
    {
        $html .= '<table border="1" width="100%">';
        $html .= '<tr><th colspan="2">' . $this->getNome() . ' = ' . $this->getPontuacaoInicial() . '</th></tr>';
        $html .= '<tr>';
        $html .= '<td width="50%">';
        if (isset($this->_usuarioEsquerda)) {
            $html .= '<table border="1" width="100%">';
            $html .= '<tr><th>Lado Esquerdo</th></tr>';
            $html .= '<tr><th>Pontos</th></tr>';
            $html .= '<tr><td>' . $this->getPontuacaoEsquerda() . '</td></tr>';

            $html .= $this->_usuarioEsquerda->toHtml();
            $html .= '</table>';
        } else {
            $html .= '&nbsp;';
        }
        $html .= '</td>';
        $html .= '<td width="50%">';
        if (isset($this->_usuarioDireita)) {
            $html .= '<table border="1" width="100%">';
            $html .= '<tr><th>Lado Direito</th></tr>';
            $html .= '<tr><th>Pontos</th></tr>';
            $html .= '<tr><td>' . $this->getPontuacaoDireita() . '</td></tr>';
            $html .= $this->_usuarioDireita->toHtml();
            $html .= '</table>';
        } else {
            $html .= '&nbsp;';
        }
        $html .= '</td>';
        $html .= '</tr>';
        return $html;
    }

    public function getQtdeUsuarios()
    {
        $qtdeUsuarios = 0;
        if (isset($this->_usuarioEsquerda)) {
            $qtdeUsuarios ++;
        }
        if (isset($this->_usuarioDireita)) {
            $qtdeUsuarios ++;
        }
        return $qtdeUsuarios;
    }

    public function getDirecao()
    {
        $esquerda = true;
        if ($this->_usuarioEsquerda->getQtdeUsuarios() > $this->_usuarioDireita->getQtdeUsuarios()) {
            $esquerda = false;
        }
        return $esquerda;
    }

    public function getPontuacaoInicial()
    {
        return ($this->_pontuacao);
    }

    public function getPontuacao()
    {
        if (isset($this->_usuarioEsquerda)) {
            $this->_pontuacaoEsquerda = $this->_usuarioEsquerda->getPontuacao();
        }
        if (isset($this->_usuarioDireita)) {
            $this->_pontuacaoDireita = $this->_usuarioDireita->getPontuacao();
        }
        return ($this->_pontuacao + $this->_pontuacaoEsquerda + $this->_pontuacaoDireita);
    }

    public function getPontuacaoEsquerda()
    {
        $this->_pontuacaoEsquerda += $this->_usuarioEsquerda->getPontuacao();
        $this->getPontuacao();
        return $this->_pontuacaoEsquerda;
    }

    public function getPontuacaoDireita()
    {
        $this->_pontuacaoDireita += $this->_usuarioDireita->getPontuacao();
        $this->getPontuacao();
        return $this->_pontuacaoDireita;
    }

    public function setUsuario($nome, $pontuacao)
    {
        if (! isset($this->_usuarioEsquerda)) {
            $usuario = new Usuario($nome, $pontuacao);
            $this->_usuarioEsquerda = $usuario;
            return true;
        } elseif (! isset($this->_usuarioDireita)) {
            $usuario = new Usuario($nome, $pontuacao);
            $this->_usuarioDireita = $usuario;
            return true;
        } else {
            if ($this->getDirecao()) {
                $this->_usuarioEsquerda->setUsuario($nome, $pontuacao);
                return true;
            } else {
                $this->_usuarioDireita->setUsuario($nome, $pontuacao);
                return true;
            }
        }
    }
}