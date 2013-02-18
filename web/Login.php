<?php

    global $n;
    if(!isset($_GET['key'])) { $n=rand(1000,9999); } else { $n = base64_decode($_GET['key']); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>Sistema de encuestas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="expires" content="0" />
    <link type="text/css" href="css/jquery-ui-1.8.1.custom.css" rel="stylesheet" />
    <link type="text/css" href="css/layout.css" rel="stylesheet" />
    <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.10.custom.min.js"></script>
    <link href="css/stilos_menu.css" rel="stylesheet" type="text/css" />
</head>
    <script type="text/javascript">
        $(document).ready(function(){            
            $("#frmlogin").submit(function(){
                var cv = $("#codival").val();
                if(cv==CodVali)
                    {
                        var user = $("#usuario").val();
                        if(user!="")
                            {
                                return true;
                            }
                         else {
                                 alert("Ingrese el usuario.");
                                 return false;
                              }
                    }
                 else {
                     alert("Codigo de verificacion incorrecto.");
                     return false;
                 }
                 
            });
        });
    </script>
<body>
    <div id="login_head">
        <div id="log_in"></div>
    </div>
    <div id="body">        
        <div id="header"></div>
        <div class="spacer"></div>        
        <div id="content">
            <div class="text-login" style="width: 100%; background: #6EAD28; font-size: 13px; font-weight: bold; padding-bottom: 5px; padding-top: 5px; color:#fff; text-align: center; font-family: arial; border-bottom: 1px solid #57962B;">
                ACCESO AL SISTEMA DE ENCUESTAS
            </div>
            <div  class="UIMessageBox UIMessageBoxError" <?php  if(!isset($_GET['error'])){ echo 'style="display:none;"'; } ?> style="text-align: center">
            <h5 class="main_message" id="standard_error" style="font-size: 12px;color: #333;">Vaya! Al parecer olvidaste tus datos.</h5>
        </div>
         <div class="div-login" style="width: 417px; padding: 5px;border:1px solid #dadada;  margin: 100px auto;">
             <div style="float:left; width: 115px;">
                 <img alt="" src="images/seguridad.png"></img>
             </div>
             <div style="float:left; width: 300px;border-left: 1px solid #dadada; ">
                <form id="frmlogin" method="post"  action="process.php" >
                <table width="106%" style="width: 100%; font-size: 12px;">
                    <tr>
                        <td width="148" align="right">Usuario </td>
                        <td colspan="2">:&nbsp;<input id="usuario" autofocus name="usuario" class="ui-widget-content ui-corner-all" style=" width: 80%; text-align: left; text-transform: uppercase" value=""  /></td>
                    </tr>
                    <tr>
                        <td align="right">Password </td>
                        <td colspan="2">:&nbsp;<input type="password" id="password" name="password" class="ui-widget-content ui-corner-all" style=" width: 80%; text-align: left;" value=""/></td>
                    </tr>
                    <tr>
                        <td align="right">Codigo de Verificacion</td>
                        <td width="62">:&nbsp;<input id="codival" name="codival" class="ui-widget-content ui-corner-all" style=" width: 80%; text-align: left;" value="" /></td>
                        <td width="74" align="left"><img alt=""  src="../lib/capcha.php?key=<?php echo $n; ?>" width="60" height="20" border="0" style="float:left" /></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <input type="submit" id="ingresar" value="Ingresar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" style="width: 90px; height: 23px;"   tabindex="3" />
                        </td>
                    </tr>
                </table>
        </form>
         </div>
             <div style="clear: both"></div>
        </div>

<?php echo "<script>CodVali='".$n."';</script>"; ?>


        </div>
        <div  class="spacer"></div>
    </div>
    <!--
    Pie de pagina.
    -->
    <div id="foot_foot">
        <div id="foot">
            CEPCO | Sistema de monitoreo <br />
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
