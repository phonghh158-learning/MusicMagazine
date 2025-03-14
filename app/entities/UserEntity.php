<?php

    namespace App\entities;

    use DateTime;

    class UserEntity
    {
        private string $id;
        private string $username;
        private string $email;
        private ?DateTime $emailVerifiedAt;
        private string $password;
        private string $role;
        private ?string $avatar;
        private ?string $bio;
        private string $status;
        private ?string $rememberToken;
        private DateTime $createdAt;
        private DateTime $updatedAt;
        private ?DateTime $deletedAt;

        public function __construct(
            string $id,
            string $username,
            string $email,
            ?DateTime $emailVerifiedAt,
            string $password,
            string $role,
            ?string $avatar,
            ?string $bio,
            string $status,
            ?string $rememberToken,
            DateTime $createdAt,
            DateTime $updatedAt,
            ?DateTime $deletedAt
        ) {
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->emailVerifiedAt = $emailVerifiedAt;
            $this->password = $password;
            $this->role = $role;
            $this->avatar = $avatar;
            $this->bio = $bio;
            $this->status = $status;
            $this->rememberToken = $rememberToken;
            $this->createdAt = $createdAt;
            $this->updatedAt = $updatedAt;
            $this->deletedAt = $deletedAt;
        }

        // Getter Methods
        public function getId(): string { return $this->id; }
        public function getUsername(): string { return $this->username; }
        public function getEmail(): string { return $this->email; }
        public function getEmailVerifiedAt(): ?DateTime { return $this->emailVerifiedAt; }
        public function getPassword(): string { return $this->password; }
        public function getRole(): string { return $this->role; }
        public function getAvatar(): ?string { return $this->avatar; }
        public function getBio(): ?string { return $this->bio; }
        public function getStatus(): string { return $this->status; }
        public function getrememberToken(): ?string { return $this->rememberToken; }
        public function getCreatedAt(): DateTime { return $this->createdAt; }
        public function getUpdatedAt(): DateTime { return $this->updatedAt; }
        public function getDeletedAt(): ?DateTime { return $this->deletedAt; }

        // Setter Methods
        public function setId(string $id): void { $this->id = $id; }
        public function setUsername(string $username): void { $this->username = $username; }
        public function setEmail(string $email): void { $this->email = $email; }
        public function setEmailVerifiedAt(?DateTime $emailVerifiedAt): void { $this->emailVerifiedAt = $emailVerifiedAt; }
        public function setPassword(string $password): void { $this->password = $password; }
        public function setRole(string $role): void { $this->role = $role; }
        public function setAvatar(?string $avatar): void { $this->avatar = $avatar; }
        public function setBio(?string $bio): void { $this->bio = $bio; }
        public function setStatus(string $status): void { $this->status = $status; }
        public function setrememberToken(?string $rememberToken): void { $this->rememberToken = $rememberToken; }
        public function setCreatedAt(DateTime $createdAt): void { $this->createdAt = $createdAt; }
        public function setUpdatedAt(DateTime $updatedAt): void { $this->updatedAt = $updatedAt; }
        public function setDeletedAt(?DateTime $deletedAt): void { $this->deletedAt = $deletedAt; }
    }

?>