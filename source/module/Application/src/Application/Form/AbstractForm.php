<?php

namespace Application\Form;


abstract class AbstractForm extends \Base\Form\AbstractForm {

    public function __construct($name = null) {
        parent::__construct($name);
    }
}
