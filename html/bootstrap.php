<?php

/**
 * funciones de componentes bootstrap version 3.3 getbootstrap.com
 *
 * @author horaciod
 */
class bootstrap
{
    public $panel_class = 'panel panel-default';
    public static $primario = 'btn btn-primary';
    public static $primario_block = 'btn btn-primary btn-block';
    public static $default_block = 'btn btn-default btn-block';

    public static function h($indice, $texto)
    {
        return '<h' . $indice . '>' . $texto . '</h' . $indice . '>';
    }

    public static function divmensaje($texto, $tipo = 'label label-info')
    {
        return '<div class="' . $tipo . '">' . $texto . '</div>';
    }

    public static function boton_accion_primario($donde, $texto, $confirma = 0)
    {
        $h = '<a href="' . $donde . '" class="btn btn-primary" >' . $texto . '</a>';
        return $h;
    }

    public static function boton_accion($donde, $texto, $confirma = 0, $title='')
    {
        if ($confirma==0) {
            $h = '<a href="' . $donde . '" class="btn btn-default btn-sm"  title="'.$title.'"> ' . $texto . '</a>';
        } else {
            $h = '<a href="#" onclick="bootbox.confirm(\''.$title.'\',function(que){if (que) window.location.href=\'' . $donde . '\';return true;} );return false;  " class="btn btn-default btn-sm"  title="'.$title.'"> ' . $texto . '</a>';
        }
        return $h;
    }

    public static function boton_accion_js($que, $texto, $confirma = 0, $idboton = false)
    {
        if ($idboton==false) $idboton = "x".microtime(); 
        $h = '<a onclick="' . $que . ';return false;" href="#" class="btn btn-default btn-sm" id="'.$idboton.'">' . $texto . '</a>';
        return $h;
    }
    public static function button_accion_js($que, $texto, $confirma = 0, $idboton = false)
    {
        if ($idboton==false) $idboton = "x".microtime(); 
        $h = '<input type="button" class="btn btn-primary" onclick="' . $que . ';return false;"  id="'.$idboton.'" value="' . $texto . '"></button>';
        return $h;
    }
    public static function boton_accion_js_clase($que, $texto, $clase, $title='')
    {
        $h = '<a onclick="' . $que . ';return false;" href="#" class="' . $clase . '" title="'.$title.'" >' . $texto . '</a>';
        return $h;
    }

    public static function boton_accion_clase($donde, $texto, $clase = 'btn btn-default btn-sm', $title = '', $target = '_self')
    {
        $h = '<a href="' . $donde . '" class="' . $clase . '" data-toggle="tooltip" title="' . $title . '" target="' . $target . '" >' . $texto . '</a>';
        return $h;
    }

    public static function ventanaflot($donde, $texto, $funcion = '', $titulo="Ventana Flotante")
    {
        if ($funcion == '') {
            $h = '<a href="#" onclick=" ventanaflot(\'' . $donde . '\', \''.$titulo.'\'); return false  ;"  class="btn btn-default btn-sm" >' . $texto . '</a>';
        } else {
            $h = '<a href="#" onclick=" ventanaflot(\'' . $donde . '\',' . $funcion . ', \''.$titulo.'\' );return false  ;"  class="btn btn-default btn-sm" >' . $texto . '</a>';
        }

        return $h;
    }

    public static function enlace($donde, $texto, $clase = '', $title = '')
    {
        if ($clase == '') {
            $h = '<a href="' . $donde . '" class="" title="' . $title . '">' . $texto . '</a>';
        } else {
            $h = '<a href="' . $donde . '" class="' . $clase . '" title="' . $title . '">' . $texto . '</a>';
        }
        return $h;
    }

    public static function enlacejs($donde, $texto, $clase = '')
    {
        if ($clase == '') {
            $h = '<a href="#" onclick="' . $donde . '" class="btn btn-default btn-sm" >' . $texto . '</a>';
        } else {
            $h = '<a href=#" onclick="' . $donde . '" class="' . $clase . '" >' . $texto . '</a>';
        }
        return $h;
    }

