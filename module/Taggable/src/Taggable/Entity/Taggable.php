<?php

namespace Taggable\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ZfCrud\Entity\AbstractZfCrudEntity;
/**
 * Taggable
 *
 * @ORM\Table
 * @ORM\Entity
 */
class Taggable extends AbstractZfCrudEntity {

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
     *
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="taggables"))
     * @ORM\JoinTable(
     *      joinColumns={@ORM\JoinColumn(referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(referencedColumnName="id", unique=true)}
     *      )
     */
    private $tags;

    public function __construct() {
        $this->tags = new ArrayCollection();
    }

    /**
     * @param Collection $tags
     */
    public function addTags($tags) {
        foreach ($tags as $tag) {
            $this->tags->add($tag);
        }
    }

    /**
     * @param Collection $tags
     */
    public function removeTags($tags) {
        if ($tags == null || empty($tags)) {
            $this->tags->clear();
        }
        foreach ($tags as $tag) {
            $this->tags->removeElement($tag);
        }
    }

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

    function getTags() {
        return $this->tags;
    }

    function setTags($tags) {
        $this->tags = $tags;
    }

    // </editor-fold>
}
