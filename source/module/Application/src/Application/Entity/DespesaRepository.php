<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;


class DespesaRepository extends EntityRepository
{
    function findDespesa(Conta $conta){
       return $this->findBy(array(
           'conta' => $conta,
           'tipo' => 'despesa'
       ));
    }
}
