<?php

require_once 'config.php';

class Database {
  private $conn;
  protected $result;

  /**
   * This is constructer which make a connection to DB.
   *
   * @return void
   */
  function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASSWORD);
    } catch (PDOException $e) {
      echo 'Error in connection ' . $e->getMessage();
    }
  }

  /**
   * This is a  destructer which close connection to DB.
   *
   * @return void
   */
  function __destruct()
  {
    $this->conn = null;
  }

  /**
   * This function run sql query.
   *
   * @param  mixed $sql
   *   Sql qruery string.
   * @param  mixed $params
   *   Parameters for sql.
   *
   * @return bool
   *   Returns true or false.
   */
  public function query(string $sql, $params = [], int $limit = -1, int $offset = -1): bool
  {
    try {
      if (empty($params)) {
        $this->result = $this->conn->prepare($sql);
        if ($limit > 0) {
          $this->result->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        if ($offset > 0) {
          $this->result->bindParam(':offset', $offset, PDO::PARAM_INT);
        }
        return $this->result->execute();
      } else {
        $this->result = $this->conn->prepare($sql);
        if ($limit > 0) {
          $this->result->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        if ($offset > 0) {
          $this->result->bindParam(':offset', $offset, PDO::PARAM_INT);
        }
        return $this->result->execute($params);
      }
    } catch (PDOException $e) {
      echo 'Error in connection ' . $e->getMessage();
      return false;
    }
  }

  /**
   * This function returns row count.
   *
   * @return int
   *   Return row count.
   */
  public function row_count(): int
  {
    return $this->result->rowCount();
  }

  /**
   * This function returns all rows.
   *
   * @return array
   *   Return array.
   */
  public function fetch_all(): array
  {
    return $this->result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * This function returns first row.
   *
   * @return mixed
   *   Return array or null.
   */
  public function fetch(): mixed
  {
    return $this->result->fetch(PDO::FETCH_ASSOC);
  }
}
