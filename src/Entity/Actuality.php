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
    #[Assert\Length(max: 120, maxMessage: 'Le titre doit pas faire plus de {{ limit }} caractères')]
    #[Assert\NotBlank(message: 'Le titre ne peut pas être vide')]
    private ?string $title;

    #[ORM\Column(type: "text")]
    private ?string $content;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $createdAt;

    #[Vich\UploadableField(mapping: "medias", fileNameProperty: "media")]
    #[Assert\File(maxSize: "50M", mimeTypes: [
        "image/jpeg",
        "image/png",
        "image/jpg",
        "video/mp4",
        "video/webm",
        "video/quicktime",
        "video/x-msvideo",
        "video/mpeg",
    ])]
    private ?\Symfony\Component\HttpFoundation\File\File $mediaFile = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $media;

    #[ORM\Column(type: "datetime")]
    private ?DateTimeInterface $updatedAt = null;

    #[ORM\Column]
    private ?bool $isVideo = null;

    public function __construct()
    {
        $this->updatedAt = new DateTimeImmutable();
        $this->createdAt = new DateTimeImmutable();
    }

    public function setMediaFile(?File $mediaFile = null): void
    {
        $this->mediaFile = $mediaFile;
        if (null !== $mediaFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getMediaFile(): ?File
    {
        return $this->mediaFile;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
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

    public function getMedia(): ?string
    {
        return $this->media;
    }

    public function setMedia(?string $media): self
    {
        $this->media = $media;

        return $this;
    }

    public function isIsVideo(): ?bool
    {
        return $this->isVideo;
    }

    public function setIsVideo(bool $isVideo): self
    {
        $this->isVideo = $isVideo;

        return $this;
    }
}
