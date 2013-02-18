<?php
    include("../view/functions.php");
?>
<link type="text/css" href="css/codemirror.css" rel="stylesheet" />
<script type="text/javascript" src="js/app/evt_form_modulo.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>
<script type="text/javascript" src="js/codemirror.js"></script>
<script type="text/javascript" src="js/plsql.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Registro de Modulo</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Modulo" />
    <input type="hidden" name="action" value="save" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 690px; ">
                
                <label for="idmodulo" class="labels">Codigo:</label>
                <input id="idmodulo" name="idmodulo" class="text ui-widget-content ui-corner-all" style=" width: 160px; text-align: left;" value="<?php echo $obj->idmodulo; ?>" readonly />
                <label for="idpadre" class="labels">Padre:</label>
                <?php echo $ModulosPadres; ?>
                <br/>
                <label for="descripcion" class="labels">Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 480px; text-align: left;" value="<?php echo $obj->descripcion; ?>" />
   
                </br>
                <label for="titulo" class="labels">Titulo:</label>
                <input id="titulo" name="titulo" class="text ui-widget-content ui-corner-all" style=" width: 480px; text-align: left;" value="<?php echo $obj->titulo; ?>" />
                </br>
                <label for="url" class="labels">URL:</label>
   		<input id="url" name="url" class="text ui-widget-content ui-corner-all" style=" width: 480px; text-align: left;" value="<?php echo $obj->url; ?>"  />
                </br>
                <label for="orden" class="labels">Orden:</label>
   		<input id="orden" name="orden" class="text ui-widget-content ui-corner-all" style=" width: 160px; text-align: left;" value="<?php echo $obj->orden; ?>" />
                <label for="estado" class="labels">Activo:</label>
                <?php
                    $item = array("Si","No");
                    if($obj->estado!="")
                      {$rep = $obj->estado;}
                     else {$rep = 1;}
                                      
                    printRadios2('activo',$item,$rep);
                ?>
                </br>
                
                
                
                <label for="consulta" class="labels">Consulta por Zona:</label>
                </br>
                <textarea id="consulta" name="consulta" style="width: 100%; height: 210px;display: none; font-size: 12px;"  ><?php echo $obj->consulta; ?></textarea>
                </br>
                <label for="consulta" class="labels">Consulta por Provincia:</label>
                 </br>
                <textarea id="consulta1" name="consulta1" style="width: 100%; height: 210px;display: none; font-size: 12px;"  ><?php echo $obj->consulta1; ?></textarea>
                </br>
                <label for="consulta" class="labels">Consulta por Distrito:</label>
                </br>
                <textarea id="consulta2" name="consulta2" style="width: 100%; height: 210px;display: none; font-size: 12px; "  ><?php echo $obj->consulta2; ?></textarea>
                
                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="index.php?controller=Permisos" class="btn_other">PERMISOS</a>
                    <a href="#" id="save" class="btn_other">GRABAR</a>
                    <a href="index.php?controller=Modulo" class="btn_other">ATRAS</a>
                </div>
        </div>
    </div>
</form>
<script>
      var editor = CodeMirror.fromTextArea(document.getElementById("consulta"), {
        lineNumbers: true,
        matchBrackets: true,
        indentUnit: 1,
        autoClearEmptyLines:true, 
        mode: "text/x-plsql"
      });
      var editor1 = CodeMirror.fromTextArea(document.getElementById("consulta1"), {
        lineNumbers: true,
        matchBrackets: true,
        indentUnit: 4,
        mode: "text/x-plsql"
      });
      var editor2 = CodeMirror.fromTextArea(document.getElementById("consulta2"), {
        lineNumbers: true,
        matchBrackets: true,
        indentUnit: 1,
        mode: "text/x-plsql"
      });
</script>
</div>