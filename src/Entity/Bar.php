<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BarRepository")
 */
class Bar
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
     * @var Foo|null
     * @ORM\ManyToOne(targetEntity="Foo", inversedBy="bars")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $foo;

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
     * @return Foo|null
     */
    public function getFoo(): ?Foo
    {
        return $this->foo;
    }

    /**
     * @param Foo|null $foo
     */
    public function setFoo(?Foo $foo): void
    {
        $this->foo = $foo;
    }
}
