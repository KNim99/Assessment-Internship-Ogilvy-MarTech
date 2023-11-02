<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\core\Session;

use app\models\Student;
use app\models\Teacher;

class AuthController extends Controller
{
    



   
    public function logout(Request $req, Response $res){
           Application::$app->logout();
           return $res->redirect("/");
    }

    
//    Customer
    public function student_register(Request $request,Response $response)
    {
        $student = new Student();
        $teacher = new Teacher();
        if ($request->isPost()){
            
            $body=$request->getbody();
            if ($body['user-type']=='student') {
                $student->register_Stu($body);
            }else {
                $teacher->register_tea($body);
            }
           
            return $response->redirect('/');

        }
//        $this->setLayout('main');    }

    
}

}