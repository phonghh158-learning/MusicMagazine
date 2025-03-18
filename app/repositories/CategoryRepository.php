<?php

    namespace App\repositories;

    use App\entities\MagazinePostEntity;
    use App\repositories\BaseRepository;
    use Core\helper\Mapper;
    use PDO;
    use PDOException;

    class CategoryRepository extends BaseRepository {
        public function __construct() {
            parent::__construct('categories', MagazinePostEntity::class);
        }
    }

?>
