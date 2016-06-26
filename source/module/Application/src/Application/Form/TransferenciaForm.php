<?php
namespace Application\Form;

class TransferenciaForm extends AbstractForm{

    public function __construct($_name = 'Salvar') {

        parent::__construct($_name);

        $this->setInputFilter((new Filter\TransferenciaFilter())->getInputFilter());
    }
}