<?php

    namespace App\repositories;

    use App\entities\CategoryEntity;
    use App\repositories\BaseRepository;

    class CategoryRepository extends BaseRepository {
        public function __construct() {
            parent::__construct('categories', CategoryEntity::class);
        }
    }

?>