    public static function tablasimple($datos, $tabla_args = '', $styletr = '', $styletd = '')
    {
        $h = '<table class="table table-condensed table-bordered" ' . $tabla_args . '>' . "\n";
        foreach ($datos as $k => $v) {
            //style="'.$styletr.'"
            if (is_array($v)) {
                $v = implode('; ', $v);
            }
            $h .= '<tr ><td>' . $k . '</td><td>' . $v . '</td></tr>' . "\n";
        }
        $h .= '</table>' . "\n";

        return $h;
    }
    public static function dropmenu($titulo,$opciones){
        $html='<div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            '.$titulo.'
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          ';
          foreach($opciones as $enlace=>$texto)
          $html.=PHP_EOL.'<li><a href="'.$enlace.'">'.$texto.'</a></li>'; 

        $html.= '</ul>      </div>'; 
        return $html ; 

    }
    public static function tablasimplemulti($datos, $tabla_args = '', $styletr = '', $styletd = '', $titulos = false)
    {
        $h = '<table class="table table-condensed table-bordered" ' . $tabla_args . '>' . "\n";
        if ($titulos !== false) {
            $h .= '<thead>';

            foreach ($titulos as $t) {
                $h .= '<th>' . $t . '</th>';
            }
            $h .= '</thead>';
        }
        $h .= '<tbody>';
        foreach ($datos as $k => $v) {
            $h .= '<tr>';
            $h .= '<th>' . $k . '</th>';
            foreach ($v as $v1) {
                $h .= '<td>' . $v1 . '</td>' . "\n";
            }
            $h .= '</tr>';
        }
        $h .= '</tbody>';
        $h .= '</table>' . "\n";

        return $h;
    }

    public static function caja_accion($donde, $texto_enlace, $texto, $titulo)
    {
        $bot = self::boton_accion($donde, $texto_enlace);
        $t = <<<EOG
         <div class="jumbotron">
  <h2>$titulo</h2>
  <p>
  $texto
  </p>
  <p>
       $bot
         
  </p>
</div>
        
        
EOG;

        return $t;
    }

    public static function getbox($titulo, $content, $footer = false, $colapsado = false)
    {
        if ($colapsado == true) {
            $colapsado = 'collapsed-box' ;
        }
        //$html = '<div align="center" style="width:100%;background-color:white;">';
        $html = ' <div class="box box-default '.$colapsado.'" >';
        if ($titulo) {
            $html .= '  <div class="box-header with-border">
    <h3 class="box-title">' . $titulo . '</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->  ';
        }
        $html .= '<div class="box-body">';
        $html .= $content;
        $html .= '</div>' . "\n";



        if ($footer) {
            $html .= ' <div class="panel-footer">' . $footer . '</div> ';
        }
        $html .= PHP_EOL . '</div>';
        ;

        return $html;
    }

    /*
     * enviar un array asociativo con [id]=>{texto,title,enlace}
     */

    public function paginador($enlaces, $dcurrent)
    {
        $html = '
       <div class="btn-group"> ';

        foreach ($enlaces as $k => $v) {
            $current = ($k == $dcurrent) ? ' btn-success ' : '';
            $html .= '<a href="' . $v['url'] . '" class="btn ' . $current . '" title="' . $v['title'] . '">' . $v['texto'] . '</a>';
        }

        $html .= '</div>';

        return $html;
    }

    public static function panel($titulo, $texto, $enlace = false, $footer = false, $class = 'panel panel-default')
    {
        return '
       <div class="' . $class . '">
        <div class="panel-heading">' . $titulo . '</div>
        <div class="panel-body">' . $texto . $enlace . '</div>
        <div class="panel-footer">' . $footer . '</div>
    </div>';
    }
    public static function panel_class($titulo, $texto, $enlace = false, $footer = false, $botones=array(),$class="panel panel-default")
    {
        $hbotones  = '' ;
        
        if (is_Array($botones) and alleno($botones)) {
            foreach ($botones as $href=>$btexto) {
                $hbotones.=self::boton_accion($href, $btexto) ;
            }
            $hbotones = '<div class="btn-group pull-right">'.$hbotones.'</div>' ;
        } elseif (is_string($botones)) {
            $hbotones= $hbotones = '<div class="btn-group pull-right">'.$botones.'</div>' ;
        }
      
        return '
       <div class="'.$class.'">
         <div class="panel-heading clearfix">
      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">' . $titulo.'</h4>' . $hbotones.'</div>
        <div class="panel-body">' . $texto . $enlace . '</div>
        <div class="panel-footer">' . $footer . '</div>
    </div>';
    }
    public static function panel_primary($titulo, $texto, $enlace = false, $footer = false, $botones=array())
    {
        $hbotones  = '' ;
        
        if (is_Array($botones) and alleno($botones)) {
            foreach ($botones as $href=>$btexto) {
                $hbotones.=self::boton_accion($href, $btexto) ;
            }
            $hbotones = '<div class="btn-group pull-right">'.$hbotones.'</div>' ;
        } elseif (is_string($botones)) {
            $hbotones= $hbotones = '<div class="btn-group pull-right">'.$botones.'</div>' ;
        }
      
        return '
       <div class="panel panel-primary">
         <div class="panel-heading clearfix">
      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">' . $titulo.'</h4>' . $hbotones.'</div>
        <div class="panel-body">' . $texto . $enlace . '</div>
        <div class="panel-footer">' . $footer . '</div>
    </div>';
    }
    /*
     * recibe un titulo y un texto para hacer un call out
     *
     */

