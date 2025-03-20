<?php

require_once __DIR__ . '/../core/helper/Mapper.php';

use Core\helper\Mapper;

class ProductEntity {
    public $id;
    public $name;
    public $price;
    public $description;
    public $productCategoryId;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    public function __construct($id, $name, $price, $description, $productCategoryId, $created_at, $updated_at, $deleted_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->productCategoryId = $productCategoryId;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
    }

    // Getter and Setter methods
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getProductCategoryId() {
        return $this->productCategoryId;
    }

    public function setProductCategoryId($productCategoryId) {
        $this->productCategoryId = $productCategoryId;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function getDeletedAt() {
        return $this->deleted_at;
    }

    public function setDeletedAt($deleted_at) {
        $this->deleted_at = $deleted_at;
    }
}

$product = new ProductEntity(2, 'Phone', '1000', 'This is a phone', 'Electronics', '2024-03-19 10:30:00', '2024-03-19 10:30:00', '2024-03-19 10:30:00');
$dataProduct = Mapper::EntityToData($product);
print_r($dataProduct);
print_r('<br>');

$productData = [
    'id' => '1',
    'name' => 'Laptop',
    'price' => '1500.99',
    'description' => 'This is a laptop',
    'product_category' => 'Electronics',
    'created_at' => '2024-03-19 10:30:00',
    'updated_at' => '2024-03-19 10:30:00',
    'deleted_at' => '2024-03-19 10:30:00'
];
$entity = Mapper::DataToEntity(ProductEntity::class, $productData);
foreach ($entity as $key => $value) {
    print_r($key . ': ' . $value);
    print_r('<br>');
}