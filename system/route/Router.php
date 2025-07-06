<?php
class Router {
    public $url;
    function __construct()
    {
        $arr = $this->UrlProcess();
        if(isset($arr)){
            $url = implode("/",$arr);
            if(file_exists("./system/views/pages/".$url.".php") ){
                require_once "./system/views/pages/".$url.'.php';
            }else{
                require_once './system/views/layouts/404.html'; 
                exit;
            }
        }else {
            require_once "./system/views/pages/home.php"; 
        } 

    }
    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}