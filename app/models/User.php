<?php

class User{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function register($data){
        $this->db->query('INSERT INTO users(email, userid, name, password, created_at) VALUES(:email, :userid, :name, :password, :created_at)');

        $this->db->bind(':email', $data['email']);
        $this->db->bind(':userid', $data['userid']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':created_at', date("Y-m-d H:i:s", time()));

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');

        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($row){
            $hashedPassword = $row->password;

            if(password_verify($password, $hashedPassword)){
                return $row;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');

        $this->db->bind(':email', $email);

        $this->db->execute();

        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}