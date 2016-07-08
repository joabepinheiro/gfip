<?php
namespace Application\Form;
use Zend\Form\Element;

class ContaForm extends AbstractForm{

    public function __construct($_name = 'Salvar') {

        parent::__construct($_name);

        $this->setInputFilter((new Filter\ContaFilter())->getInputFilter());

        $id = new Element\Hidden('id');
        $this->add($id);


        //Nome
        $nome = new Element\Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'class' => 'form-control',
                'placeholder' => 'Nome'
            ));
        $this->add($nome);

        //Tipo
        $tipo = new Element\Select('tipo');
        $tipo->setLabel('Tipo')
            ->setAttributes(array(
                'class' => 'form-control',
                'placeholder' => 'Tipo'
            ));
        $tipo->setValueOptions(array(
            'poupança'  => 'Poupança',
            'corrente'  => 'Conta corrente',
            'espécie'   => 'Espécie',
            'outros'    => 'outros',
        ))
        ->setEmptyOption('');
        $this->add($tipo);

        
        //Saldo
        $saldo = new Element\Number('saldo');
        $saldo->setLabel('Saldo')
            ->setAttributes(array(
                'class' => 'form-control',
                'placeholder' => 'Saldo'
            ));
        $this->add($saldo);
        
        
        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);
    }
}