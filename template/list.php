
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>Listas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="expires" content="0" />
    <link type="text/css" href="css/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
    <link type="text/css" href="css/list.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/utiles.js"></script>
</head>
    <body onunload="cerrar_ventana()">
    <h6 class="ui-widget-header" style="margin-left: 1px; margin-right: 1px; margin-top: 1px">LISTA DE REGISTROS</h6>
    <div id="grids">
        <?php echo $content; ?>
    </div>
    <div id="paginator"></div>
</body>
</html>