<!DOCTYPE html>
<?php
if (session_has('locale')) {
    $dir = session('locale')=='ar'?'rtl':'ltr';
    $lang = session('locale');
}else {
    $dir = 'ltr';
    $lang ='en';
}

?>
<html lang="<?php echo $lang ?>" dir="<?php echo $dir ?>">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Bootstrap CSS -->
    <?php if(session('locale')=='ar'):?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" >
    <?php else:?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php endif;?>

    <title><?php echo isset($title)&&!empty($title)?$title:"project name"; ?></title>
  </head>
  <body>
<?php view('layout.navbar')?>