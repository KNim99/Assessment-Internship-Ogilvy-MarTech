<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Request;
use app\core\Response;

class Student 
{
    

    public function register_Stu($body){
        // var_dump($body);
        // exit;
        $query = "INSERT INTO student(name,email,password) VALUES(:name,:email,:password)";
        $statement= Application::$app->db->pdo->prepare($query);
        
        $statement->bindValue(':name',$body["username"]);
        $statement->bindValue(':email',$body["email"]);
        $statement->bindValue(':password',$body["password"]);
        $statement->execute();
        
        
    } 
    public function getStudentByemailAndPassword($email,$pass){
        $query = "SELECT * FROM student WHERE email=:email AND password=:pass";
        $statement= Application::$app->db->pdo->prepare($query);
        
        $statement->bindValue(':email',$email);
        $statement->bindValue(':pass',$pass);
        
        $stu=$statement->execute();
        $student=$statement->fetchObject();
        return $student;

    }




}