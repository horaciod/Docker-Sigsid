<?php
$extensiones  = explode(',', 'soap,xml,yaz,pgsql,curl');
$ok           =[]  ;
$error        = [];
foreach ($extensiones as $ext) {
    if (extension_loaded(
        $ext
    )) {
        $ext1     = new ReflectionExtension($ext);
        $version  = ($ext1->getVersion());
        $ok[$ext] = $ext . ' instalada correctamente version: ' . $version;
    } else {
        $error[$ext] = $ext . ' no instalada';
    }
}
$todas = get_loaded_extensions() ;
$todas = array_diff($todas,$extensiones) ; 
$todas1 = []; 
foreach ($todas as $ext) {
        $ext1     = new ReflectionExtension($ext);
        $version  = ($ext1->getVersion());
        $todas1[$ext] = $ext . ' instalada correctamente version: ' . $version;
  
}
require './bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Check de Extensiones</title>

    <!-- Bootstrap -->
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="content-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 ">
    
    <h1 class="alert alert-success">Extensiones instaladas</h1>
    <?php echo bootstrap::tablasimple($ok)  ;?>
    <h1 class="alert alert-danger">Extensiones no instaladas</h1>
    
    <?php echo(count($error) > 0 ? bootstrap::tablasimple($error) : ' todas instaladas');?>

    <h1 class="alert alert-info">Otras Extensiones </h1>
    
    <?php echo  bootstrap::tablasimple($todas1);?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    </div>
    </div>
    </div>
  </body>
</html>



