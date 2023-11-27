<?php

namespace App\Entity;

use App\Entity\Traits\HasIdTrait;
use App\Repository\ThumbnailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThumbnailRepository::class)]
class Thumbnail
{
    use HasIdTrait;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $path = null;

    #[ORM\OneToOne(mappedBy: 'thumbnail', cascade: ['persist', 'remove'])]
    private ?Profil $profil = null;

    #[ORM\OneToOne(mappedBy: 'thumbnail', cascade: ['persist', 'remove'])]
    private ?Story $story = null;

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): static
    {
        // unset the owning side of the relation if necessary
        if ($profil === null && $this->profil !== null) {
            $this->profil->setThumbnail(null);
        }

        // set the owning side of the relation if necessary
        if ($profil !== null && $profil->getThumbnail() !== $this) {
            $profil->setThumbnail($this);
        }

        $this->profil = $profil;

        return $this;
    }

    public function getStory(): ?Story
    {
        return $this->story;
    }

    public function setStory(?Story $story): static
    {
        // unset the owning side of the relation if necessary
        if ($story === null && $this->story !== null) {
            $this->story->setThumbnail(null);
        }

        // set the owning side of the relation if necessary
        if ($story !== null && $story->getThumbnail() !== $this) {
            $story->setThumbnail($this);
        }

        $this->story = $story;

        return $this;
    }
}
