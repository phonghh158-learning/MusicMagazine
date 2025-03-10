<?php

namespace App\entities;

use DateTime;

class PlaylistEntity
{
    private string $id;
    private string $title;
    private ?string $description;
    private ?string $playlistCategory;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private ?DateTime $deletedAt;

    public function __construct(
        string $id,
        string $title,
        ?string $description = null,
        ?string $playlistCategory = null,
        DateTime $createdAt,
        DateTime $updatedAt,
        ?DateTime $deletedAt = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->playlistCategory = $playlistCategory;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    // Getters
    public function getId(): string { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getDescription(): ?string { return $this->description; }
    public function getPlaylistCategory(): ?string { return $this->playlistCategory; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }
    public function getUpdatedAt(): DateTime { return $this->updatedAt; }
    public function getDeletedAt(): ?DateTime { return $this->deletedAt; }

    // Setters
    public function setId(string $id): void { $this->id = $id; }
    public function setTitle(string $title): void { $this->title = $title; }
    public function setDescription(?string $description): void { $this->description = $description; }
    public function setPlaylistCategory(?string $playlistCategory): void { $this->playlistCategory = $playlistCategory; }
    public function setCreatedAt(DateTime $createdAt): void { $this->createdAt = $createdAt; }
    public function setUpdatedAt(DateTime $updatedAt): void { $this->updatedAt = $updatedAt; }
    public function setDeletedAt(?DateTime $deletedAt): void { $this->deletedAt = $deletedAt; }
}

?>