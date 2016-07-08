<?php
namespace Application\Form;

use Zend\Form\Element;

class ConsultorForm extends UsuarioForm{

    public function __construct($_name = 'Salvar') {

        parent::__construct($_name);
    }
}