<?php

namespace App\models;

use App\repositories\MagazinePostRepository;
use App\entities\MagazinePostEntity;

class MagazinePostModel {
    private $repository;

    public function __construct() {
        $this->repository = new MagazinePostRepository();
    }

    public function createPost($id, $title, $content, $status, $categoryId, $createdAt, $updatedAt, $deletedAt) {
        $entity = new MagazinePostEntity($id, $title, $content, $status, $categoryId, $createdAt, $updatedAt, $deletedAt);
        return $this->repository->create($entity);
    }

    public function getAllPosts() {
        return $this->repository->getAllItem();
    }

    public function getPostById($id) {
        return $this->repository->getItemById($id);
    }

    public function updatePost($data) {
        return $this->repository->update($data);
    }

    public function deletePost($id) {
        return $this->repository->delete($id);
    }

    public function softDeletePost($id) {
        return $this->repository->softDelete($id);
    }
}
