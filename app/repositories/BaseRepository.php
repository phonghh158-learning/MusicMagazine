<?php

    namespace App\repository;

    use Core\Database;
    use Core\helper\Mapper;
    use PDO;
    use PDOException;
    use DateTime;
    use DateTimeZone;

    abstract class BaseRepository {
        protected $pdo;
        protected $table;
        protected $entityClass;

        public function __construct($table, $entityClass) {
            $this->pdo = Database::getInstance()->getConnection();
            $this->table = $table;
            $this->entityClass = $entityClass;
        }

        // GET ALL ITEM
        public function getAllItem() {
            try {
                $sqlQuery = $this->pdo->query(
                    "SELECT * FROM {$this->table}
                    WHERE deleted_at IS NULL"
                );
                $data = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
                return array_map(fn($item) => Mapper::DataToEntity($this->entityClass, $item), $data);
            } catch (PDOException $e) {
                error_log("Error: " . $e->getMessage());
                return [];
            }
        }

        // GET ITEM BY ID
        public function getItemById($id) {
            try {
                $sqlQuery = $this->pdo->prepare(
                    "SELECT * FROM {$this->table}
                    WHERE id = :id AND deleted_at IS NULL 
                    LIMIT 1"
                );
                $sqlQuery->execute(['id' => $id]);
                $data = $sqlQuery->fetch(PDO::FETCH_ASSOC);
                return $data ? Mapper::DataToEntity($this->entityClass, $data) : null;
            } catch (PDOException $e) {
                error_log("Error: " . $e->getMessage());
                return null;
            }
        }

        // CREATE
        public function create($entity) {
            try {
                $data = Mapper::EntityToData($entity);
                $columns = array_keys($data);
                $values = array_values($data);

                $valuesString = implode(", ", array_fill(0, sizeof($values), "?"));
                $sqlQuery = $this->pdo->prepare(
                    "INSERT INTO {$this->table}
                    (" . implode(", ", $columns) . ") 
                    VALUES ($valuesString)");
                
                return $sqlQuery->execute($values);
            } catch (PDOException $e) {
                error_log("Error: " . $e->getMessage());
                return false;
            }
        }

        public function update($data) {
            if (!isset($data['id'])) {
                error_log("Error: Missing ID in update data");
                return false;
            }
            
            try {
                $keys = array_keys($data);
                $setString = implode(', ', array_map(fn($key) => "{$key} = :{$key}", $keys));
                $sqlQuery = $this->pdo->prepare(
                    "UPDATE {$this->table}
                    SET $setString 
                    WHERE id = :id");

                return $sqlQuery->execute($data);
            } catch (PDOException $e) {
                error_log("Error: " . $e->getMessage());
                return false;
            }
        }

        // DELETE
        public function delete($id) {
            $sqlQuery = $this->pdo->prepare(
                "DELETE FROM {$this->table}
                WHERE id = :id");
            return $sqlQuery->execute(['id' => $id]);
        }

        // SOFT DELETE
        public function softDelete($id) {
            $entity = $this->getItemById($id);

            if ($entity === null) {
                return false;
            }

            try {
                $sqlQuery = $this->pdo->prepare(
                    "UPDATE {$this->table}
                    SET deleted_at = :deleted_at 
                    WHERE id = :id");

                $now = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                $now = $now->format('Y-m-d H:i:s');

                return $sqlQuery->execute(["id" => $id, "deleted_at" => $now]);
            } catch (PDOException $e) {
                error_log("Error: " . $e->getMessage());
                return false;
            }
        }

        // GET ID
        public function getId($id) {
            $sqlQuery = $this->pdo->query(
                "SELECT token FROM {$this->table}
                WHERE id = :id"
            );
            $sqlQuery->execute(['id' => $id]);
            $data = $sqlQuery->fetch(PDO::FETCH_ASSOC);
            return $data['id'] ?? null;
        }
    }

?>
