<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TestCategoryRepository")
 */
class TestCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TestProduct", mappedBy="categoria")
     */
    private $testProducts;

    public function __construct()
    {
        $this->testProducts = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|TestProduct[]
     */
    public function getTestProducts(): Collection
    {
        return $this->testProducts;
    }

    public function addTestProduct(TestProduct $testProduct): self
    {
        if (!$this->testProducts->contains($testProduct)) {
            $this->testProducts[] = $testProduct;
            $testProduct->setCategoria($this);
        }

        return $this;
    }

    public function removeTestProduct(TestProduct $testProduct): self
    {
        if ($this->testProducts->contains($testProduct)) {
            $this->testProducts->removeElement($testProduct);
            // set the owning side to null (unless already changed)
            if ($testProduct->getCategoria() === $this) {
                $testProduct->setCategoria(null);
            }
        }

        return $this;
    }
}
