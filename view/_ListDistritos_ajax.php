<?php foreach($rows as $r) {  ?>
    <tr class="bodylist">
        <th><?php echo $r[0]; ?></th>
        <th align="left"><?php echo $r[1]; ?></th>
        <th width="60px"><a href="javascript:get('<?php echo $pregunta; ?>','<?php echo $r[0]; ?>','<?php echo $r[1]; ?>')" class="btns">Seleccione</a></th>
    </tr>
<?php  } ?>
