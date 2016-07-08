<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;


class ReceitaRepository extends EntityRepository
{
    function findReceitas(Conta $conta){
       return $this->findBy(array(
           'conta' => $conta,
           'tipo' => 'receita'
       ));
    }
}
