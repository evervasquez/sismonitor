<script type="text/javascript">
    $(function(){
        $("#valor").focus();
        $('#valor').bind('keyup', function() {
            preg = $("#pregunta").val();
            criterio = $("#criterio").val();
            valor = $("#valor").val();
            $.get('index.php','controller=Unicri&action=listar_distritos_ajax&pregunta='+preg+'&criterio='+criterio+'&valor='+valor,function(data){
                $("#conte").empty().append(data);
            });
        } );
        $("#search").click(function(){
            preg = $("#pregunta").val();
            criterio = $("#criterio").val();
            valor = $("#valor").val();
            $.get('index.php','controller=Unicri&action=listar_distritos_ajax&pregunta='+preg+'&criterio='+criterio+'&valor='+valor,function(data){
                $("#conte").empty().append(data);
            });
        });
    });
    function get(pregunta,id,text)
        {
            opener.$("#"+pregunta).attr("value",id);
            opener.$("#text"+pregunta).empty().append(text);
            window.close();
        }
</script>
<table style="width:100%">
    <tr>
        <td>Buscar por: </td>
        <td><select name="criterio" id="criterio">
                <option value="descripcion">Descripcion</option>
                <option value="idubigeo">Codigo</option>
            </select>
        </td>
        <td>
            <input type="hidden" name="pregunta" id="pregunta" value="<?php echo $pregunta; ?>" />
            <input type="text" name="valor" id="valor" value="" size="15" />
        </td>
        <td>
            <a id="search" href="javascript:" class="btns">Buscar</a>
        </td>
    </tr>
</table>
<table border="0" style="width:100%; border:1px solid #dadada;" class="tlist" cellspacing="0" >
    <thead>
        <tr class="headlist">
            <th>Codigo</th>
            <th align="left">Descripcion</th>
            <th>Acci&oacute;n</th>
        </tr>
    </thead>
<tbody id="conte" style="height:100px; overflow:auto;">
<?php foreach($rows as $r) {  ?>
    <tr class="bodylist">
        <th><?php echo $r[0]; ?></th>
        <th align="left"><?php echo $r[1]; ?></th>
        <th width="60px"><a href="javascript:get('<?php echo $pregunta; ?>','<?php echo $r[0]; ?>','<?php echo $r[1]; ?>')" class="btns">Seleccione</a></th>
    </tr>
<?php  } ?>
</tbody>
</table>