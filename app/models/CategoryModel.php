<?php

    namespace App\models;

    use App\repositories\CategoryRepository;
    use App\entities\CategoryEntity;

    class CategoryModel {
        private $repository;

        public function __construct()
        {
            $this->repository = new CategoryRepository();   
        }

        public function getAllCategories() {
            return $this->repository->getAllItem();
        }

        public function getCategoryById($id) {
            return $this->repository->getItemById($id);
        }

        public function createCategory($id, $name, $description, $createdAt, $updatedAt, $deletedAt) {
            $entity = new CategoryEntity($id, $name, $description, $createdAt, $updatedAt, $deletedAt);
            return $this->repository->create($entity);
        }

        public function updateCategory($data) {
            return $this->repository->update($data);
        }

        public function deleteCategory($id) {
            return $this->repository->delete($id);
        }
    }

?>