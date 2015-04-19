<?php

namespace Taggable\Form;

use Doctrine\Common\Persistence\ObjectManager;
use ZfCrud\Form\AbstractZfCrudFieldset;

class TagFieldset extends AbstractZfCrudFieldset {

    public function __construct(ObjectManager $objectManager) {

        parent::__construct($objectManager, new \Taggable\Entity\Tag());

        $this->add(array(
            'name' => 'id',
            'type' => 'hidden'
        ));

        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'required' => 'required',
            ),
        ));
    }

}
