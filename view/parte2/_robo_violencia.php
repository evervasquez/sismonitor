<div class="cpreg" id="<?php echo $c013800 ?>" >
    <div class="subtitle">ROBO CON VIOLENCIA</div>
    <div class="npreg"><b>138. </b></div>
    <div class="preg">
        <?php  echo $p013800; ?> : <br>
         <?php
            //printRadios(13800,$item97,$rep013800);
            combo(13800,$item97,$rep013800,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c013900 ?>" >
    <div class="npreg"><b>139. </b></div>
    <div class="preg">
        <?php  echo $p013900; ?> : <br>
        Fecha <input type="text" name="013901" id="013901" value="" class="input_text" size="10" maxlength="10" /> -
        Hora <input type="text" name="013902" id="013902" class="input_text" maxlength="2" size="2" style="border:1px solid #ccc; border-right:0; text-align: right" /><div style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; height: 16px !important; width: 5px; display: inline-block; padding: 2px;">:</div><input type="text" name="013903" id="013903"  maxlength="2" size="2" style="border:1px solid #ccc; border-left:0px; text-align: left" class="input_text"/>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014000 ?>" >
    <div class="npreg"><b>140. </b></div>
    <div class="preg">
        <?php  echo $p014000; ?> : <br>
        <input type="text" name="014000" id="014000" value="" class="input_text" readonly="readonly" size="6" />
        <div id="text014000" style="display:inline; color: #0072B2; font-weight: bold;"></div>
        <a href="javascript:popup('index.php?controller=Unicri&action=gridDistritos&preg=014000',370,400)" class="clearr" style="width:50px; text-align: center">Buscar</a>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014100 ?>" >
    <div class="npreg"><b>141. </b></div>
    <div class="preg">
        <?php  echo $p014100; ?> : <br>
        <?php
            
            printRadios(14100,$item141,$rep014100);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014200 ?>" >
    <div class="npreg"><b>142. </b></div>
    <div class="preg">
        <?php  echo $p014200; ?> : <br>
        <?php
            
            combo(14200,$item142,$rep014200,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014300 ?>" >
    <div class="npreg"><b>143. </b></div>
    <div class="preg">
        <?php  echo $p014300; ?> : <br>
        <?php printRadios(14300,$item,$rep014300); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014400 ?>" >
    <div class="npreg"><b>144. </b></div>
    <div class="preg">
        <?php  echo $p014400; ?> : <br>
        <?php
           
           combo(14400,$item144,$rep014400);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014500 ?>" >
    <div class="npreg"><b>145. </b></div>
    <div class="preg">
        <?php  echo $p014500; ?> : <br>
        <?php
            printRadios(14500,$item,$rep014500);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014600 ?>" >
    <div class="npreg"><b>146. </b></div>
    <div class="preg">
        <?php  echo $p014600; ?> : <br>
        <?php
            printRadios(14600,$item77,$rep14600);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014700 ?>" >
    <div class="npreg"><b>147. </b></div>
    <div class="preg">
        <?php  echo $p014700; ?> : <br>
         <?php
            printRadios(14700,$item77,$rep014700);
        ?>
        <table style=" border:0px solid #ccc;" id="t014700">
            <?php foreach($items79 as $key => $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item147 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014800 ?>" >
    <div class="npreg"><b>148. </b></div>
    <div class="preg">
        <?php  echo $p014800; ?> : <br>
        <table>
            <tr id="polis148" style="display:none" >
                <td><b>- <?php echo $p014801; ?> </b></td>
                <td>
                    <?php printRadios(14801,$item); ?>
                </td>
            </tr>
            <tr id="minpublic148" style="display:none">
                <td><b>- <?php echo $p014802; ?> </b></td>
                <td>
                    <?php printRadios(14802,$item); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c014900 ?>" style="display:none" >
    <div class="npreg"><b>149. </b></div>
    <div class="preg">
        <?php  echo $p014900; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item149 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c015000 ?>" style="display:none" >
    <div class="npreg"><b>150. </b></div>
    <div class="preg">
        <?php  echo $p015000; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items82 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item150 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c015100 ?>" >
    <div class="npreg"><b>151. </b></div>
    <div class="preg">
        <?php  echo $p015100; ?> : <br>
         <table style=" border:0px solid #ccc;">
         <?php foreach($items84 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item151 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
         <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c015200 ?>" >
    <div class="npreg"><b>152. </b></div>
    <div class="preg">
        <?php  echo $p015200; ?> : <br>
        <table style=" border:0px solid #ccc;">
         <?php foreach($items85 as $valor){ ?>
            <tr>
                <td style="width:450px;"><div class="item152 desactivado clsitems"><?php echo $valor; ?></div></td>
            </tr>
         <?php } ?>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c015300 ?>" >
    <div class="npreg"><b>153. </b></div>
    <div class="preg">
        <?php  echo $p015300; ?> : <br>
        <?php
            printRadios(15300,$item86,$rep015300);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c015400 ?>" >
    <div class="npreg"><b>154. </b></div>
    <div class="preg">
        <?php  echo $p015400; ?> : <br>
        <?php
            printRadios(15400,$item,$rep015400);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c015500 ?>" >
    <div class="npreg"><b>155. </b></div>
    <div class="preg">
        <?php  echo $p015500; ?> : <br>
        <?php
             printRadios(15500,$item,$rep015500);
        ?>
    </div>
</div>