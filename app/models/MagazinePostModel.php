<?php

namespace App\models;

use App\repositories\MagazinePostRepository;
use App\entities\MagazinePostEntity;
use Core\helper\Mapper;

class MagazinePostModel {
    private $repository;

    public function __construct() {
        $this->repository = new MagazinePostRepository();
    }

    public function getAllPosts() {
        return $this->repository->getAllItem();
    }

    public function getPostById($id) {
        return $this->repository->getItemById($id);
    }

    public function createPost($data) {
        $entity = Mapper::DataToEntity(MagazinePostEntity::class, $data);
        return $this->repository->create($entity);
    }

    public function updatePost($data) {
        $entity = Mapper::DataToEntity(MagazinePostEntity::class, $data);
        return $this->repository->update($entity);
    }

    public function deletePost($id) {
        return $this->repository->delete($id);
    }

    public function softDeletePost($id) {
        return $this->repository->softDelete($id);
    }
}
