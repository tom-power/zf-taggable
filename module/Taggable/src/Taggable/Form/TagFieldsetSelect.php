<?php

namespace Taggable\Form;

use Doctrine\Common\Persistence\ObjectManager;
use ZfCrud\Form\AbstractZfCrudFieldset;

class TagFieldsetSelect extends AbstractZfCrudFieldset {

    public function __construct(ObjectManager $objectManager) {

        parent::__construct($objectManager, new \Taggable\Entity\Tag());

        $this->add(array(
            'name' => 'id',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Tag',
                'object_manager' => $objectManager,
                'target_class' => 'Taggable\Entity\Tag',
                'property' => 'name',
                'empty_option' => '',
            )
        ));
    }

    public function getInputFilterSpecification() {
        return array(
            'id' => array(
                'required' => false
            ),
            'name' => array(
                'required' => false
            ),
        );
    }

}
