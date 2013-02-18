<?php
    include("../view/functions.php");
?>
<script type="text/javascript" src="js/app/evt_form_modulo.js" ></script>
<script type="text/javascript" src="js/validateradiobutton.js"></script>

<div class="div_container">
<h6 class="ui-widget-header">Datos de Modulo</h6>
<form id="frm" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Modulo" />
    <input type="hidden" name="action" value="delete" />
    <div class="contFrm ui-corner-all" style="background: #fff;">
        <div style="margin:0 auto; width: 630px; ">

                <label for="idmodulo" class="labels">Codigo:</label>
                <input id="idmodulo" name="idmodulo" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->idmodulo; ?>" readonly />
                <label for="idpadre" class="labels">Padre:</label>
                <?php echo $ModulosPadres; ?>
                <br/>
                <label for="descripcion" class="labels">Descripcion:</label>
                <input id="descripcion" maxlength="100" name="descripcion" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->descripcion; ?>"  readonly="readonly"/>
                <label for="url" class="labels">URL:</label>
   		<input id="url" name="url" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->url; ?>" readonly="readonly"  />
                <br/>
                <label for="orden" class="labels">Orden:</label>
   		<input id="orden" name="orden" class="text ui-widget-content ui-corner-all" style=" width: 200px; text-align: left;" value="<?php echo $obj->orden; ?>" readonly="readonly" />
        
                <label for="estado" class="labels">Activo:</label>
                <?php
                    $item = array("Si","No");
                    $rep = $obj->estado;
                    printRadios2('activo',$item,$rep);
                ?>

                <div  style="clear: both; padding: 10px; width: auto;text-align: center">
                    <a href="#" id="delete" class="btn_other">ELIMINAR</a>
                    <a href="index.php?controller=Modulo" class="btn_other">ATRAS</a>
                </div>
        </div>
    </div>
</form>
</div>