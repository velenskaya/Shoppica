<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="parent")
     */
    private $childs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="category")
     */
    private $products;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */

    private $slug;

    public function __construct()
    {
        $this->childs = new ArrayCollection();
        $this->products = new ArrayCollection();
        //$this->brands = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
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
    public function getParent(): ?Category
    {
        return $this->parent;
    }

    /**
     * @param Category $parent
     */
    public function setParent(Category $parent = null): void
    {
        $this->parent = $parent;
    }

    /**
     * @return Collection|Category[]
     */
    public function getChilds(): Collection
    {
        return $this->childs;
    }

    /**
     * @param Collection $childs
     */
    public function setChilds(Collection $childs): void
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

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

}
