<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class CartaoForm extends AbstractForm{

    public function __construct($_name = 'Salvar') {
        parent::__construct($_name);
        $this->setInputFilter((new Filter\CartaoFilter())->getInputFilter());

        $id = new Element\Hidden('id');
        $this->add($id);

        //Nome
        $nome = new Element\Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $nome->setAttributes(array(
            'placeholder' => 'Nome'
        ));
        $this->add($nome);

        $bandeira = new Element\Text('bandeira');
        $bandeira->setLabel('Bandeira')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $bandeira->setAttributes(array(
            'placeholder' => 'Bandeira'
        ));
        $this->add($bandeira);





        $diaFechamentoFatura = new Element\Number('diaFechamentoFatura');
        $diaFechamentoFatura->setLabel('Dia do fechamento da fatura')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $diaFechamentoFatura->setAttributes(array(
            'placeholder' => 'Dia do fechamento da fatura'
        ));
        $this->add($diaFechamentoFatura);


        $diaVencimentoFatura = new Element\Number('diaVencimentoFatura');
        $diaVencimentoFatura->setLabel('Dia de vencimento da fatura')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $diaVencimentoFatura->setAttributes(array(
            'placeholder' => 'Dia de vencimento da fatura'
        ));
        $this->add($diaVencimentoFatura);


        $limite = new Element\Number('limite');
        $limite->setLabel('Limite')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $limite->setAttributes(array(
            'placeholder' => 'Limite'
        ));
        $this->add($limite);

        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);
    }
}