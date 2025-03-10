<?php

namespace App\entities;

use DateTime;

class MusicVoteEntity
{
    private string $id;
    private string $songId;
    private string $userId;
    private int $rating;
    private ?string $comment;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private ?DateTime $deletedAt;

    public function __construct(
        string $id,
        string $songId,
        string $userId,
        int $rating,
        ?string $comment = null,
        DateTime $createdAt,
        DateTime $updatedAt,
        ?DateTime $deletedAt = null
    ) {
        $this->id = $id;
        $this->songId = $songId;
        $this->userId = $userId;
        $this->rating = $rating;
        $this->comment = $comment;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    // Getters
    public function getId(): string { return $this->id; }
    public function getSongId(): string { return $this->songId; }
    public function getUserId(): string { return $this->userId; }
    public function getRating(): int { return $this->rating; }
    public function getComment(): ?string { return $this->comment; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }
    public function getUpdatedAt(): DateTime { return $this->updatedAt; }
    public function getDeletedAt(): ?DateTime { return $this->deletedAt; }

    // Setters
    public function setId(string $id): void { $this->id = $id; }
    public function setSongId(string $songId): void { $this->songId = $songId; }
    public function setUserId(string $userId): void { $this->userId = $userId; }
    public function setRating(int $rating): void { $this->rating = $rating; }
    public function setComment(?string $comment): void { $this->comment = $comment; }
    public function setCreatedAt(DateTime $createdAt): void { $this->createdAt = $createdAt; }
    public function setUpdatedAt(DateTime $updatedAt): void { $this->updatedAt = $updatedAt; }
    public function setDeletedAt(?DateTime $deletedAt): void { $this->deletedAt = $deletedAt; }
}

?>