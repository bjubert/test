<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 * @Vich\Uploadable
 *  @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_ADMIN')"},
 *     collectionOperations={
 *         "post"={"access_control"="is_granted('ROLE_ADMIN')"},
 *         "get"={"access_control"="is_granted('ROLE_USER')"}
 *     }
 * )
 */
class Facture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_client;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pdf;

    /**
     * @Vich\UploadableField(mapping="pdf_facture", fileNameProperty="pdf")
     * @var File
     */
    private $pdfDoc;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?Utilisateur
    {
        return $this->id_client;
    }

    public function setIdClient(?Utilisateur $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function setPdf($pdf)
    {
        $this->pdf = $pdf;
    }

    public function getPdf()
    {
        return $this->pdf;
    }

    public function setPdfDoc(File $pdf = null)
    {
        $this->pdfDoc = $pdf;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($pdf) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->id = $this->getId();
        }
    }

    public function getPdfDoc()
    {
        return $this->pdfDoc;
    }


}
