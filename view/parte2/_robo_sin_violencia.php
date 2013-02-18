<div class="cpreg" id="<?php echo $c015600 ?>" >
    <div class="subtitle">ROBOS SIN VIOLENCIA</div>
    <div class="npreg"><b>156. </b></div>
    <div class="preg">
        <?php  echo $p015600; ?> : <br>
        <?php combo(15600,$item97,$rep015600,$disabled); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c015700 ?>" >
    <div class="npreg"><b>157. </b></div>
    <div class="preg">
        <?php  echo $p015700; ?> : <br>
        <?php
            printRadios(15700,$item77,$rep015700);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c015800 ?>" >
    <div class="npreg"><b>158. </b></div>
    <div class="preg">
        <?php  echo $p015800; ?> : <br>
        <?php
            printRadios(15800,$item141,$rep015800);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c015900 ?>" >
    <div class="npreg"><b>159. </b></div>
    <div class="preg">
        <?php  echo $p015900; ?> : <br>
        <?php
            combo(15900,$item142,$rep015900,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c016000 ?>" >
    <div class="npreg"><b>160. </b></div>
    <div class="preg">
        <?php  echo $p016000; ?> : <br>        
        <?php
            printRadios(16000,$item77,$rep016000);
        ?>
        <table style=" border:0px solid #ccc;" id="t016000">
            <?php foreach($items79 as $key => $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item160 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>       
    </div>
</div>
<div class="cpreg" id="<?php echo $c016100 ?>" >
    <div class="npreg"><b>161. </b></div>
    <div class="preg">
        <?php  echo $p016100; ?> : <br>
         <table>
            <tr id="polis161" style="display:none" >
                <td><b>- <?php echo $p016101; ?> </b></td>
                <td>
                    <?php printRadios(16101,$item); ?>
                </td>
            </tr>
            <tr id="minpublic161" style="display:none">
                <td><b>- <?php echo $p016102; ?> </b></td>
                <td>
                    <?php printRadios(16102,$item); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c016200 ?>" style="display:none" >
    <div class="npreg"><b>162. </b></div>
    <div class="preg">
        <?php  echo $p016200; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item162 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c016300 ?>" style="display:none" >
    <div class="npreg"><b>163. </b></div>
    <div class="preg">
        <?php  echo $p016300; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item163 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c016400 ?>" >
    <div class="npreg"><b>164. </b></div>
    <div class="preg">
        <?php  echo $p016400; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items84 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item164 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
         <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c016500 ?>" >
    <div class="npreg"><b>165. </b></div>
    <div class="preg">
        <?php  echo $p016500; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items85 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item165 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
         <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c016600 ?>" >
    <div class="npreg"><b>166. </b></div>
    <div class="preg">
        <?php  echo $p016600; ?> : <br>
         <?php
            printRadios(16600,$item86,$rep016600);
        ?>
    </div>
</div>