<?php
session_start();
require_once("/var/www/html/TP/app/libraries/controller.php");
class Doctors extends Controller{
    private $doctorModel;

    public function __construct(){
        $this->doctorModel = $this->loadModel("Doctor");
    }

    public function register(){
        $this->render("doctors/register.php", []);
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                "name" => "",
                "email" => "",
                "password" => "",
                "email_error" => "",
                "password_error" => "",
            ];
            $data["email"] = $_POST['email'];
            $data["password"] = $_POST["password"];
            $data["name"] = $_POST["name"];

            if($this->doctorModel->fetchDoctorByEmail($data["email"])){
                $data["email_error"] = "Email déjà utilisé";
                echo($data["email_error"]);
            }
            if(strlen($data["password"])<=6){
                $data["password_error"] = "Password too short";
                echo($data["password_error"]);
            }

            if(empty($data["email_error"]) && empty($data["password_error"])){
                $this->doctorModel->register($data);
                //header("Location: /TP/app/views/doctors/login.php");
                $this->render("doctors/register.php", $data);
            }
        }
        else
        {
            $this->render("doctors/register.php", []);
        }

    }

    public function login(){
        $this->render("doctors/login.php", []);
        if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                "email" => "",
                "password" => "",
                "email_error" => "",
                "password_error" => "",
            ];
            $data["email"] = $_POST['email'];
            $data["password"] = $_POST["password"];

            if($this->doctorModel->fetchDoctorByEmail($data["email"])){
                if($this->doctorModel->login($data['email'], $data['password'])){
                    setcookie(
                        'LOGGED_USER',
                        $data['email'],
                        [
                            'expires' => time() + 365*24*3600,
                            'secure' => true,
                            'httponly' => true,
                        ]
                    );
                    header("Location: /TP/public/index.php");
                }
                else{
                    echo "Password incorrect ";
                    $this->render("doctors/login.php", $data);
                }
            }
            else{
                $data["email_error"] = "Email non iscrit";
                echo($data["email_error"]);
            }
        }
        else
        {
            $this->render("doctors/login.php", []);
        }
        
    }

}
$d = new Doctors();
$d->login();