    public static function llamada($titulo,$texto)
    {
        return  ' <div class="callout callout-info">
        <h4>'.$titulo.'</h4>

        <p>'.$texto.'</p>
      </div> ';
      
    }
    /*
     * recibe un array y saca unos botones justificados (ampliios)
     *
     */

    public static function botonesjustificados($botones)
    {
        $h = ' <div class="btn-group btn-group-justified"> ';
        foreach ($botones as $k => $v) {
            $h .= '<a href="' . $k . '" class="btn btn-primary">' . $v . '</a> ';
        }
        $h .= ' </div>';
        return $h;
    }

    public static function tabs($opciones)
    {
        $html2 = '';
        $tabs ='';
        foreach ($opciones as $nombretab => $v) {
            $html2 .= '<li role="presentation" ><a href="#' . $nombretab . '" data-toggle="tab">' . $v['titulo']. '</a></li>' . "\n";
            $tabs .='<div id="'.$nombretab.'" class="tab-pane in">'.$v['tab'].'</div>' . "\n\n" ;
        }

        $html = <<< EOF
            <ul class="nav nav-tabs" id="tabs">
            $html2
            </ul>
            <div id="my-tab-content" class="tab-content">
            $tabs
            </div>
            <script>$('document').ready(function(){\$("#tabs a:first").tab("show");})
            </script>
EOF;

        return $html;
    }
    public static function alertbox($title, $text, $classcss="alert alert-danger")
    {
        return '<div class="'.$classcss.' alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
        '.$text.'
      </div>' ; 
       
    }

    public static function botoncopiar($texto){
        return '<i title="copiar al portapapeles" class="fa fa-clipboard copiar" data-clipboard-text="' . $texto.'"></i>'; 
    }
}

class menubootstrap
{
    public $ini = '
<div class="row">

<div class="col-lg-3 col-md-9 ">         

<h3>{titulo}</h3>
<ul class="nav nav-list">';
    public $fin = '</ul></div></div>';
    private $menu = array();
    private $titulo = 'Menú';

    public function __construct()
    {
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function addheader($texto)
    {
        $this->menu[] = '<li class="nav-header">
    ' . $texto . '   </li>';
    }
    public function addoption($texto)
    {
        $this->menu[] = '<li class="nav-header">
    ' . $texto . '   </li>';
    }
    public function addlink($enlace, $texto)
    {
        $this->menu[] = '<li>
                    <a  class="btn btn-default btn-block" href="' . $enlace . '">' . $texto . '</a>
                </li>';
    }
    public function addlinki($enlace, $texto)
    {
       $this->addlink($texto,$enlace)  ; 
    }
    public function salida()
    {
        $this->menu[] = $this->fin;
        return str_replace('{titulo}', $this->titulo, $this->ini) . implode("\n", $this->menu);
    }
}
class menubootstrap3
{
    public $ini = '

<h3>{titulo} </h3>
<div class="list-group">';
    public $fin = '</div>';
    private $menu = array();
    private $titulo = 'Menú';

