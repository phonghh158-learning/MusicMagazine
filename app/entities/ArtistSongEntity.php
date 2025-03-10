<?php

namespace App\entities;

use DateTime;

class ArtistSongEntity
{
    private string $id;
    private string $artistId;
    private string $songId;
    private string $role;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(
        string $id,
        string $artistId,
        string $songId,
        string $role,
        DateTime $createdAt,
        DateTime $updatedAt
    ) {
        $this->id = $id;
        $this->artistId = $artistId;
        $this->songId = $songId;
        $this->role = $role;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getters
    public function getId(): string { return $this->id; }
    public function getArtistId(): string { return $this->artistId; }
    public function getSongId(): string { return $this->songId; }
    public function getRole(): string { return $this->role; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }
    public function getUpdatedAt(): DateTime { return $this->updatedAt; }

    // Setters
    public function setId(string $id): void { $this->id = $id; }
    public function setArtistId(string $artistId): void { $this->artistId = $artistId; }
    public function setSongId(string $songId): void { $this->songId = $songId; }
    public function setRole(string $role): void { $this->role = $role; }
    public function setCreatedAt(DateTime $createdAt): void { $this->createdAt = $createdAt; }
    public function setUpdatedAt(DateTime $updatedAt): void { $this->updatedAt = $updatedAt; }
}

?>