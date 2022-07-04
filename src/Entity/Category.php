<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\Length(max: 255, maxMessage: 'Le titre doit pas faire plus de {{ limit }} caractères')]
    #[Assert\NotBlank(message: 'Le titre ne peut pas être vide')]
    private string $title;

    #[ORM\OneToMany(targetEntity: Session::class, mappedBy: "category", cascade: ["persist", "remove"])]
    private Collection $sessions;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $description;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $priceDescription;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
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
     * @return Collection|Session[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->setCategory($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        // set the owning side to null (unless already changed)
        if ($this->sessions->removeElement($session) && $session->getCategory() === $this) {
            $session->setCategory(null);
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPriceDescription(): ?string
    {
        return $this->priceDescription;
    }

    public function setPriceDescription(?string $priceDescription): self
    {
        $this->priceDescription = $priceDescription;

        return $this;
    }
}
