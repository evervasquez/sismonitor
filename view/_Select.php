<select name="<?php echo $name; ?>" id="<?php echo $id; ?>"  class="input_text" <?php if($disabled=='disabled'){echo 'disabled="disabled"'; }?> >
    <option value=""> ::Seleccione:: </option>
    <?php foreach ($rows as $key => $value) { ?>
        <?php if ($code != $value[0] ) { ?>
            <option value="<?php echo $value[0]; ?>"> <?php echo $value[1]; ?> </option>
        <?php } else { ?>
            <option selected="selected" value="<?php echo $value[0]; ?>"> <?php echo $value[1]; ?> </option>
        <?php }  ?>
    <?php } ?>
</select>
