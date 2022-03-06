<?php

/**
* 
*/
class appsConfig 
{
  
  function __construct(){
    
  }



  const URL = 'http://localhost/sarichuri/';

  public static function URL($path){
     echo Self::URL.$path;
  }

  public static function Link($path){
    return Self::URL.$path;
  }


  public static function AdminBody()
  {
    if(isset($_GET['admin'])){
    if(file_exists('apps/admin/'.$_GET['admin'].'.php')){
      include_once 'apps/admin/'.$_GET['admin'].'.php';
    }
    else{
      include_once 'apps/public/404.php';
    }

    }
    else{
      include_once 'apps/admin/home.php';
    }
  }



  public static function rendarBody()
  {
    if(isset($_GET['public'])){
      $url = $_GET['public'];
      $url = rtrim($url,"/");
      $url = explode("/", $url);
      if(file_exists('apps/public/'.$url[0].'.php')){
        include_once 'apps/public/'.$url[0].'.php';
      }
      else{
        include_once 'apps/public/404.php';
      }

    }
    else{
      include_once 'apps/public/home.php';
    }
  }









  public static function pagetitle(){

    if(isset($_GET['public'])){
      $url = $_GET['public'];
      $url = rtrim($url,"/");
      $url = explode("/", $url);
      return $url[0];

    }
    else{
      return '';
    }
    
  }



}




?>