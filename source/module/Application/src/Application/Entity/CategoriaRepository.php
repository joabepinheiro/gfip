<?php

namespace Application\Entity;

use Base\Service\SessionService;
use Doctrine\ORM\EntityRepository;


class CategoriaRepository extends EntityRepository
{

    function findCategoriaReceita(){
       return $this->findBy(array(
           'cliente'    => $this->_em->find('Application\Entity\Cliente', (new SessionService())->getIdUsuarioLogado()),
           'tipo'       => 'receita'
       ));
    }

}
