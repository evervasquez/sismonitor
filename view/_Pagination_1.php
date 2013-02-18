<table class="table-pagination" border="0" style="" >
    <tbody>
        <tr>            
            <?php foreach ($rows as $key => $value) { ?>
                <?php if ($value['active']==0) { ?>
            <td>
                <!--<a href="<?php //echo $url;?>&q=<?php// echo $query;?>&p=<?php //echo $value['value'];?>" class="links">-->
                <a href="javascript:cargar_datos('<?php echo $url?>&q=<?php echo $query;?>&p=<?php echo $value['value'];?>')" class="links">
                        <?php
                            switch ($value['type']) {
                                case 1:
                                    echo $value['value'];
                                    break;
                                case 2:
                                    echo 'Anterior';
                                    break;
                                case 3:
                                    echo 'Siguiente';
                                    break;
                                default:
                                    break;
                            }
                        ?>
                    </a>
                </td>
                <?php } else { ?>
                <td>
                    <span style="font-weight: bold; color: #E88400; font-size: 1.2em;" ><?php echo $value['value']; ?></span>
                 </td>
                <?php }  ?>

            <?php } ?>
        </tr>
    </tbody>
</table>
