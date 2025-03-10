<?php

namespace App\entities;

use DateTime;

class PlaylistSongEntity
{
    private string $id;
    private string $playlistId;
    private string $songId;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(
        string $id,
        string $playlistId,
        string $songId,
        DateTime $createdAt,
        DateTime $updatedAt
    ) {
        $this->id = $id;
        $this->playlistId = $playlistId;
        $this->songId = $songId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    // Getters
    public function getId(): string { return $this->id; }
    public function getPlaylistId(): string { return $this->playlistId; }
    public function getSongId(): string { return $this->songId; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }
    public function getUpdatedAt(): DateTime { return $this->updatedAt; }

    // Setters
    public function setId(string $id): void { $this->id = $id; }
    public function setPlaylistId(string $playlistId): void { $this->playlistId = $playlistId; }
    public function setSongId(string $songId): void { $this->songId = $songId; }
    public function setCreatedAt(DateTime $createdAt): void { $this->createdAt = $createdAt; }
    public function setUpdatedAt(DateTime $updatedAt): void { $this->updatedAt = $updatedAt; }
}

?>