<?php

namespace Application\Form\Filter;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class UsuarioFilter implements InputFilterAwareInterface{

    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Não usado");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput([
                'name' => '',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' =>'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => ''
                            ),
                        ),
                    ),
                ),
            ]));

            $this->inputFilter = $inputFilter;

        }

        return $this->inputFilter;
    }
}