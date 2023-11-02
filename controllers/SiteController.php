<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\models\Student;
use app\models\Teacher;

class SiteController extends Controller
{
    public function home(Request $req,Response $res)
    {
        return $res->render('register','home');
        
    }
   

    public function loginPage(Request $req, Response $res){
        $student= new Student();
        $teacher = new Teacher();
        if ($req->isPost()) {
            $body = $req->getBody();
            if ($body['user-type']=='student') {
                $email=$body['email'];
                $pass=$body['password'];
                $stu= $student->getStudentByemailAndPassword($email,$pass);
                if ($stu) {
                    $studentJSON = json_encode($stu);
                    echo "<script>";
                    echo "localStorage.setItem('user', '" . addslashes($studentJSON) . "');";
                    echo "</script>";
                    
                } else {
                   return $res->redirect('/login');
                }
                
            }else {
                $email=$body['email'];
                $pass=$body['password'];
                $tea= $teacher->getTeacherByemailAndPassword($email,$pass);
                if ($tea) {
                    $teacherJSON = json_encode($tea);
                    echo "<script>";
                    echo "localStorage.setItem('user', '" . addslashes($teacherJSON) . "');";
                    echo "</script>";
                    return $res->render('teacherhome','main');
                } else {
                    return $res->redirect('/login');
                }
            }
        }else{
            return $res->render('login','main');
        }
        
    }
}