<?php

namespace Taggable\Form;

use Doctrine\Common\Persistence\ObjectManager;
use ZfCrud\Form\AbstractZfCrudForm;

class TaggableForm extends AbstractZfCrudForm {

    public function __construct(ObjectManager $objectManager) {

        parent::__construct($objectManager, new \Taggable\Entity\Taggable());

        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'name',
            'type' => 'text',
            'options' => array('label' => 'Name',),
        ));

        $tagFieldset = new TagFieldsetSelect($objectManager);

        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'tags',
            'options' => array(
                'label' => 'Tags',
                'count' => 0,
                'should_create_template' => true,
                'allow_add' => true,
                'target_element' => $tagFieldset,
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Add tag',
                'id' => 'addtag',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Remove tag',
                'id' => 'removetag',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Save',
                'id' => 'submitbutton',
            ),
        ));
    }

     public function getInputFilterSpecification() {
        return array(
            'tags' => array(
                'required' => false,
                'allow_empty' => true
            ),
        );
    }

}
