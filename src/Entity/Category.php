<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $name;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="childs")
     * @ORM\JoinColumn(referencedColumnName="id", name="parent_id", nullable=true)
     */
    private $parent;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="parent")
     */
    private $childs;

    public function __construct()
    {
        $this->childs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Category
     */
    public function getParent(): Category
    {
        return $this->parent;
    }

    /**
     * @param Category $parent
     */
    public function setParent(Category $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return ArrayCollection
     */
    public function getChilds(): ArrayCollection
    {
        return $this->childs;
    }

    /**
     * @param ArrayCollection $childs
     */
    public function setChilds(ArrayCollection $childs): void
    {
        $this->childs = $childs;
    }

    /**
     * @param Category $category
     */
    public function addChild(Category $category)
    {
        $this->childs->add($category);
    }
}
