<?php

    namespace App\controllers;

    use App\models\CategoryModel;
    use Ramsey\Uuid\Uuid;
    use Exception;

    class CategoryController
    {
        private $model;

        public function __construct()
        {
            $this->model = new CategoryModel();
        }

        public function getAllCategorys()
        {
            return $this->model->getAllCategories();
        }

        public function getCategoryById($id)
        {
            return $this->model->getCategoryById($id);
        }

        public function create()
        {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;

                    $data['id'] = Uuid::uuid4()->toString();

                    return $this->model->createCategory($data);
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
            }
        }

        public function update()
        {
            try {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $data = $_POST;

                    return $this->model->updateCategory($data);
                }
            } catch (Exception $e) {
                error_log("Error: " . $e->getMessage());
            }
        }

        public function destroy($id)
        {
            return $this->model->deleteCategory($id);
        }

        public function softDelete($id)
        {
            return $this->model->softDeleteCategory($id);
        }
    }

?>
