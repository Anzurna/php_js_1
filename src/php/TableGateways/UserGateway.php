<?php
namespace Src\TableGateways;

class UserGateway {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                id, login, firstname, lastname, email
            FROM
                users;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($email)
    {
        $statement = "
            SELECT 
                id, login, firstname, lastname, email, pass
            FROM
                dev.users
            WHERE email like ?
        ";

        // try {
            $statement = $this->db->prepare($statement);
            $a = $statement->execute(["%$email%"]);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        // } catch (\PDOException $e) {
        //     exit($e->getMessage());
        // }    
    }

    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO users
                (login, firstname, lastname, email, pass)
            VALUES
                (:login, :firstname, :lastname, :email, :pass);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'login' => $input['login'],
                'firstname'  => $input['firstName'],
                'lastname' => $input['lastName'],
                'email' => $input['email'],
                'pass' => $input['password'],
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update(Array $input)
    {
        $statement = "
            UPDATE users
            SET 
                login = :login,
                firstname  = :firstname,
                lastname = :lastname ,
                
                pass = :pass
            WHERE email = :email;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'login' => $input['login'],
                'firstname'  => $input['firstName'],
                'lastname' => $input['lastName'],
                'email' => $input['email'],
                'pass' => $input['password'],
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($email)
    {
        $statement = "
            DELETE FROM users
            WHERE email = :email limit 1;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('email' => $email));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }
}