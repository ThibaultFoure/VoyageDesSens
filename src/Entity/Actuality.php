<?php

namespace App\Entity;

use App\Repository\ActualityRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;
use DateTimeImmutable;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


#[ORM\Entity(repositoryClass: ActualityRepository::class)]
#[Vich\Uploadable]
class Actuality
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 120)]
    private ?string $title;

    #[ORM\Column(type: "text")]
    private ?string $content;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $createdAt;

    #[Vich\UploadableField(mapping: "images", fileNameProperty: "picture")]
    #[Assert\File(maxSize: "1M", mimeTypes: ["image/jpeg", "image/png", "image/jpg"])]
    private ?\Symfony\Component\HttpFoundation\File\File $pictureFile = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $picture;

    #[ORM\Column(type: "datetime")]
    private ?DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->updatedAt = new DateTimeImmutable();
        $this->createdAt = new DateTimeImmutable();
    }

    public function setPictureFile(?File $pictureFile = null): void
    {
        $this->pictureFile = $pictureFile;
        if (null !== $pictureFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }
    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
