<div class="cpreg" id="<?php echo $c019900 ?>" >
    <div class="subtitle">OFENSAS SEXUALES</div>
    <div class="npreg"><b>199. </b></div>
    <div class="preg">
        <?php  echo $p019900; ?> : <br>
        <?php
            combo(19900,$item97,$rep019900,$disabled);
        ?>
    </div>    
</div>
<div class="cpreg" id="<?php echo $c020000 ?>" >
    <div class="npreg"><b>200. </b></div>
    <div class="preg">
        <?php  echo $p020000; ?> : <br>
        <?php
            
            combo(20000,$item200,$rep020000,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c020100 ?>" >
    <div class="npreg"><b>201. </b></div>
    <div class="preg">
        <?php  echo $p020100; ?> : <br>
        <?php
             combo_key(20100,$item168,$rep020100,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c020200 ?>" >
    <div class="npreg"><b>202. </b></div>
    <div class="preg">
        <?php  echo $p020200; ?> : <br>
         <?php
            printRadios(20200,$item141,$rep020200);
         ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c020300 ?>" >
    <div class="npreg"><b>203. </b></div>
    <div class="preg">
         <?php  echo $p020300; ?> : <br>
         <?php
            combo(20300,$item142,$rep020300,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c020400 ?>" >
    <div class="npreg"><b>204. </b></div>
    <div class="preg">
        <?php  echo $p020400; ?> : <br>
        <?php
            printRadios(20400,$item,$rep020400);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c020500 ?>" >
    <div class="npreg"><b>205. </b></div>
    <div class="preg">
        <?php  echo $p020500; ?> : <br>
        <?php
            combo(20500,$item144,$rep020500,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c020600 ?>" >
    <div class="npreg"><b>206. </b></div>
    <div class="preg">
        <?php  echo $p020600; ?> : <br>
        <?php
            printRadios(20600,$item,$rep020600);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c020700 ?>" >
    <div class="npreg"><b>207. </b></div>
    <div class="preg">
        <?php  echo $p020700; ?> : <br>
        <?php
            printRadios(20700,$item86,$rep020700);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c020800 ?>" >
    <div class="npreg"><b>208. </b></div>
    <div class="preg">
        <?php  echo $p020800; ?> : <br>
        <?php
            printRadios(20800,$item,$rep020800);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c020900 ?>" >
    <div class="npreg"><b>209. </b></div>
    <div class="preg">
        <?php  echo $p020900; ?> : <br>
        <?php
            printRadios(20900,$item77,$rep020900);
        ?>
        <table style=" border:0px solid #ccc;" id="t020900">
            <?php foreach($item174 as $key => $valor) { ?>
            <tr>
                <td style="width:450px;"><div class="item209 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c021000 ?>" >
    <div class="npreg"><b>210. </b></div>
    <div class="preg">
        <?php  echo $p021000; ?> : <br>
        <table>
            <tr id="polis210" style="display:none" >
                <td><b>- <?php echo $p021001; ?> </b></td>
                <td>
                    <?php printRadios(21001,$item,$rep021001); ?>
                </td>
            </tr>
            <tr id="minpublic210" style="display:none">
                <td><b>- <?php echo $p021002; ?> </b></td>
                <td>
                    <?php printRadios(21002,$item,$rep021002); ?>
                </td>
            </tr>
            <tr id="demuna210" style="display:none">
                <td><b>- <?php echo $p021003; ?> </b></td>
                <td>
                    <?php printRadios(21003,$item,$rep021003); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c021100 ?>" style="display:none">
    <div class="npreg"><b>211. </b></div>
    <div class="preg">
        <?php  echo $p021100; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item211 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c021200 ?>" style="display:none">
    <div class="npreg"><b>212. </b></div>
    <div class="preg">
        <?php  echo $p021200; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item212 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
    <div class="cpreg" id="<?php echo $c02120a ?>" style="display:none" >
    <div class="npreg"><b>212a. </b></div>
    <div class="preg">
        <?php  echo $p02120a; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item212a desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c021300 ?>" >
    <div class="npreg"><b>213. </b></div>
    <div class="preg">
        <?php  echo $p021300; ?> : <br>
        <?php
            printRadios(21300,$item,$rep021300);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c021400 ?>" >
    <div class="npreg"><b>214. </b></div>
    <div class="preg">
        <?php  echo $p021400; ?> : <br>
        <?php
            printRadios(21400,$item,$rep021400);
        ?>
    </div>
</div>