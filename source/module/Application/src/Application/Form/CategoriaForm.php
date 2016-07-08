<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;
class CategoriaForm extends AbstractForm{

    public function __construct($_name = 'Salvar') {

        parent::__construct($_name);

        $this->setInputFilter((new Filter\CategoriaFilter())->getInputFilter());

        //Nome
        $nome = new Element\Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'class' => 'form-control',
                'placeholder' => 'Nome'
            ));
        $this->add($nome);


        $tipo = new Element\Select('tipo');
        $tipo->setLabel('Tipo')
            ->setAttributes(array(
                'class' => 'form-control',
                'placeholder' => 'Categoria'
            ));
        $tipo->setValueOptions(array(
            '' => '',
            'receita' => 'Receita',
            'despesa' => 'Despesa',


        ));
        $this->add($tipo);


        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);
    }
}