    public function __construct()
    {
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
/*
<div class="list-group">
  <a href="#" class="list-group-item active">
    Cras justo odio
  </a>
  <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
  <a href="#" class="list-group-item">Morbi leo risus</a>
  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item">Vestibulum at eros</a>
</div>
*/
    public function addheader($texto)
    {
        $this->menu[] = '<a href="#" class="list-group-item list-group-item-info">
    ' . $texto . '   </a>';
    }
    
    public function addlink($enlace, $texto)
    {
        $this->menu[] = '<a href="' . $enlace . '" class="list-group-item">'. $texto . '</a>';
                
    }
    public function addlinki($enlace, $texto)
    {
       $this->addlink($texto,$enlace)  ; 
    }
    public function salida()
    {
        $this->menu[] = $this->fin;
        return str_replace('{titulo}', $this->titulo, $this->ini) . implode("\n", $this->menu);
    }
}

class menutop
{
    public $activo = '';
    public $itemactivo = '';
    public $menuid = 0;
    public $items = '';
    public $clase_nav = 'navbar';
    public $mostrarauth = false;

    public function __construct($titulo_aplicacion, $url_sistema)
    {
        $this->titulo_aplicacion = $titulo_aplicacion;
        $this->url_sistema = $url_sistema;
        if (isset($_SESSION['draphp']['usuario']['nombre'])) {
            $this->usuario = $_SESSION['draphp']['usuario']['nombre'];
        } else {
            $this->usuario = '';
        }
    }

    public function add_options($opciones = false)
    {
        ////////array con opciones
//        $opciones = array('Menu'=>array('personas'=>'personas/personas_ext.php' ,'divider'=>'x', 'usuarios'=>'usuarios/usuario.php',
//            'submenu'=>array('m'=>'MMM','a'=>'AAAA')
//            ) ,'Otro menu'=>array('Otro'=>'otro.php')) ;
        $this->items = '';
        foreach ($opciones as $m => $subopciones) {
            $this->menuid++;
            $menuid = 'menub' . $this->menuid;
            $this->items .= '<li class="dropdown" id="' . $menuid . '">' .
                    '<a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">' . $m . '<b class="caret"></b></a>';
            if (is_Array($subopciones) and count($subopciones) > 0) {
                $this->items .= ' <ul class="dropdown-menu">';
                foreach ($subopciones as $label => $url) {
                    if (is_array($url)) {
                        $this->items .= '<li class="dropdown-submenu">';
                        $this->items .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $label . '</a>'
                                . ' <ul class="dropdown-menu">';
                        foreach ($url as $labels => $urls) {
                            $this->items .= '<li><a href="' . $this->url_sistema . $urls . '">' . $labels . '</a></li>' . "\n";
                        }
                        $this->items .= '</ul>';
                    } else {
                        if ($label == 'divider') {
                            $this->items .= '<li class="divider"></li>' . "\n";
                        } else {
                            $this->items .= '<li><a href="' . ((strstr($url, 'http://')) ? $url : $this->url_sistema . $url) . '">' . $label . '</a></li>' . "\n";
                        }
                    }
                }
                $this->items .= '</ul>';
            }
            $this->items .= '</li>';
        }
    }

