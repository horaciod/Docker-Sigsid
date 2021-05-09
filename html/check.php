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
require '../include/bootstrap/bootstrap.php';
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
    
    <link rel="stylesheet" href="/sigsid/templates/AdminLTE/bootstrap/css/bootstrap.min.css">

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


