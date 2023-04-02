<?php
Abstract class Controller {
    private $doctorModel;
    public function __construct($model){
        $this->doctorModel=$this->loadModel("Doctor");
    }

    public function loadModel(string $model){
        require_once('/var/www/html/TP/app/models/doctor.php');
        return new $model();
    }

    public function render(string $view, array $data = []){   
        if(!empty($data))
            extract($data);
        //var_dump($data);
        /*ob_start();
        echo "<h1> *****************TEST***************</h1>";
        $content =ob_get_clean();
        */
        require_once('/var/www/html/TP/app/views/'.$view);
    }

} 