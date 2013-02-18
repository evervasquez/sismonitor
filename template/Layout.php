<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>Sistema de encuestas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <meta http-equiv="expires" content="0" />
    <link type="text/css" href="css/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
    <link type="text/css" href="css/layout.css" rel="stylesheet" />
    <link type="text/css" href="css/style.css" rel="stylesheet" />
    <link type="text/css" href="css/custom.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.datepicker-es.js"></script>
    <script type="text/javascript" src="js/jquery-ui-timepicker.js"></script>
    <script type="text/javascript" src="js/jquery.paginate.js"></script>
    <!-- modificado -->
    <script src="js/kendo.web.min.js"></script>
    <link href="css/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="css/styles/kendo.black.min.css" rel="stylesheet" />
    <!-- fin modificado-->
    <script type="text/javascript" src="js/utiles.js"></script>
    <script type="text/javascript" src="js/required.js"></script>
    <script type="text/javascript" src="js/session.js"></script>
    <script type="text/javascript" src="js/menus.js"></script>
    <script type="text/javascript" src="js/jquery.combo.js"></script>
    <link href="css/stilos_menu.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
   $(document).ready(function() {
        $.get('index.php','controller=Index&action=Menu',function(menu)
        {
        $("#menu-sistema").empty();
        var opciones_menu = menu;
        $("#menu-sistema").generaMenu_(opciones_menu);

        $('#menu-sistema li').hover(function (){
        $(this).addClass('selected'); $(this).find('ul:first').slideDown();},
            function (){$(this).removeClass('selected'); $(this).find('ul.fmtdDrpDwn').hide()});

        $('.fmtdDrpDwn li').hover(function (){
        $(this).find('ul:first').show('fast', {direction: 'left'}, 1000);}, 
            function (){$(this).find('ul').hide()});                    
        },'json');
		$.datepicker.setDefaults($.datepicker.regional['es']);
    });
 </script>
<body>
    <div id="login_head">
        <div id="log_in">                       
            <div class="mini_items2"><a>Usuario: <?php echo $_SESSION['user'];?>&nbsp; |&nbsp;</a></div>
            <div class="mini_items2"><a>Perfil:<?php echo $_SESSION['perfil'];?> |&nbsp;</a></div>
            <div class="mini_items2"><a href="index.php?controller=User&action=logout">CERRAR SESSION</a></div>
        </div>
    </div>
    <div id="body">
        <!--
        Cabecera - Banner .
        -->
        <div id="header">
            <div style="height: 102px;"></div>
            <!--
            Menu dinámico .
            -->
            <div id="menu" >
                <div id="loader_menu" class="loader_menu">
                    
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <!--
        Espacio de trabajo midcolumn.
        -->
        <div id="content">
            <div id="fmtd-left"> 
            </div>
            <div id="menu-sistema" ></div>
            <div id="fmtd-right">
                
            </div>
         
            <div class="text-login" style="width: 100%; background: #6EAD28; font-size: 11px; font-weight: bold; padding-bottom: 2px; padding-top: 2px; color:#fff; text-align: center; font-family: arial; border-bottom: 1px solid #57962B;">
                Sistema de Monitorizacion
            </div>
            <?php echo $content; ?>
        </div>
        <div  class="spacer"></div>
    </div>
    <!--
    Pie de pagina.
    -->
    <div id="foot_foot">
        <div id="foot">
            CEPCO  | Sistema de Monitoreo <br />
            WEB-ADMIN: webmaster@cepco.org.pe
        </div>
    </div>
    <!--
    Diálogo mostrado al expirar la sesión.
    -->
    <div id="dialog-session" title="Su sesión ha expirado." style="display:none">
        <div class="ui-state-error" style="padding: 0 .7em; border: 0">
            <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
            <strong>Por favor vuelva a iniciar sesión.</strong></p>
        </div>
    </div>
    <div id="dialog">
            <p id="msgdialog" ></p>
    </div>
</body>
</html>