<?php

require_once('/var/www/html/TP/app/libraries/database.php');
class Doctor{
    private $id;
    private $name;
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function fetchDoctorByEmail($email){
        $this->db->prepare("SELECT email FROM doctors");
        return in_array($email, $this->db->single());
    }

    public function login($email, $password){
        $sql = "SELECT * FROM doctors WHERE email='".$email."' and password='".$password."';";
        $this->db->prepare($sql);
        return $this->db->single();
    }

    public function register($data){
        if(is_array($data)){
            $sql = "INSERT INTO doctors(name, email, password) VALUES ('".$data['name']."','".$data['email']."','".$data['password']."');";
            $this->db->prepare($sql);
            $this->db->execute();
            return true;
        }
        return false;
    }

    public function getDoctorById(int $doctor_id){
        $sql = "SELECT * FROM doctors WHERE idDoctor=".$doctor_id.";";
        $this->db->prepare($sql);
        return $this->db->single();
    }

}