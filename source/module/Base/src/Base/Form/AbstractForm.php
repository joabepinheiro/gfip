<?php

namespace Base\Form;

use Zend\Form\Form;

abstract class AbstractForm extends Form {

    public function __construct($name = null) {
        parent::__construct($name);
    }
}
