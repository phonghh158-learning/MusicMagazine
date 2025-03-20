<?php

    namespace App\models;

    use App\repositories\CategoryRepository;
    use App\entities\CategoryEntity;
use Core\helper\Mapper;

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

        public function createCategory($data) {
            $entity = Mapper::DataToEntity(CategoryEntity::class, $data);
            return $this->repository->create($entity);
        }

        public function updateCategory($data) {
            $entity = Mapper::DataToEntity(CategoryEntity::class, $data);
            return $this->repository->update($entity);
        }

        public function deleteCategory($id) {
            return $this->repository->delete($id);
        }

        public function softDeleteCategory($id) {
            return $this->repository->softDelete($id);
        }
    }

?>