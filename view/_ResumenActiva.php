
<div class="contain" style="margin-top: 2px; margin-left: 30px; clear: both;">
    <div style="padding: 3px 3px 3px 3px; width: 500px; font-size: 18px; font-weight: bold;">
        Cuadro resumen de registro del cuestionario Activa
    </div>
    <table class="ui-widget ui-widget-content" style="width: 500px;" style="margin-top: 3px; ">
        <thead>
            <tr class="ui-widget-header ">
                <th>Registrador</th>
                <th>Encuestador</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
          <?php $code = '' ?>
    <?php foreach ($rows as $key => $value) { ?>
            <tr>
                <?php if ($code != $value[0] ){ $code = $value[0];   ?>
                <td><?php  echo $value[1]; ?></td>
                <?php } else {  ?>
                <td>&nbsp;</td>
                <?php }   ?>
                <td><?php  echo $value[2]; ?></td>
                <td><?php  echo $value[3]; ?></td>
            </tr>
    <?php  } ?>
        </tbody>
    </table>
    <br />
    <a href="index.php?controller=Activa" style="color: #000000; font-size: 12px; font-family: verdana;" >Nueva Encuesta</a>
</div>
