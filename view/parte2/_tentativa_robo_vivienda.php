<div class="cpreg" id="<?php echo $c008900 ?>" >
    <div class="subtitle">TENTATIVA DE ROBO EN VIVIENDA</div>
    <div class="npreg"><b>89. </b></div>
    <div class="preg">
        <?php  echo $p008900; ?> : <br/>
        <div class="div-link">
            <?php
                if(!$disabled && ($rep008901=="" && $rep008901==""))
                {
                $band = true;
            ?>
                    <a class="link link-no" id="l008900">Click aqui si es que NO se denunció</a>

            <?php
                }
                else
                    {
                    if($rep008901=="" && $rep008901=="")
                    {

                        ?>
                            <div style="width: 100%; float: left; padding-bottom: 5px; padding-top: 5px; background: red; color:#fff; text-align: center">
                                No se ha denunciado el hecho
                            </div>
                        <?php
                    }
                    else {
                         ?>
                            <div style="width: 100%; float: left; padding-bottom: 5px; padding-top: 5px; background: green; color:#fff; text-align: center">
                                Se ha denunciado el hecho
                            </div>
                        <?php
                    }
                }
            ?>            
        </div>
        <table class="mytable" id="t008900">
            <tr>
                <td style="width:250px;"><?php echo $p008901; ?></td><td><?php printRadios("8901",$item,$rep008901); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><?php echo $p008902; ?></td><td><?php printRadios("8902",$item,$rep008901); ?></td>
            </tr>
        </table>        
    </div>
</div>
<div class="cpreg" id="<?php echo $c009000 ?>" >
    <div class="npreg"><b>90. </b></div>
    <div class="preg">
        <?php  echo $p009000; ?> : <br>
        <table>
            <tr id="op009001" style="display:none" >
                <td><b>- <?php echo $p009001; ?> </b></td>
                <td>
                    <?php
                        printRadios(9001,$item);
                    ?>
                </td>
            </tr>
            <tr id="op009002" style="display:none">
                <td><b>- <?php echo $p009002; ?> </b></td>
                <td>
                    <?php
                        printRadios(9002,$item);
                    ?>
                </td>
            </tr>
        </table>

    </div>
</div>
<div class="cpreg" id="<?php echo $c009100 ?>" style="display:none" >
    <div class="npreg"><b>91. </b></div>
    <div class="preg">
        <?php  echo $p009100; ?> : <br>
        <?php printCheck("9100",$items82,$rep009100); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c009200 ?>" style="display:none" >
    <div class="npreg"><b>92. </b></div>
    <div class="preg">
        <?php  echo $p009200; ?> : <br>
         <?php printCheck("9200",$items82,$rep009200); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c009300 ?>" >
    <div class="npreg"><b>93. </b></div>
    <div class="preg">
        <?php  echo $p009300; ?> : <br>
       <?php printCheck("9300",$items84,$rep009300); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c009400 ?>" style="display:none" >
    <div class="npreg"><b>94. </b></div>
    <div class="preg">
        <?php  echo $p009400; ?> : <br>
        <?php printCheck("9400",$items85,$rep009400); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c009500 ?>" >
    <div class="npreg"><b>95. </b></div>
    <div class="preg">
        <?php  echo $p009500; ?> : <br>
        Fecha <input type="text" name="009501" id="009501" onkeypress="return permite(event,'num_car');" value="" class="input_text" size="10" maxlength="10" /> -
        Hora <input type="text" name="009502" id="009502" onkeypress="return permite(event,'num');" class="input_text" maxlength="2" size="2" style="border:1px solid #ccc; border-right:0; text-align: right" /><div style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; height: 16px !important; width: 5px; display: inline-block; padding: 2px;">:</div><input type="text" name="009503" id="009503"  maxlength="2" size="2" style="border:1px solid #ccc; border-left:0px; text-align: left" onkeypress="return permite(event,'num');" class="input_text"/>
    </div>
</div>
<div class="cpreg" id="<?php echo $c009600 ?>" >
    <div class="npreg"><b>96. </b></div>
    <div class="preg">
        <?php  echo $p009600; ?> : <br>
        <?php
             printRadios(9600,$item86);
         ?>
    </div>
</div>