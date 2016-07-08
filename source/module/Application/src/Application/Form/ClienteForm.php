<?php
namespace Application\Form;

class ClienteForm extends UsuarioForm{

    public function __construct($_name = 'Salvar') {

        parent::__construct($_name);

        $this->setInputFilter((new Filter\ClienteFilter())->getInputFilter());
    }
}