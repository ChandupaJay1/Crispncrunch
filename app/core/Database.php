<?php


/**
 * Base Class for interact with database
 */
class Database
{
    private ?PDO $connection = null;
    private string $dsn;
    private string $username;
    private string $password;


    /**
     * @throws Exception
     */
    public static function createInstance(string $connection, string $host, int $port, string $database, string $username, string $password): Database
    {
        $instance = new self();
        $instance->dsn = "$connection:host=$host;port=$port;dbname=$database";
        $instance->username = $username;
        $instance->password = $password;
        return $instance;
    }

    /**
     * @throws Exception
     */
    private function connect(): ?PDO
    {
        if($this->connection != null) return $this->connection;
        try {
            return $this->connection = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            handle($e, "dsn: $this->dsn\n\n");
            return null;
        }
    }

    /**
     * @desc Executes query and returns last insert id
     * @param string $sql query
     * @param array $params bind parameters
     * @return int insert id
     * @throws Exception
     */
    public function iud(string $sql, array $params = []): int
    {
        $conn = null;
        try {
            $conn = $this->connect();
            $stmt = $conn?->prepare($sql);
            $conn->beginTransaction();
            $stmt->execute($params);
            $id = $conn->lastInsertId();
            $conn->commit();
            return $id;
        } catch (PDOException $e) {
            $conn->rollback();
            handle($e);
            return -1;
        }
    }

    /**
     * @param string $sql
     * @param array $params
     * @param int $fetchType
     * @return array|object|null
     * @throws Exception
     */
    public function get(string $sql, array $params = [], int $fetchType = PDO::FETCH_OBJ): array|object|null
    {
        try {
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            if (!$stmt->execute($params)) {
                return null;
            }
            return $stmt->fetchAll($fetchType);
        } catch (Exception $e) {
            handle($e);
            return null;
        }
    }

    /**
     * Resets the auto increment id of a table to start after existing last id.
     * Use with caution as this action can lead to unexpected problems.
     *
     * @param string $table
     * @return bool
     * @throws Exception
     */
    protected function resetId(string $table): bool
    {
        $result = $this->get("SELECT MAX(ID) AS max_id FROM `$table`");
        $new_id = ++$result[0]["max_id"];
        try {
            return $this->ddl("ALTER TABLE `$table` AUTO_INCREMENT=$new_id");
        } catch (Exception $e) {
            handle($e);
            return false;
        }
    }

    /**
     * @param string $sql
     * @param array|null $data bind parameters
     * @return bool
     * @throws Exception
     */
    protected function ddl(string $sql, array $data = null): bool
    {
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        try {
            return $stmt->execute($data);
        } catch (PDOException $e) {
            handle($e, "\n\nquery: $stmt->queryString\ndata: " . json_encode($data) . "\n\n");
            return false;
        }
    }
}
