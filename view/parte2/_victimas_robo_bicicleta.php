<div class="cpreg" id="<?php echo $c012900 ?>" >
    <div class="subtitle">VÍCTIMAS DE ROBO DE BICICLETA</div>
    <div class="npreg"><b>129. </b></div>
    <div class="preg">
        <?php  echo $p012900; ?> : <br>
         <?php
            //printRadios(12900,$item97,$rep012900);
         combo(12900,$item97,$rep012900,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c013000 ?>" >
    <div class="npreg"><b>130. </b></div>
    <div class="preg">
        <?php  echo $p013000; ?> : <br>
        <?php
            printRadios(13000,$item,$rep013000);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c013100 ?>" >
    <div class="npreg"><b>131. </b></div>
    <div class="preg">
        <?php  echo $p013100; ?> : <br/>
        <div class="div-link">
            <?php
                if(!$disabled && ($rep013101=="" && $rep013101==""))
                {
                $band = true;
            ?>
                    <a class="link link-no" id="l013100">Click aqui si es que NO se denunció</a>

            <?php
                }
                else
                    {
                    if($rep013101=="" && $rep013101=="")
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
        <table class="mytable" id="t013100">
            <tr>
                <td style="width:250px;"><?php echo $p013101; ?></td><td><?php printRadios("13101",$item,$rep013101); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><?php echo $p013102; ?></td><td><?php printRadios("13102",$item,$rep013101); ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c013200 ?>" >
    <div class="npreg"><b>132. </b></div>
    <div class="preg">
        <?php  echo $p013200; ?> : <br>
        <table>
            <tr id="polis132" style="display:none" >
                <td><b>- <?php echo $p013201; ?> </b></td>
                <td>
                    <?php printRadios(13201,$item); ?>
                </td>
            </tr>
            <tr id="minpublic132" style="display:none">
                <td><b>- <?php echo $p013202; ?> </b></td>
                <td>
                    <?php printRadios(13202,$item); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c013300 ?>" style="display:none" >
    <div class="npreg"><b>133. </b></div>
    <div class="preg">
        <?php  echo $p013300; ?> : <br>
       <?php printCheck("13300", $items82, $rep011300); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c013400 ?>" style="display:none" >
    <div class="npreg"><b>134. </b></div>
    <div class="preg">
        <?php  echo $p013400; ?> : <br>
        <?php printCheck("13400", $items82, $rep013400); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c013500 ?>" >
    <div class="npreg"><b>135. </b></div>
    <div class="preg">
        <?php  echo $p013500; ?> : <br>
        <?php printCheck("13500", $items84, $rep013500); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c013600 ?>" style="display:none" >
    <div class="npreg"><b>136. </b></div>
    <div class="preg">
        <?php  echo $p013600; ?> : <br>
        <?php printCheck("13600", $items85, $rep013600); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c013700 ?>" >
    <div class="npreg"><b>137. </b></div>
    <div class="preg">
        <?php  echo $p013700; ?> : <br>
        <?php
            printRadios(13700,$item86,$rep013700);
        ?>
    </div>
</div>