    public function add_options_side($opciones = false)
    {
        ////////array con opciones
//        $opciones = array('Menu'=>array('personas'=>'personas/personas_ext.php' ,'divider'=>'x', 'usuarios'=>'usuarios/usuario.php',
//            'submenu'=>array('m'=>'MMM','a'=>'AAAA')
//            ) ,'Otro menu'=>array('Otro'=>'otro.php')) ;
        $this->items = '';
        foreach ($opciones as $m => $subopciones) {
            $this->menuid++;
            $menuid = 'menub' . $this->menuid;
            $this->items .= "\n";
            if ($m == $this->activo) {
                $active = ' active menu-open';
            } else {
                $active = '';
            }
            $this->items .= //<li class="dropdown" id="' . $menuid . '">' .
                    //'<a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">' . $m . '<b class="caret"></b></a>';
                    '<li class="' . $active . '"><a href="#"><span>' . $m . '</span> <i class="fa fa-angle-left pull-right"></i></a>';
            $this->items .= "\n";
            if (is_Array($subopciones) and count($subopciones) > 0) {
                //$this->items.= ' <li class="treeview">';
                $this->items .= ' <ul class="treeview-menu ' . $active . '">';
                foreach ($subopciones as $label => $url) {
                    if (is_array($url)) {
                        $this->items .= '<li >';
                        if ($label == $this->itemactivo) {
                            $active = 'active';
                        } else {
                            $active = '';
                        }
                        $this->items .= '<a href="#" class="' . $active . '" data-toggle="dropdown">' . $label . '</a>'
                                . ' <ul class="dropdown-menu">';
                        foreach ($url as $labels => $urls) {
                            $this->items .= '<li><a href="' . $this->url_sistema . $urls . '">' . $labels . '</a></li>' . "\n";
                        }
                        $this->items .= '</ul>';
                    } else {
                        if ($label == 'divider') {
                            $this->items .= '<li class="divider"></li>' . "\n";
                        } else {
                            $this->items .= '<li><a href="' . ((strstr($url, 'http://')) ? $url : $this->url_sistema . $url) . '">' . $label . '</a></li>' . "\n";
                        }
                    }
                }
                $this->items .= '</ul>';
            }
            $this->items .= '</li>';
        }
    }

//    function armaopcion(){
//        $this->menuid++ ;
//        $menuid = 'menub'.$this->menuid ;
    //$opcion=<<<EOF
//            <li class="dropdown" id="{$menuid}">
//                           <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">Menú<b class="caret"></b>
//                        </a>
//                     <ul class="dropdown-menu">
//                            <li><a href="{$this->url_sistema}archivos/personas/personas_ext.php">Personas</a></li>
//                            <li><a href="{$this->url_sistema}archivos/usuarios.php">Usuarios</a></li>
//
//                        </ul>
//                    </li>
//                    <li class="dropdown" id="catalogo">
//                           <a class="dropdown-toggle" data-toggle="dropdown" href="#catalogo">
//                            Cursos y Congreso
//                            <b class="caret"></b>
//                        </a>
//                     <ul class="dropdown-menu">
//                            <li><a href="{$this->url_sistema}archivos/cursos/cursos.php">Cursos</a></li>
//
//                            <li><a href="{$this->url_sistema}archivos/cursos/congresos.php/">Congresos</a></li>
//                            <li><a href="{$this->url_sistema}informes/">Informes</a></li>
//
//                     </ul>
//                    </li>
//
//                    <li><a href="#acercade" data-toggle="modal">Acerca de...</a></li>
//                    <li class="divider-vertical"></li>
//
    //EOF;
//
//    }

    public function get()
    {
        global $conn;
        if (@$this->extrali) {
            $extrali = $this->extrali;
        } else {
            $extrali = '';
        }
        $opciones = $this->items;

        $menu = <<<EOF
        <div class="{$this->clase_nav}  navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="container-fluid"><div class="navbar-header">
        <a class="navbar-brand" href="$this->url_sistema">$this->titulo_aplicacion</a></div>
        <div class="navbar-collapse">
                <ul class="nav navbar-nav">
                    $opciones
                  {$extrali}
                </ul>
EOF;

        $auth = <<<EOF
         <ul class="nav navbar-nav navbar-right">
          
                    
                 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{$this->usuario}<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="#salida" data-toggle="modal" >Salida del sistema</a></li>
          <!-- BEGIN ADMINUSUARIO -->
                <li><a href="{$this->url_sistema}/cambiausuario.php" class="">Cambia usuario</a></li>
          <!-- END ADMINUSUARIO -->
          </ul>
        </li>
                                
                            </ul>
                        </div>
                    </li>


                </ul>
EOF;
        $html2 = '            </div>
        </div>
   
</div>

</div>';

        if ($this->mostrarauth == true) {
            $menu .= $auth;
        }
        return $menu . $html2;
    }

    public function getside()
    {
        global $conn;
        if (@$this->extrali) {
            $extrali = $this->extrali;
        } else {
            $extrali = '';
        }
        $opciones = $this->items;
// <li class="header">Menú</li>
        $menu = <<<EOF
<ul class="sidebar-menu">
       
        $opciones
        $extrali         
</ul>

EOF;
        return $menu;
        $auth = <<<EOF
         <ul class="nav navbar-nav navbar-right">
          
                    
                 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{$this->usuario}<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="#salida" data-toggle="modal" >Salida del sistema</a></li>
          <!-- BEGIN ADMINUSUARIO -->
                <li><a href="{$this->url_sistema}/cambiausuario.php" class="">Cambia usuario</a></li>
          <!-- END ADMINUSUARIO -->
          </ul>
        </li>
                                
                            </ul>
                        </div>
                    </li>


                </ul>
EOF;
        $html2 = '            </div>
        </div>
   
</div>

</div>';

        if ($this->mostrarauth == true) {
            $menu .= $auth;
        }
        return $menu . $html2;
    }
}



