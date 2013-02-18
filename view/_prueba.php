<script type="text/javascript" src="js/activa.js"></script>
<script type="text/javascript" src="js/utiles.js"></script>
<?php


?>
<style  type="text/css">
    .tborder { border: 1px solid #dadada; border-left:0; border-top:0; }
    .tborder td { border-top: 1px solid #dadada; border-left: 1px solid #dadada; }
</style>
<!--<h6 class="ui-widget-header" style="margin-bottom: 5px;">Encuesta Activa</h6>-->
<div>
    <div style="padding: 5px 3px 10px 3px; text-align: right; float: left; width: 500px; font-size: 18px; font-weight: bold;">
        matriz de indicadores
    </div>
    <div id="ID" style="font-size: 14px; margin-left: 5px; padding-top: 3px;" >
        <input type="text" id="IDNUMBER" class="input_text_" value="" style="width:60px;" />
        <a href="#" id="search_id" style="color: #000000; font-size: 11px; font-family: verdana; margin-left: 6px;" >Buscar encuesta</a>
        <img alt="loading" src="images/loading.gif" style="display: none" id="ld_1"/>
    </div>
    <!--Titulo de encuesta-->
    <br />
    <div id="msgerror" class="UIMessageBox UIMessageBoxError ui-corner-all" style="margin: 0 auto; width: 860px; margin-bottom: 4px; display: none;" >
        <h6 style="font-size: 11px;color: #333;"> No se encontro número de encuesta. </h6>
        <!--<p class="sub_message" id="standard_explanation"></p>-->
    </div>
</div>
<div id="container" style="clear: both; margin-bottom: 20px;z-index: 1;">
    <ul>
	<li><a href="index.php?controller=matrizi&action=p">HM</a></li>
	<li><a href="index.php?controller=matrizi&action=b" >ASPECTOS PRODUCTIVOS</a></li>
	<li><a href="index.php?controller=matrizi&action=c" >Jornales-Inversion</a></li>
    </ul>
    <div id="seccion1">
</div><!--Seccion1 -->
    <div id="seccion2">

    </div><!--Seccion2 DEMOGRAFÍA-->
    <div id="seccion3">
    </div><!--Seccion3 INSTITUCIONES-->
    
</div>
