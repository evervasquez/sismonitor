<form id="frmpermisos" name="frmpermisos" action="">
   <input type="hidden" value="<?php echo $idperfil;?>" name="idperfil" id="idperfil" />
   <table border="0" cellpadding="2" cellspacing="0" style="width:60%; font-size:13px">
<?php

    $c=0;
    foreach($mod as $m)
    {

        $c = $c+1;
        $check = "";
        if(strlen(trim($m['perfil']))!=0)
            {$check = "checked";}
        ?>
        <tr>
            <td width="5%" align="right"><?php echo str_pad($c , 2 , "0", 0); ?>.</td>
            <td align="center" width="5%"><input type="checkbox" name="m[]" id="m<?php echo $m['idmodulo'] ?>" value="<?php echo $m['idmodulo'] ?>" <?php echo $check;?>/></td>
            <td colspan="3" align="left"><b><a href="index.php?controller=Modulo&action=edit&id=<?php echo $m['idmodulo']; ?>"><?php echo $m['descripcion']; ?></a></b></td>
        </tr>
        <?php
        $d = 0;
        foreach($m['hijos'] as $sm)
        {
            $d = $d+1;
            
            $check = "";
            $k+=1;
            if(strlen(trim($sm['perfil']))!=0)
                {$check = "checked";}
            ?>
            <tr>
                  <td>&nbsp;</td>
                  <td align="center" width="5%"><?php echo $c.".".$d." "; ?></td>
                  <td align="center" width="5%"><input type="checkbox" name="m[]" id="m<?php echo $sm['idmodulo']; ?>" value="<?php echo $sm['idmodulo']; ?>" <?php echo $check; ?>/></td>
                  <td colspan="2" align="left"><a href="index.php?controller=Modulo&action=edit&id=<?php echo $sm['idmodulo']; ?>"><?php echo $sm['descripcion']; ?></a></td>
            </tr>
            
            <?php
            $e=0;
                foreach($sm['hijos'] as $smt)
                {
                $e = $e+1;
                $check = "";
                if(strlen(trim($smt['perfil']))!=0)
                    {$check = "checked";}
                ?>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center" width="5%"><?php echo $c.".".$d.".".$e; ?></td>
                    <td align="center" width="5%"><input type="checkbox" name="m[]" id="m<?php echo $smt['idmodulo'] ?>" value="<?php echo $smt['idmodulo']; ?>" <?php echo $check; ?>/></td>
                    <td align="left"><a href="index.php?controller=Modulo&action=edit&id=<?php echo $smt['idmodulo']; ?>"><?php echo $smt['descripcion'] ?></a></td>
                </tr>
                <?php

                } 
        }
    }
?>
   </table>
</form>