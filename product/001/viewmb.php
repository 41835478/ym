<?
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","yjcode_pro where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
$nowmoney=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);
$ty1name=returntype(1,$row[ty1id]);

$sqlsell="select * from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$ressell=mysql_query($sqlsell);
if(!$rowsell=mysql_fetch_array($ressell)){php_toheader("../");}
$nuid=returnuserid($_SESSION["SHOPUSER"]);

$nch="";
if(isset($_COOKIE['prohistoy'])){
$nch=$_COOKIE['prohistoy'];
if(check_in($row[id]."xcf",$nch)){$nch=str_replace($row[id]."xcf","",$nch);}
$a=preg_split("/xcf/",$nch);
if(count($a)>6){$ni=6;}else{$ni=count($a);}
 $nch="";
 for($i=0;$i<=$ni;$i++){
 $nch=$nch.$a[$i]."xcf";
 }
}

$Month = 864000 + time();
setcookie(prohistoy,$row[id]."xcf".$nch, $Month,'/');
$nch=$_COOKIE['prohistoy'];
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=returnjgdw($row[wkey],"",$row[tit])?>">
<meta name="description" content="<?=returnjgdw($row[wdes],"",strgb2312(strip_tags($row[txt]),0,250))?>">
<title><?=$row[tit]?> - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="001/view.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="001/view.js"></script>
<script type="text/javascript" src="jquery-plugin-slide.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbmain fontyh">
<div class="yjcode">

 <div class="dqwz">
 <ul class="u1">
 <li class="l1">
 当前位置：<a href="<?=weburl?>">首页</a> > <a href="search_j<?=$row[ty1id]?>v.html"><?=returntype(1,$row[ty1id])?></a>
 <? if(0!=$row[ty2id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v.html"><?=returntype(2,$row[ty2id])?></a><? }?>
 <? if(0!=$row[ty3id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(3,$row[ty3id])?></a><? }?>
 </li>
 </ul>
 </div>

 <!--左B-->
 <div class="mainleft">
 
  <h1 class="tit"><?=$row[tit]?></h1>
  <ul class="usell">
  <li class="l1"><img border="0" src="<?=returntppd("../upload/".$row[id]."/user.jpg","../user/img/nonetx.gif")?>" width="100" height="100" /></li>
  <li class="l2">
  <?=returnjgdw($rowsell[shopname],"","店铺名称未命名")?><br>
  <? if(1==$rowsell[ifemail]){?><img src="../user/img/rz1.gif" /><? }?>
  <? if(2==$rowsell[ifmot]){?><img src="../user/img/rz2.gif" /><? }?>
  <? if(3==$rowsell[sfzrz]){?><img src="../user/img/rz3.gif" /><? }?>
  </li>
  </ul>
  
  <!--切换B-->
  <div class="protp">
   <div class ='Homeslide' >
   <div class ='Homeslide_bigwrap'>
    <div class='Homeslide_hand0'></div>
    <div class='Homeslide_hand1'></div>
    <div class='Homeslide_bigpicdiv'><a href='../tp/showpic.php?bh=<?=$row[bh]?>' target="_blank"><img src=""></a></div>
   </div>
   <div class='Homeslide_thumb' style="display:none;"><ul></ul></div>
   </div>
   <script type="text/javascript">
   var home_slide_data = 
   [
   <? $tpses="yjcode_tp where bh='".$row[bh]."'";$i=1;while1("*",$tpses);while($row1=mysql_fetch_array($res1)){?>
   <? if($i>1){?>,<? }?>{"title":"","onc":"","image":"../<?=$row1[tp]?>","thumb":"../<?=returnnotp($row1[tp],"-1")?>","mark":"<?=$i?>"}
   <? $i++;}?>
   ]; 
   $('.Homeslide').homeslide(home_slide_data,false,3000);
   </script>
  </div>
  <!--切换E-->
  
  <div class="leftcap">商品详情</div>
  <div class="lefttxt">
  <? $protxt=$row[txt];?>
  <? if(check_in("video",$row[txt])){?>
  <link href="../config/ueditor/third-party/video-js/video-js.min.css" rel="stylesheet" type="text/css" />
  <script language="javascript" src="../config/ueditor/third-party/video-js/video.dev.js"></script>
  <? }?>
  <?=$protxt?>
  </div>
  
 </div>
 <!--左E-->
 
 <!--右B-->
 <div class="mainright">
  
  <!--右1B-->
  <div class="mr1">
  <div class="d1">价格：<span id="nowmoney"><?=$nowmoney?></span>元人民币<span id="nowmoneyY" style="display:none;"><?=$nowmoney?></span> [<a href="../user/pay.php" class="g_ac2" target="_blank">充值</a>]</div>
  <? 
  if(2==$row[yhxs] && $sj<=$row[yhsj2]){
  if($sj<$row[yhsj1]){$a=1;}else{$a=2;}
  ?>
  <span id="nyhsj1" style="display:none;"><?=str_replace("-","/",$row[yhsj1])?></span>
  <span id="nyhsj2" style="display:none;"><?=str_replace("-","/",$row[yhsj2])?></span>
  <span id="nmoney2" style="display:none;"><?=returnjgdian($row[money2])?></span>
  <span id="nmoney3" style="display:none;"><?=returnjgdian($row[money3])?></span>
  <span id="nowsj" style="display:none;"><?=str_replace("-","/",$sj)?></span>
  <ul class="u5" id="xsyh">
  <li class="l1">促销：</li>
  <li class="l2"><span class="s1"><?=$row[yhsm]?></span><span class="s2">(促销将于<span id="yhsjv"></span>)</span></li>
  </ul>
  <script language="javascript" src="yhsj.js"></script>
  <script language="javascript">yhsj(<?=$a?>);</script>
  <? }?>
   <!--套餐B-->
   <? $alli=returncount("yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."'");if($alli>0){?>
   <div id="tcnum" style="display:none;"><?=$alli?></div>
   <ul class="utc" id="utc1">
   <li class="l1">套餐：</li>
   <li class="l2">
   <? 
   $i=1;
   $ja=0;
   while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
   if(empty($row1[fhxs])){$k=$row[kcnum];}else{$k=$row1[kcnum];}
   $oncj="taocanonc(".$i.",".$alli.",".$row1[money1].",".$row1[money2].",".$row1[id].",".sprintf("%.1f",$row1[money1]/$row1[money2]*10).",".$k.")";
   if($i==1){$ja=$row1[id];}
   ?>
   <a href="javascript:void(0);" id="taocana<?=$i?>" onClick="<?=$oncj?>"><?=$row1[tit]?><i></i></a>
   <? $i++;}?>
   </li>
   </ul>
   
   <?
   while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
   $alli2=returncount("yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."'");if($alli2>0){
   $i=1;
   ?>
   <span id="tc2num<?=$row1[id]?>" style="display:none;"><?=$alli2?></span>
   <ul class="utc" id="tc2div<?=$row1[id]?>" style="display:none;">
   <li class="l1">选择：</li>
   <li class="l2">
   <? 
   while2("*","yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){
   if(empty($row2[fhxs])){$k=$row[kcnum];}else{$k=$row2[kcnum];}
   ?>
   <a href="javascript:void(0);" id="taocan2a<?=$row1[id]?>_<?=$i?>" onClick="taocan2onc(<?=$i?>,<?=$alli2?>,<?=$row2[money1]?>,<?=$row2[money2]?>,<?=$row2[id]?>,<?=sprintf("%.1f",$row2[money1]/$row2[money2]*10)?>,<?=$k?>)"><?=$row2[tit2]?><i></i></a>
   <? $i++;}?>
   </li>
   </ul>
   <? }}?>
   
   <script language="javascript">pretc1id=<?=$ja?>;</script>
   <? }?>
   <!--套餐E-->
   
   <ul class="u6">
   <li class="l1"><input type="text" onChange="moneycha()" id="tkcnum" value="1" /></li>
   <li class="l2"><a href="javascript:void(0);" onClick="shujia()" class="a1">+</a><a href="javascript:void(0);" onClick="shujian()" class="a2">-</a></li>
   </ul>
   <ul class="u4">
   <li class="l1">
   <a href="javascript:buyInto('<?=$row[bh]?>')" class="buy">立即购买</a>
   <? 
   $a1="none";$a2="none";
   if($_SESSION["SHOPUSER"]==""){$a1="";}else{
	if(panduan("probh,userid","yjcode_car where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
   }
   ?>
   <a href="javascript:carInto('<?=$row[bh]?>')" id="cara1" style="display:<?=$a1?>;" class="car">加入购物车</a>
   <a href="../user/car.php" id="cara2" style="display:<?=$a2?>;" class="carok">已在购物车</a>
   </li>
   </ul>
   
   <ul class="u1">
   <li class="l1">库存：<span id="nowkcnum"><?=$row[kcnum]?></span></li>
   <li class="l2">销量：<?=$row[xsnum]?></li>
   </ul>
   <ul class="probq">
   <? 
   $a=preg_split("/xcf/",$row[tysx]);
   $sx1arr=array();
   $sxall="xcf";
   $m=0;
   for($i=0;$i<=count($a);$i++){
    $ai=$a[$i];
    if($ai!=""){
     if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
     while1("*","yjcode_typesx where id=".$ai);if($row1=mysql_fetch_array($res1)){
      while2("*","yjcode_typesx where name1='".$row1[name1]."' and admin=1 and ifjd=1");if($row2=mysql_fetch_array($res2)){
       if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
       if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
       $sxall=$sxall.$row1[name1].":".$v."xcf";
      }
     }
    }
   }
   for($i=0;$i<count($sx1arr);$i++){
   ?>
   <li class="l1"><?=$sx1arr[$i]?>：<? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?></li>
   <? }?>
   </ul>
   
  </div>
  <!--右1E-->
  
  <!--右2B-->
  <div class="mr2">
   <ul class="u1"><li class="l1">同分类商品</li><li class="l2"><a href="../shop/prolist_i<?=$row[userid]?>v_j<?=$row[ty1id]?>v.html" target="_blank" class="g_bg0">查看更多</a></li></ul>
   <? 
   while1("*","yjcode_pro where userid=".$row[userid]." and zt=0 and ifxj=0 order by lastsj desc limit 4");while($row1=mysql_fetch_array($res1)){
   $tp="../".returntp("bh='".$row1[bh]."' order by xh asc","-1");
   $money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
   $au="view".$row1[id].".html";
   ?>
   <ul class="u2">
   <li class="l1"><img src="<?=returntppd("../".returntp("bh='".$row1[bh]."'","-1"),"../img/none180x180.gif")?>"></li>
   <li class="l2"><span class="s1">￥<?=$money1?></span> <a href="<?=$au?>" target="_blank"><?=$row1[tit]?></a></li>
   </ul>
   <? }?>
   <div class="allm"><a href="../shop/view<?=$row[userid]?>.html" target="_blank">查看更多</a></div>
  </div>
  <!--右2E-->
  
  <!--右3B-->
  <div class="mr3">
   <div class="d1">推荐分类：</div>
   <? while1("*","yjcode_type where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="search_j<?=$row[ty1id]?>v_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a>
   <? }?>
  </div>
  <!--右3E-->
  
 </div>
 <!--右E-->
 
</div>
</div>

<? include("../tem/bottom.html");?>
</body>
</html>