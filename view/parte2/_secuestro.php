<div class="cpreg" id="<?php echo $c021500 ?>" >
    <div class="subtitle">SECUESTRO</div>
    <div class="npreg"><b>215. </b></div>
    <div class="preg">
        <?php  echo $p021500; ?> : <br>
        <?php
            combo(21500,$item97,$rep021500,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c021600 ?>" >
    <div class="npreg"><b>216. </b></div>
    <div class="preg">
        <?php  echo $p021600; ?> : <br>
        <?php
             combo_key(21600,$item168,$rep021600,$disabled);
        ?>        
    </div>
</div>
<div class="cpreg" id="<?php echo $c021700 ?>" >
    <div class="npreg"><b>217. </b></div>
    <div class="preg">
        <?php  echo $p021700; ?> : <br>
        <?php
            printRadios(21700,$item141,$rep021700);
         ?>        
    </div>
</div>
<div class="cpreg" id="cpreg021800" >
    <div class="npreg"><b>218. </b></div>
    <div class="preg">
        <?php  echo $p021800; ?> : <br>
        <?php
            combo(21800,$item142,$rep021800,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c021900 ?>" >
    <div class="npreg"><b>219. </b></div>
    <div class="preg">
        <?php  echo $p021900; ?> : <br>
        <?php
            printRadios(21900,$item,$rep021900);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c02200 ?>" >
    <div class="npreg"><b>220. </b></div>
    <div class="preg">
        <?php  echo $p022000; ?> : <br>
        <?php
            printRadios(22000,$item,$rep02200);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c022100 ?>" >
    <div class="npreg"><b>221. </b></div>
    <div class="preg">
        <?php  echo $p022100; ?> : <br>
        <?php
            combo(22100,$item144,$rep022100,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c022300 ?>" >
    <div class="npreg"><b>223. </b></div>
    <div class="preg">
        <?php  echo $p022300; ?> : <br>
         <?php
            
            combo_key(22300,$item223,$rep022300);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c0224000 ?>" >
    <div class="npreg"><b>224. </b></div>
    <div class="preg">
        <?php  echo $p022400; ?> : <br>
        <?php
            
           combo_key(22400,$item224,$rep022400);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c0225000 ?>" >
    <div class="npreg"><b>225. </b></div>
    <div class="preg">
        <?php  echo $p022500; ?> : <br>
        <?php
            printRadios(22500,$item,$rep022500);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c022600 ?>" >
    <div class="npreg"><b>226. </b></div>
    <div class="preg">
        <?php  echo $p022600; ?> : <br>
        <?php
            printRadios(22600,$item,$rep022600);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c022700 ?>" >
    <div class="npreg"><b>227. </b></div>
    <div class="preg">
        <?php  echo $p022700; ?> : <br>
        <?php
            printRadios(22700,$item,$rep022700);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c022800 ?>" >
    <div class="npreg"><b>228. </b></div>
    <div class="preg">
        <?php  echo $p022800; ?> : <br>
        <?php
            printRadios(22800,$item,$rep022800);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c022900 ?>" >
    <div class="npreg"><b>229. </b></div>
    <div class="preg">
        <?php  echo $p022900; ?> : <br>
        <?php
            printRadios(22900,$item,$rep022900);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c023000 ?>" >
    <div class="npreg"><b>230. </b></div>
    <div class="preg">
        <?php  echo $p023000; ?> : <br>
        <?php
            printRadios(23000,$item77,$rep023000);
        ?>
        <table style=" border:0px solid #ccc;" id="t023000">
            <?php foreach($items79 as $key => $valor) { ?>
            <tr>
                <td style="width:450px;"><div class="item230 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c023100 ?>" >
    <div class="npreg"><b>231. </b></div>
    <div class="preg">
        <?php  echo $p023100; ?> : <br>
        <table>
            <tr id="polis231" style="display:none" >
                <td><b>- <?php echo $p023101; ?> </b></td>
                <td>
                    <?php printRadios(23101,$item,$rep023101); ?>
                </td>
            </tr>
            <tr id="minpublic231" style="display:none">
                <td><b>- <?php echo $p023102; ?> </b></td>
                <td>
                    <?php printRadios(23102,$item,$rep023102); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c023200 ?>" style="display:none" >
    <div class="npreg"><b>232. </b></div>
    <div class="preg">
        <?php  echo $p023200; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item232 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c023300 ?>" style="display:none" >
    <div class="npreg"><b>233. </b></div>
    <div class="preg">
        <?php  echo $p023300; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item233 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>