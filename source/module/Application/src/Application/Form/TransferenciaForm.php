<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class TransferenciaForm extends AbstractForm{

    private $entityManager;

    public function __construct($_name = 'Salvar', EntityManager $entityManager = null) {
        parent::__construct($_name);

        $this->entityManager = $entityManager;
        $this->setInputFilter((new Filter\ReceitaFilter())->getInputFilter());

        $id = new Element\Hidden('id');
        $this->add($id);


        $valor = new Element\Number('valor');
        $valor->setLabel('Valor')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $valor->setAttributes(array(
            'placeholder' => 'Valor'
        ));
        $this->add($valor);


        //Conta
        $origem = new ObjectSelect('origem');
        $origem->setOptions(array(
                'label' => 'Origem',
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
        $origem->setValue(0);
        $this->add($origem);

        $destino = new ObjectSelect('destino');
        $destino->setOptions(array(
                'label' => 'Destino',
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
        $destino->setValue(0);
        $this->add($destino);


        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }
}