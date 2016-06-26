<?php
namespace Application\Form;

class CartaoCreditoForm extends AbstractForm{

    public function __construct($_name = 'Salvar') {

        parent::__construct($_name);

        $this->setInputFilter((new Filter\CartaoCreditoFilter())->getInputFilter());
    }
}