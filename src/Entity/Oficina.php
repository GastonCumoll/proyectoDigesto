<?php

namespace App\Entity;

use App\Repository\OficinaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OficinaRepository::class)
 */
class Oficina
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=TipoNorma::class, mappedBy="oficina")
     */
    private $tipoNorma;

    public function __construct()
    {
        $this->tipoNorma = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nombre;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|TipoNorma[]
     */
    public function getTipoNorma(): Collection
    {
        return $this->tipoNorma;
    }

    public function addTipoNorma(TipoNorma $tipoNorma): self
    {
        if (!$this->tipoNorma->contains($tipoNorma)) {
            $this->tipoNorma[] = $tipoNorma;
            $tipoNorma->setOficina($this);
        }

        return $this;
    }

    public function removeTipoNorma(TipoNorma $tipoNorma): self
    {
        if ($this->tipoNorma->removeElement($tipoNorma)) {
            // set the owning side to null (unless already changed)
            if ($tipoNorma->getOficina() === $this) {
                $tipoNorma->setOficina(null);
            }
        }

        return $this;
    }
}