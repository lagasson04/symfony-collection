<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FooRepository")
 */
class Foo
{
    /**
     * @var int|null
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Bar", mappedBy="foo", cascade={"persist"}, orphanRemoval=true)
     */
    private $bars;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Item", mappedBy="foo", cascade={"persist"}, orphanRemoval=true)
     */
    private $items;

    /**
     * Foo constructor.
     */
    public function __construct()
    {
        $this->bars = new ArrayCollection();
        $this->items = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Collection
     */
    public function getBars(): Collection
    {
        return $this->bars;
    }

    /**
     * @param Bar $bar
     */
    public function addBar(Bar $bar)
    {
        $bar->setFoo($this);
        $this->bars->add($bar);
    }

    /**
     * @param Bar $bar
     */
    public function removeBar(Bar $bar)
    {
        $bar->setFoo(null);
        $this->bars->removeElement($bar);
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Item $item
     */
    public function addItem(Item $item)
    {
        $item->setFoo($this);
        $this->items->add($item);
    }

    /**
     * @param Item $item
     */
    public function removeItem(Item $item)
    {
        $item->setFoo(null);
        $this->items->removeElement($item);
    }


}
