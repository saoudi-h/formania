<?php


namespace Formania\Models;

require_once '../App/DatabaseConnection.php';
use Formania\App\DatabaseConnection;


use PDO;

abstract class BaseModel
{
    protected $table;
    protected $fields = [];
    protected PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data)
    {
        $columns = [];
        $placeholders = [];
        $values = [];
        
        foreach ($this->fields as $field) {
            if (isset($data[$field])) {
                $columns[] = $field;
                $placeholders[] = ':' . $field;
                $values[':' . $field] = $data[$field];
            }
        }
        
        $columnList = implode(', ', $columns);
        $placeholderList = implode(', ', $placeholders);
        
        $sql = "INSERT INTO " . $this->table . " ($columnList) VALUES ($placeholderList)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        
        return $this->db->lastInsertId();
    }

    public function update($id, array $data)
    {
        $sets = [];
        $values = [];
        
        foreach ($this->fields as $field) {
            if (isset($data[$field])) {
                $sets[] = $field . ' = :' . $field;
                $values[':' . $field] = $data[$field];
            }
        }
        
        $setList = implode(', ', $sets);
        
        $sql = "UPDATE " . $this->table . " SET $setList WHERE id = :id";
        $values[':id'] = $id;
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        
        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->rowCount();
    }
}