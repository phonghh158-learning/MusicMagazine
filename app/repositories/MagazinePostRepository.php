<?php

namespace App\repositories;

use App\entities\MagazinePostEntity;
use App\repositories\BaseRepository;
use Core\helper\Mapper;
use PDO;
use PDOException;

class MagazinePostRepository extends BaseRepository {
    public function __construct() {
        parent::__construct('magazine_posts', MagazinePostEntity::class);
    }

    public function getPostsByAuthor($authorId) {
        try {
            $sqlQuery = $this->pdo->prepare (
                "SELECT * FROM {$this->table} WHERE author_id = :author_id AND deleted_at IS NULL"
            );
            $sqlQuery->execute(['author_id' => $authorId]);
            $data = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
            return array_map(fn($item) => Mapper::DataToEntity($this->entityClass, $item), $data);
        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return [];
        }
    }

    public function getPostByCategory($categoryId) {
        try {
            $sqlQuery = $this->pdo->prepare(
                "SELECT * FROM {$this->table} WHERE category_id = :category_id AND deleted_at IS NULL"
            );
            $sqlQuery->execute(['category_id' => $categoryId]);
            $data = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
            return array_map(fn($item) => Mapper::DataToEntity($this->entityClass, $item), $data);
        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
        }  
    }
}
