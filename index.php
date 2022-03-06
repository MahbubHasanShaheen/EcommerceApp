<?php
ob_start();


session_start();
include_once 'system/config/appsConfig.php';

spl_autoload_register(function($classname){
include_once 'system/lib/'.$classname.'.php';
});


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="description" content="Free Web tutorials">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>sarichuri.com||Largest Online Shop in Bangladesh/<?php echo appsConfig::pagetitle('');?></title>
  
  <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('apps/css/style.css')?>">
 <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('css/animate.css')?>">
 <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('apps/css/style.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('apps/css/bootstrap.css')?>">
  <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('apps/css/jquery-ui.min.css')?>">
 
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('/apps/engine1/style.css')?>" />
  <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('css/style.css')?>">
   
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('apps/css/reset.css')?>" > 
    <link rel="stylesheet" type="text/css" href="<?php appsConfig::URL('apps/css/jquery-picZoomer.css')?>">   
    <link rel="stylesheet" type="text/css" href="css/jquery-picZoomer.css">


<style type="text/css" media="print">
    @page { size: auto;  margin: 0mm; }
    
    @media print{
      body *{
        visibility: hidden;


      }

      .print-container, .print-container *{
        visibility: visible;
      }
      .print-container{
        position: default;
        left: 0px;
        top: 0px;
        
      
      }
    }
  </style>
   
<script type="text/javascript" src="<?php appsConfig::URL('/apps/js/jquery.js')?>"></script>

<script type="text/javascript" src="<?php appsConfig::URL('/apps/js/jquery-ui.js')?>"></script>
</head>
<body>
    
<?php include_once 'apps/public/header.php';?>
<?php include_once 'apps/public/nav.php';?>

<?php
appsConfig::rendarBody();
?>

<?php include_once 'apps/public/footer_top.php';?>
<?php include_once 'apps/public/footer.php';?>




 <script src="apps/js/main.js"></script>

<script type="text/javascript" src="<?php appsConfig::URL('/apps/js/bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php appsConfig::URL('/apps/engine1/wowslider.js')?>"></script>
<script type="text/javascript" src="<?php appsConfig::URL('/apps/engine1/script.js')?>"></script>

</body>
</html>
<?php ob_end_flush();?>

