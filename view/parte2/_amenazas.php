<div class="cpreg" id="<?php echo $c016700 ?>" >
    <div class="subtitle">AMENAZAS</div>
    <div class="npreg"><b>167. </b></div>
    <div class="preg">
        <?php  echo $p016700; ?> : <br>
        <?php combo(16700,$item97,$rep016700,$disabled); ?>
    </div>
</div>

<div class="cpreg" id="<?php echo $c016800 ?>" >
    <div class="npreg"><b>168. </b></div>
    <div class="preg">
        <?php  echo $p016800; ?> : <br>
        <?php
           
            combo_key(16800,$item168,$rep016800,$disabled);
        ?>
    </div>
</div>

<div class="cpreg" id="<?php echo $c016900 ?>" >
    <div class="npreg"><b>169. </b></div>
    <div class="preg">
        <?php  echo $p016900; ?> : <br>
         <?php
            printRadios(16900,$item141,$rep016900);
        ?>
    </div>
</div>

<div class="cpreg" id="<?php echo $c017000 ?>" >
    <div class="npreg"><b>170. </b></div>
    <div class="preg">
        <?php  echo $p017000; ?> : <br>
        <?php
            combo(17000,$item142,$rep017000,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c017100 ?>" >
    <div class="npreg"><b>171. </b></div>
    <div class="preg">
        <?php  echo $p017100; ?> : <br>
        <?php
           
            printRadios(17100,$item171,$rep017100);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c017200 ?>" >
    <div class="npreg"><b>172. </b></div>
    <div class="preg">
        <?php  echo $p017200; ?> : <br>
        <?php
            printRadios(17200,$item,$rep017200);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c017300 ?>" >
    <div class="npreg"><b>173. </b></div>
    <div class="preg">
        <?php  echo $p017300; ?> : <br>
        <?php
            combo(17300,$item144,$rep017300,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c017400 ?>" >
    <div class="npreg"><b>174. </b></div>
    <div class="preg">
        <?php  echo $p017400; ?> : <br>
         <?php
            printRadios(17400,$item77,$rep017400);
            
        ?>
        <table style=" border:0px solid #ccc;" id="t017400">
            <?php foreach($item174 as $key => $valor) { ?>
            <tr>
                <td style="width:450px;"><div class="item174 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>        
    </div>
</div>
<div class="cpreg" id="<?php echo $c017500 ?>" >
    <div class="npreg"><b>175. </b></div>
    <div class="preg">
        <?php  echo $p017500; ?> : <br>
         <table>
            <tr id="polis175" style="display:none" >
                <td><b>- <?php echo $p017501; ?> </b></td>
                <td>
                    <?php printRadios(17501,$item,$rep017501); ?>
                </td>
            </tr>
            <tr id="minpublic175" style="display:none">
                <td><b>- <?php echo $p017502; ?> </b></td>
                <td>
                    <?php printRadios(17502,$item,$rep017502); ?>
                </td>
            </tr>
            <tr id="demuna175" style="display:none">
                <td><b>- <?php echo $p017503; ?> </b></td>
                <td>
                    <?php printRadios(17503,$item,$rep017503); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c017600 ?>" style="display:none" >
    <div class="npreg"><b>176. </b></div>
    <div class="preg">
        <?php  echo $p017600; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item176 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c017700 ?>" style="display:none" >
    <div class="npreg"><b>177. </b></div>
    <div class="preg">
        <?php  echo $p017700; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item177 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c01770a ?>" style="display:none" >
    <div class="npreg"><b>177a. </b></div>
    <div class="preg">
        <?php  echo $p01770a; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item177a desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c017800 ?>" >
    <div class="npreg"><b>178. </b></div>
    <div class="preg">
        <?php  echo $p017800; ?> : <br>
        <?php
            printRadios(17800,$item86,$rep017800);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c017900 ?>" >
    <div class="npreg"><b>179. </b></div>
    <div class="preg">
        <?php  echo $p017900; ?> : <br>
        <?php
            printRadios(17900,$item,$rep017900);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c018000 ?>" >
    <div class="npreg"><b>180. </b></div>
    <div class="preg">
        <?php  echo $p018000; ?> : <br>
        <?php
            printRadios(18000,$item,$rep018000);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c018100 ?>" >
    <div class="npreg"><b>181. </b></div>
    <div class="preg">
        <?php  echo $p018100; ?> : <br>
        <?php
            printRadios(18100,$item,$rep018100);
        ?>
    </div>
</div>