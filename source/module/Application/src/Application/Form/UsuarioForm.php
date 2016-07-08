<?php
namespace Application\Form;
use Zend\Form\Element;

class UsuarioForm extends AbstractForm{

    public function __construct($_name = 'Salvar') {
        parent::__construct($_name);
        $this->setInputFilter((new Filter\UsuarioFilter())->getInputFilter());
        
        $id = new Element\Hidden('id');
        $this->add($id);
        
        //Nome
        $nome = new Element\Text('nome');
        $nome->setLabel('Nome Completo')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $nome->setAttributes(array(
            'placeholder' => 'Nome'
        ));
        $this->add($nome);


        //Email
        $email = new Element\Email('email');
        $email->setLabel('Email')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $email->setAttributes(array(
            'placeholder' => 'Email'
        ));
        $this->add($email);


        //Senha
        $senha = new Element\Password('senha');
        $senha->setLabel('Senha')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $senha->setAttributes(array(
            'placeholder' => 'Senha'
        ));
        $this->add($senha);


        //Confirmar senha
        $comfirmarSenha = new Element\Password('confirmarsenha');
        $comfirmarSenha->setLabel('Confirmar senha')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $comfirmarSenha->setAttributes(array(
            'placeholder' => 'confirmar senha'
        ));
        $this->add($comfirmarSenha);

        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);
    }
}