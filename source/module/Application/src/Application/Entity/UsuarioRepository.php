<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;


class UsuarioRepository extends EntityRepository
{
    function findByEmailSenha($email, $senha){
        $usuario = $this->findOneBy(array('email' => $email));

        if(!is_null($usuario)) {
            $hashSenha = $usuario->encryptPassword($senha);

            if($hashSenha == $usuario->getSenha()){
                return $usuario;
            }
        }
        return false;
    }
}
