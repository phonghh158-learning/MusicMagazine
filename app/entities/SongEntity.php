<?php

namespace App\entities;

use DateTime;

class SongEntity
{
    private string $id;
    private string $title;
    private ?string $albumId;
    private ?int $duration;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private ?DateTime $deletedAt;

    public function __construct(
        string $id,
        string $title,
        ?string $albumId,
        ?int $duration,
        DateTime $createdAt,
        DateTime $updatedAt,
        ?DateTime $deletedAt = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->albumId = $albumId;
        $this->duration = $duration;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    // Getters
    public function getId(): string { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getAlbumId(): ?string { return $this->albumId; }
    public function getDuration(): ?int { return $this->duration; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }
    public function getUpdatedAt(): DateTime { return $this->updatedAt; }
    public function getDeletedAt(): ?DateTime { return $this->deletedAt; }

    // Setters
    public function setId(string $id): void { $this->id = $id; }
    public function setTitle(string $title): void { $this->title = $title; }
    public function setAlbumId(?string $albumId): void { $this->albumId = $albumId; }
    public function setDuration(?int $duration): void { $this->duration = $duration; }
    public function setCreatedAt(DateTime $createdAt): void { $this->createdAt = $createdAt; }
    public function setUpdatedAt(DateTime $updatedAt): void { $this->updatedAt = $updatedAt; }
    public function setDeletedAt(?DateTime $deletedAt): void { $this->deletedAt = $deletedAt; }
}

?>