<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class DespesaForm extends AbstractForm{

    private $entityManager;

    public function __construct($_name = 'Salvar', EntityManager $entityManager = null) {
        parent::__construct($_name);

        $this->entityManager = $entityManager;
        $this->setInputFilter((new Filter\ReceitaFilter())->getInputFilter());

        $id = new Element\Hidden('id');
        $this->add($id);


        //Valor
        $valor = new Element\Number('valor');
        $valor->setLabel('Valor')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $valor->setAttributes(array(
            'placeholder' => 'Valor'
        ));
        $this->add($valor);


        //Data
        $data = new Element\Text('data');
        $data->setLabel('Data')
            ->setAttributes(array(
                'class' => 'form-control datepicker',
            ));
        $data->setAttributes(array(
            'placeholder' => 'Data'
        ));
        $this->add($data);

        //Descrição
        $descricao = new Element\Text('descricao');
        $descricao->setLabel('Descrição')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $descricao->setAttributes(array(
            'placeholder' => 'Descrição'
        ));
        $this->add($descricao);


        //Categoria
        $categoria = new ObjectSelect('categoria');
        $categoria->setOptions(array(
                'label' => 'Categoria',
                'object_manager'     => $entityManager,
                'target_class'       => 'Application\Entity\Categoria',
                'is_method' => true,
                'display_empty_item' => true,
                'find_method'        => array(
                    'name'   => 'findCategoriaDespesa',
                )
            )
        )
            ->setAttribute('class', 'form-control select2');
        $categoria->setValue(0);
        $this->add($categoria);


        //Conta
        $conta = new ObjectSelect('conta');
        $conta->setOptions(array(
                'label' => 'Conta',
                'object_manager'     => $entityManager,
                'target_class'       => 'Application\Entity\Conta',
                'is_method' => true,
                'display_empty_item' => true,
                'find_method'        => array(
                    'name'   => 'findConta',
                )
            )
        )
            ->setAttribute('class', 'form-control select2');
        $conta->setValue(0);
        $this->add($conta);


        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }


}