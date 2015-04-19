<?php

namespace Taggable\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZfCrud\Entity\AbstractZfCrudEntity;

/**
 * Taggable
 *
 * @ORM\Table
 * @ORM\Entity
 */
class Tag extends AbstractZfCrudEntity {

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    private $name;

    /**
     * Inverse Side
     *
     * @ORM\ManyToMany(targetEntity="Taggable", mappedBy="tags")
     */
    private $taggables;

    // <editor-fold defaultstate="collapsed" desc="getterSetter">
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    function getTaggables() {
        return $this->taggables;
    }

    function setTaggables($taggables) {
        $this->taggables = $taggables;
    }
    // </editor-fold>
}
