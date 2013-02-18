<div class="cpreg" id="<?php echo $c007500 ?>" >
    <div class="subtitle">VÍCTIMAS DE ROBO DE VIVIENDA</div>
    <div class="npreg"><b>75. </b></div>
    <div class="preg">
        <?php  echo $p007500; ?> : <br>
        <?php printRadios(7500,$item,$rep007500); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c007600 ?>" <?php diferente($rep007500,1) ?> >
    <div class="npreg"><b>76. </b></div>
    <div class="preg">
        <?php  echo $p007600; ?> : <br>
        <?php printRadios(7600,$item,$rep007600); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c007700 ?>" >
    <div class="npreg"><b>77. </b></div>
    <div class="preg">
        <?php  echo $p007700; ?> : <br>
       <?php
       
       printRadios(7700,$item77,$rep007700); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c007800 ?>" >
    <div class="npreg"><b>78. </b></div>
    <div class="preg">
        <?php  echo $p007800; ?> : <br>
        <?php
            printCheck("7800",$items78,$rep007800);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c007900 ?>" >
    <div class="npreg"><b>79. </b></div>
    <div class="preg">
        <?php  echo $p007900; ?> : <br>
        Fecha <input type="text" name="007901" id="007901" onkeypress="return permite(event,'num_car');" value="" class="input_text" size="10" maxlength="10" value="<?php echo $rep007901; ?>" /> -
        Hora <input type="text" name="007902" id="007902" onkeypress="return permite(event,'num');" class="input_text" maxlength="2" size="2" style="border:1px solid #ccc; border-right:0; text-align: right" value="<?php echo $rep007902; ?>" /><div style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; height: 16px !important; width: 5px; display: inline-block; padding: 2px;">:</div><input type="text" name="007903" id="007903"  maxlength="2" onkeypress="return permite(event,'num');" size="2" style="border:1px solid #ccc; border-left:0px; text-align: left" class="input_text" value="<?php echo $rep007903; ?>" />
    </div>
</div>
<div class="cpreg" id="<?php echo $c008000 ?>" >
    <div class="npreg"><b>80. </b></div>
    <div class="preg">
        <?php  echo $p008000; ?> :<br/>
       <div class="div-link">
            <?php
                if(!$disabled && ($rep008001=="" && $rep008001==""))
                {
                $band = true;
            ?>
                    <a class="link link-no" id="l008000">Click aqui si es que NO se denunció</a>

            <?php
                }
                else
                    {
                    if($rep008001=="" && $rep008001=="")
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
        <table class="mytable" id="t008000">
            <tr>
                <td style="width:250px;"><?php echo $p008001; ?></td><td><?php printRadios("8001",$item,$rep008001); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><?php echo $p008002; ?></td><td><?php printRadios("8002",$item,$rep008001); ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c008100 ?>" >
    <div class="npreg"><b>81. </b></div>
    <div class="preg">
        <?php  echo $p008100; ?> : <br>
        <table>
            <tr id="op008101" style="display:none" >
                <td><b>- <?php echo $p008101; ?> </b></td>
                <td>
                    <?php printRadios(8101,$item); ?>
                </td>
            </tr>
            <tr id="op008102" style="display:none">
                <td><b>- <?php echo $p008102; ?> </b></td>
                <td>
                    <?php printRadios(8102,$item); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c008200 ?>" style="display:none" >
    <div class="npreg"><b>82. </b></div>
    <div class="preg">
        <?php  echo $p008200; ?> : <br>
        <?php
            printCheck("8200",$items82,$rep008200);
        ?>        
    </div>
</div>
<div class="cpreg" id="<?php echo $c008300 ?>" style="display:none" >
    <div class="npreg"><b>83. </b></div>
    <div class="preg">
        <?php  echo $p008300; ?> : <br/>
        <?php
            printCheck("8300",$items82,$rep008300);
        ?> 
    </div>
</div>
<div class="cpreg" id="<?php echo $c008400 ?>" >
    <div class="npreg"><b>84. </b></div>
    <div class="preg">
        <?php  echo $p008400; ?> : <br>
        <?php
            printCheck("8400",$items84,$rep008400);
        ?>        
    </div>
</div>
<div class="cpreg" id="<?php echo $c008500 ?>" style="display:none" >
    <div class="npreg"><b>85. </b></div>
    <div class="preg">
        <?php  echo $p008500; ?> : <br>
        <?php
            printCheck("8500",$items85,$rep008400);
        ?>        
    </div>
</div>
<div class="cpreg" id="<?php echo $c008600 ?>" >
    <div class="npreg"><b>86. </b></div>
    <div class="preg">
        <?php  echo $p008600; ?> : <br>
        <?php
            printRadios(8600,$item86);
        ?>
        
    </div>
</div>
<div class="cpreg" id="<?php echo $c008700 ?>" >
    <div class="npreg"><b>87. </b></div>
    <div class="preg">
        <?php  echo $p008700; ?> : <br>
        <?php
            printRadios(8700,$item);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c008800 ?>" >
    <div class="npreg"><b>88. </b></div>
    <div class="preg">
        <?php  echo $p008800; ?> : <br>
        <?php
            printRadios(8800,$item);
        ?>
    </div>
</div>