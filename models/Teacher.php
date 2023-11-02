<?php

namespace app\models;

use app\core\Application;
use app\core\Database;
use app\core\Request;
use app\core\Response;

class Teacher 
{
    

    public function register_tea($body){
        // var_dump($body);
        // exit;
        $query = "INSERT INTO teacher(name,email,password) VALUES(:name,:email,:password)";
        $statement= Application::$app->db->pdo->prepare($query);
        
        $statement->bindValue(':name',$body["username"]);
        $statement->bindValue(':email',$body["email"]);
        $statement->bindValue(':password',$body["password"]);
        $statement->execute();
        ;
        
    } 

    public function getTeacherByemailAndPassword($email,$pass){
        $query = "SELECT * FROM teacher WHERE email=:email AND password=:pass";
        $statement= Application::$app->db->pdo->prepare($query);
        
        $statement->bindValue(':email',$email);
        $statement->bindValue(':pass',$pass);
        
        $tea=$statement->execute();
        $teacher = $statement->fetchObject();
        return $teacher;

    }
    




}