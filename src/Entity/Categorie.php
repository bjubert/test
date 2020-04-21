<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 *  @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_ADMIN')"},
 *     collectionOperations={
 *         "post"={"access_control"="is_granted('ROLE_ADMIN')"},
 *         "get"={"access_control"="is_granted('ROLE_USER')"}
 *     }
 * )
 */
class Categorie
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
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }


}
