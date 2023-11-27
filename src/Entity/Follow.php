<?php

namespace App\Entity;

use App\Entity\Traits\HasIdTrait;
use App\Repository\FollowRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FollowRepository::class)]
class Follow
{
    use HasIdTrait;

    #[ORM\ManyToOne(inversedBy: 'followers')]
    private ?User $follower = null;

    #[ORM\ManyToOne(inversedBy: 'followees')]
    private ?User $followee = null;

    public function getFollower(): ?User
    {
        return $this->follower;
    }

    public function setFollower(?User $follower): static
    {
        $this->follower = $follower;

        return $this;
    }

    public function getFollowee(): ?User
    {
        return $this->followee;
    }

    public function setFollowee(?User $followee): static
    {
        $this->followee = $followee;

        return $this;
    }
    
}
