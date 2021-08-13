<?php
namespace Src\TableGateways;

class RecordGateway {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                id, title, content
            FROM
                notes;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($title)
    {
        $statement = "
            SELECT 
                id, title, content
            FROM
                notes
            WHERE title = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($title));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO notes
                (title, content)
            VALUES
                (:title, :content);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'title' => $input['title'],
                'content'  => $input['content'],
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update(Array $input)
    {
        $statement = "
            UPDATE notes
            SET 
                content  = :content
            WHERE title = :title;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'title' => $input['title'],
                'content'  => $input['content'],
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM notes
            WHERE title = :title;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('title' => $id));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }
}