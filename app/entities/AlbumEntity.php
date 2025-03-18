<?php

namespace App\entities;
use DateTime;

class AlbumEntity
{
    private string $id;
    private string $title;
    private ?string $artistId;
    private ?DateTime $releaseDate;
    private string $albumType;
    private ?string $albumCover;
    private DateTime $createdAt;
    private DateTime $updatedAt;
    private ?DateTime $deletedAt;

    public function __construct(
        string $id,
        string $title,
        ?string $artistId,
        ?DateTime $releaseDate,
        string $albumType,
        ?string $albumCover,
        ?DateTime $deletedAt = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->artistId = $artistId;
        $this->releaseDate = $releaseDate;
        $this->albumType = $albumType;
        $this->albumCover = $albumCover;
        $this->deletedAt = $deletedAt;
    }

    // Getters
    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getArtistId(): ?string
    {
        return $this->artistId;
    }

    public function getReleaseDate(): ?DateTime
    {
        return $this->releaseDate;
    }

    public function getAlbumType(): string
    {
        return $this->albumType;
    }

    public function getAlbumCover(): ?string
    {
        return $this->albumCover;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }

    // Setters
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setArtistId(?string $artistId): void
    {
        $this->artistId = $artistId;
    }

    public function setReleaseDate(?DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function setAlbumType(string $albumType): void
    {
        $this->albumType = $albumType;
    }

    public function setAlbumCover(?string $albumCover): void
    {
        $this->albumCover = $albumCover;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function setDeletedAt(?DateTime $deletedAt): void
    {
        $this->deletedAt = $deletedAt;
    }
}

?>