<?php

namespace Acl\Service;

use Base\Model\AbstractModel;
use Doctrine\ORM\EntityManager;

class Resource extends AbstractModel
{
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = 'Acl\Entity\Resource';
    }
    
    
}
