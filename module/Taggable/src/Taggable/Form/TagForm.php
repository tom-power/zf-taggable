<?php

namespace Taggable\Form;

use Doctrine\Common\Persistence\ObjectManager;
use ZfCrud\Form\AbstractZfCrudForm;

class TagForm extends AbstractZfCrudForm {

    public function __construct(ObjectManager $objectManager) {

        parent::__construct($objectManager, new \Taggable\Entity\Tag());

        $this->setAttribute('method', 'post');

        $tagFieldset = new TagFieldset($objectManager);

        $tagFieldset->setUseAsBaseFieldset(true);
        $this->add($tagFieldset);


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
//            'tags' => array(
//                'required' => false,
//                'allow_empty' => true
//            ),
        );
    }

}
