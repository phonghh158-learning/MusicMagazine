<?php

namespace App\entities;

use DateTime;

class ArtistEntity
{
    private string $id;
    private string $realName;
    private string $artistName;
    private ?string $bio;
    private ?string $artistAvatar;
    private ?string $artistCover;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private ?DateTime $deletedAt;

    public function __construct(
        string $id,
        string $realName,
        string $artistName,
        ?string $bio,
        ?string $artistAvatar,
        ?string $artistCover,
        DateTime $createdAt,
        DateTime $updatedAt,
        ?DateTime $deletedAt = null
    ) {
        $this->id = $id;
        $this->realName = $realName;
        $this->artistName = $artistName;
        $this->bio = $bio;
        $this->artistAvatar = $artistAvatar;
        $this->artistCover = $artistCover;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    // Getters
    public function getId(): string { return $this->id; }
    public function getRealName(): string { return $this->realName; }
    public function getArtistName(): string { return $this->artistName; }
    public function getBio(): ?string { return $this->bio; }
    public function getArtistAvatar(): ?string { return $this->artistAvatar; }
    public function getArtistCover(): ?string { return $this->artistCover; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }
    public function getUpdatedAt(): DateTime { return $this->updatedAt; }
    public function getDeletedAt(): ?DateTime { return $this->deletedAt; }

    // Setters
    public function setId(string $id): void { $this->id = $id; }
    public function setRealName(string $realName): void { $this->realName = $realName; }
    public function setArtistName(string $artistName): void { $this->artistName = $artistName; }
    public function setBio(?string $bio): void { $this->bio = $bio; }
    public function setArtistAvatar(?string $artistAvatar): void { $this->artistAvatar = $artistAvatar; }
    public function setArtistCover(?string $artistCover): void { $this->artistCover = $artistCover; }
    public function setCreatedAt(DateTime $createdAt): void { $this->createdAt = $createdAt; }
    public function setUpdatedAt(DateTime $updatedAt): void { $this->updatedAt = $updatedAt; }
    public function setDeletedAt(?DateTime $deletedAt): void { $this->deletedAt = $deletedAt; }
}

?>