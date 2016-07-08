<?php

namespace Application\Entity;

use Base\Service\SessionService;
use Doctrine\ORM\EntityRepository;


class ContaRepository extends EntityRepository
{
    public function findConta(){
       return $this->findBy(array(
           'cliente'    => $this->_em->find('Application\Entity\Cliente', (new SessionService())->getIdUsuarioLogado()),
       ));
    }
}
