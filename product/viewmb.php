<?
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","yjcode_pro where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
$nowmoney=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);

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
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=returnjgdw($row[wkey],"",$row[tit])?>">
<meta name="description" content="<?=returnjgdw($row[wdes],"",strgb2312(strip_tags($row[txt]),0,250))?>">
<title><?=$row[tit]?> - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/view.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="static/css/common.css" type="text/css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="<?=weburl?>js/basic.js"></script>
<script language="javascript" src="<?=weburl?>product/view.js"></script>
<script type="text/javascript" src="jquery-plugin-slide.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<?php include_once("baidu_js_push.php") ?>
<div class="bfb bfbtop fontyh">
<div class="yjcode">

<? include("../tem/top.html");?>

 </div> 
</div>
</div>
<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
userCheckses();
</script>
<div class="yjcode"></div>
<? include("../tem/top1.html");?>

   </div>
      </div>
	     </div>
		    </div>
			
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

 
 <div class="jbmain">

  <!--图片区B-->
  <? while3("*","yjcode_provideo where probh='".$row[bh]."' and zt=0 and iftj=1");if($row3=mysql_fetch_array($res3)){$provideo=1;}else{$provideo=0;}?>
  <div class="qhtp">
  <!--切换B-->
  <div class="protp" id="protp">
   <div class ='Homeslide' >
   <div class ='Homeslide_bigwrap'>
    <div class='Homeslide_hand0'></div>
    <div class='Homeslide_hand1'></div>
    <div class='Homeslide_bigpicdiv'><a href='../tp/showpic.php?bh=<?=$row[bh]?>' target="_blank" id="tupiana"><img src=""></a></div>
   </div>
   <div class='Homeslide_thumb' style="display:none;"><ul></ul></div>
   </div>
   <script type="text/javascript">
   var home_slide_data = 
   [
   <? if($provideo==1){?>{"title":"","onc":"videoonc(1)","image":"img/video_b.jpg","thumb":"img/video.jpg","mark":"0"}<? }?>
   <? $tpses="yjcode_tp where bh='".$row[bh]."'";$i=1;while1("*",$tpses);while($row1=mysql_fetch_array($res1)){?>
   <? if($i>1 || !empty($provideo)){?>,<? }?>{"title":"","onc":"","image":"../<?=$row1[tp]?>","thumb":"../<?=returnnotp($row1[tp],"-1")?>","mark":"<?=$i?>"}
   <? $i++;}?>
   ]; 
   $('.Homeslide').homeslide(home_slide_data,false,3000);
   </script>
 </div>
 <!--切换E-->
 <!--视频B-->
 <div class="video" id="provideo" style="display:none;">
 <? if($provideo==1){echo returnvideo($row3[admin],350,378,$row3[url],"../");}?>
 <a class="kang" href="javascript:void(0);" onClick="videoonc(2)">切换到图片模式</a>
 </div>
 <!--视频E-->
 
  <ul class="u1">
  <? 
  $a1="none";$a2="none";
  if(empty($nuid)){$a1="";}else{
   if(panduan("probh,userid","yjcode_profav where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
  }
  ?>
  <li class="l1" id="favpno" style="display:<?=$a1?>;"><a href="javascript:profavInto('<?=$row[bh]?>')">加入收藏</a></li>
  <li class="l1" id="favpyes" style="display:<?=$a2?>;"><a href="../user/favpro.php">已收藏</a></li>
  </ul>

 
  </div>
  <!--图片区E-->

 <!--中间B-->
 <div class="jbmiddle" id="jbmiddle">
   <h1><?=$row[tit]?></h1>
   <? $plnum=returncount("yjcode_propj where probh='".$row[bh]."'");if($plnum>0){?>
   <ul class="pful">
   <li class="l1">
   <img src="../img/x1.png" class="img1" width="92" height="15" />
   <? $pf=round(($row[pf1]+$row[pf2]+$row[pf3])/3,2);?>
   <div class="pf" style="width:<?=$pf/5*92?>px;"><img src="../img/x2.png" title="<?=$pf?>分" width="92" height="15" /></div>
   </li>
   </ul>
   <? }?>
   
   <div class="jg">
   

	<div class="jgm">
    <div class="d0"style="display:none;">本站优惠价</div>
    <div class="d1">￥<span id="nowmoney"><?=sprintf("%.2f",$nowmoney)?></span><span id="nowmoneyY" style="display:none;"><?=$nowmoney?></span></div>
    <div class="d2">
      <span class="s1" id="zhekou"><? if(!empty($row[money1])){echo sprintf("%.1f",$nowmoney/$row[money1]*10)."折";}else{echo "无折扣";}?></span>
     <span class="s2"style="display:none;">原价：<s id="yuanjia">￥<?=returnjgdian($row[money1])?></s></span>
    </div>
    </div>

	
	<ul class="kc">
    <li class="l1"><a href="#pj"><?=$plnum?>条评论</a></li>
    <li class="l1">累计销量<?=$row[xsnum]?></li>
    <li class="l2"style="display:none;"><span id="nowkcnum"><?=$row[kcnum]?></span></li>
    </ul>
    
   </div>
   
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
   <li class="l2"><span class="s1"><?=$row[yhsm]?></span><span class="s2">(将于<span id="yhsjv"></span>)</span></li>
   </ul>
   <script language="javascript" src="yhsj.js"></script>
   <script language="javascript">yhsj(<?=$a?>);</script>
   <? }?>
   


   <ul class="u0">
   <li class="l1">商家服务</li>
   <li class="l2">由"<a href="../shop/view<?=$rowsell[id]?>.html" target="_blank"><strong><?=$rowsell[shopname]?></strong></a>"发货，并提供售后服务。</li>
   <li class="l1">购买需知</li>
   <li class="l2"><a href="#" id="isread-text" class="installing red" style="letter-spacing:0;">[ 新站声明 ]</a>
   </ul>
   
   <!--套餐B-->
   <? $alli=returncount("yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."'");if($alli>0){?>
   <div id="tcnum" style="display:none;"><?=$alli?></div>
   <ul class="utc" id="utc1">
   <li class="l1">套餐</li>
   <li class="l2">
   <? 
   $i=1;
   $ja=0;
   while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
   if(empty($row1[fhxs])){$k=$row[kcnum];}else{$k=$row1[kcnum];}
   if($i==1){$ja=$row1[id];}
   $bgtp="../upload/".$row1[userid]."/".$row1[probh]."/tc".$row1[id]."-1.png";
   if(is_file($bgtp)){$tit="";$tp="../upload/".$row1[userid]."/".$row1[probh]."/tc".$row1[id].".png";}
   else{$tp="";$tit=$row1[tit];}
   $oncj="taocanonc(".$i.",".$alli.",".$row1[money1].",".$row1[money2].",".$row1[id].",".sprintf("%.1f",$row1[money1]/$row1[money2]*10).",".$k.",'".$tp."')";
   ?>
   <a href="javascript:void(0);" id="taocana<?=$i?>" style="background:url(<?=$bgtp?>) center center no-repeat;" title="<?=$row1[tit]?>" onClick="<?=$oncj?>"><?=$tit?></a>
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
   <li class="l1">选择</li>
   <li class="l2">
   <? 
   while2("*","yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){
   if(empty($row2[fhxs])){$k=$row[kcnum];}else{$k=$row2[kcnum];}
   $bgtp="../upload/".$row2[userid]."/".$row2[probh]."/tc".$row2[id]."-1.png";
   if(is_file($bgtp)){$tit="";$tp="../upload/".$row2[userid]."/".$row2[probh]."/tc".$row2[id].".png";}
   else{$tp="";$tit=$row2[tit2];}
   ?>
   <a href="javascript:void(0);" id="taocan2a<?=$row1[id]?>_<?=$i?>" title="<?=$row2[tit2]?>" style="background:url(<?=$bgtp?>) center center no-repeat;" onClick="taocan2onc(<?=$i?>,<?=$alli2?>,<?=$row2[money1]?>,<?=$row2[money2]?>,<?=$row2[id]?>,<?=sprintf("%.1f",$row2[money1]/$row2[money2]*10)?>,<?=$k?>,'<?=$tp?>')"><?=$tit?></a>
   <? $i++;}?>
   </li>
   </ul>
   <? }}?>
   
   <script language="javascript">pretc1id=<?=$ja?>;</script>
   <? }?>

  
 <!--套餐E-->
      <ul class="u6">
   <li class="l1">购买数量</li>
   <li class="l2"><a href="javascript:void(0);" onClick="shujian()" class="a2">-</a>
   <li class="l3"><input type="text" onChange="moneycha()" id="tkcnum" value="1" /></li>
   <li class="l2"><a href="javascript:void(0);" onClick="shujia()" class="a1">+</a>
   <li class="l4"><span id="nowkcnum">库存100件</span></li>
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
   <? if(!empty($row[ysweb])){?><a href="../tem/gotourl.php?u=<?=$row[ysweb]?>" target="_blank" class="ysweb">查看演示</a><? }?>
      </li>
   </ul>
 


   <ul class="u7">
   <li class="l1">支付方式</li>
   <li class="item"><span class="link"><img src="img/pay.jpg" width="20" height="20"> 支付宝支付</span></li>
   <li class="item"><span class="link"><img src="img/wx.png" width="20" height="20"> 微信支付</span></li>
   <li class="item"><span class="link"><img src="img/cai.png" width="20" height="20"> 财付通支付</span></li>
   </ul>
   <ul class="u3">
   <li class="l1">安全保障</li>
   <li class="l2">
   <a href="javascript:void(0);" onMouseOver="tscapover(1)" id="tscap1" class="a1">担保交易</a>
   <? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><a href="javascript:void(0);" onMouseOver="tscapover(2)" id="tscap2">自动发货</a><? }?>
   <? if(1==$row[ifuserdj]){?><a href="javascript:void(0);" onMouseOver="tscapover(3)" id="tscap3">VIP折扣</a><? }?>
   </li>
   </ul>
   <div class="tsmain" id="tsmain1">担保交易，安全保证，有问题不解决可申请退款。</div>
   <div class="tsmain" id="tsmain2" style="display:none;">自动发货商品，随时可以购买，零等待。</div>
   <div class="tsmain" id="tsmain3" style="display:none;">不同会员等级尊享不同的优惠</div>

  </div>
 <!--中间E-->
 
  <!--卖家B-->
  <? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
  <div class="jbuser">
  <ul class="u1">
  <li class="l1"><img src="../img/userbao.gif" width="200" height="72" /></li>
  </ul>
  <div class="d1">
  <h3><?=$rowsell[shopname]?></h3>
  <ul class="du0"><li class="l1">信誉：</li><li class="l2"><img title="信用值<?=$xy?>" src="../img/dj/<?=returnxytp($xy)?>" /></li></ul>
  <ul class="du1"><li class="l1">掌柜：</li><li class="l2"><?=$rowsell[nc]?></li></ul>
  <ul class="du1"><li class="l1">宝贝：</li><li class="l2"><?=returncount("yjcode_pro where userid=".$rowsell[id]." and zt=0")?>件</li></ul>
  <ul class="du1"><li class="l1">创店：</li><li class="l2"><?=dateYMD($rowsell[sj])?></li></ul>
  <ul class="du2"><li class="l1">联系：</li><li class="l2"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=returnqq($row[userid])?>&site=<?=weburl?>&menu=yes" target=_blank><img src="../img/qq.png" width="77" height="22" border="0" /></a></li></ul>
  <? if($rowsell[baomoney]>0){?>
  <div class="dub">已缴纳保证金<strong><?=sprintf("%.2f",$rowsell[baomoney])?></strong>元</div>
  <? }?>
  <ul class="du3">
  <li class="l1">描述<br><span class="g_ac99_h"><?=returnjgdian($rowsell[pf1])?></span></li>
  <li class="l1">发货<br><span class="g_ac99_h"><?=returnjgdian($rowsell[pf2])?></span></li>
  <li class="l0">售后<br><span class="g_ac99_h"><?=returnjgdian($rowsell[pf3])?></span></li>
  </ul>
  <ul class="du4">
  <li class="l1"><a href="<?=returnmyweb($rowsell[id],$rowsell[myweb])?>" class="g_ac99" target="_blank">进入店铺</a></li>
  <? 
  $a1="none";$a2="none";
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","yjcode_shopfav where shopid=".$rowsell[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
  <li class="l2" id="favsno" style="display:<?=$a1?>;"><a class="g_ac99" href="javascript:shopfavInto(<?=$rowsell[id]?>)">收藏店铺</a></li>
  <li class="l2" id="favsyes" style="display:<?=$a2?>;"><a class="g_ac99" href="../user/favshop.php">已收藏</a></li>
  </ul>
  </div>
  </div>
  <!--卖家E-->
 </div>
 </div>
</div>


<div class="yjcode">
 <!--左侧B-->
 <div class="left">
 <? adwhile("ADP01",0,200,200)?>
 <ul class="u1">
 <li class="l1">本店销售榜</li>
 <? while1("*","yjcode_pro where userid=".$row[userid]." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){$tp="../".returntp("bh='".$row1[bh]."' order by xh asc","-2");?>
 <li class="l2"><a href="view<?=$row1[id]?>.html"><img alt="<?=$row1[tit]?>" src="<?=returntppd($tp,"../img/none60x60.gif")?>" width="50" height="50" align="left"></a><a href="view<?=$row1[id]?>.html" title="<?=$row1[tit]?>"><?=returntitdian($row1[tit],37)?></a><br><strong class="feng">￥<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong></li>
 <? }?>
 </ul>
 <ul class="u1">
 <li class="l1">您的浏览记录</li>
 <? 
 $a=preg_split("/xcf/",$nch);
 for($i=0;$i<=count($a);$i++){
 if($a[$i]!=""){
  while1("*","yjcode_pro where id=".$a[$i]);if($row1=mysql_fetch_array($res1)){$tp="../".returntp("bh='".$row1[bh]."' order by xh asc","-2");
 ?>
 <li class="l2"><a href="view<?=$row1[id]?>.html"><img alt="<?=$row1[tit]?>" src="<?=returntppd($tp,"../img/none60x60.gif")?>" width="50" height="50" align="left"></a><a href="view<?=$row1[id]?>.html" title="<?=$row1[tit]?>"><?=returntitdian($row1[tit],37)?></a><br><strong class="feng">￥<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong></li>
 <?
  }
 }
 }
 ?>
 </ul>
 </div>
 <!--左侧E-->
 
 <!--右侧B-->
 <div class="right">
 <ul class="ucap">
 <li class="l1 g_bc0_h" id="bqcap1" onClick="bqonc(1)">商品详情</li>
 <li class="l0" id="bqcap2" onClick="bqonc(2)">累计评价<strong class="g_ac0_h"><? $allpj=returncount("yjcode_propj where probh='".$row[bh]."'");echo $allpj;?></strong></li>
 <li class="l0" id="bqcap3" onClick="bqonc(3)">交易规则</li>
 <li class="l2"></li>
 </ul> 


 <div class="viewtxt fontyh" id="bqdiv1">
 <!--正文介绍B-->
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
 <li class="l1"><?=$sx1arr[$i]?>：</li><li class="l2"><? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?></li>
 <? }?>
 </ul>
 <? $protxt=$row[txt];?>
 <? if(check_in("video",$row[txt])){?>
 <link href="../config/ueditor/third-party/video-js/video-js.min.css" rel="stylesheet" type="text/css" />
 <script language="javascript" src="../config/ueditor/third-party/video-js/video.dev.js"></script>
 <? }?>
 <?=$protxt?>
 <!--正文介绍E-->
 </div>



 <div id="bqdiv2">
 <a name="pj"></a>
 <ul class="pjcap">
 <li class="l1">商品评价</li>
 <li class="l2">描述相符<br><strong class="g_ac0_h"><?=$row[pf1]?></strong></li>
 <li class="l2">发货速度<br><strong class="g_ac0_h"><?=$row[pf2]?></strong></li>
 <li class="l2">服务态度<br><strong class="g_ac0_h"><?=$row[pf3]?></strong></li>
 <li class="l2">综合评分<br><strong class="g_ac0_h"><?=round(($row[pf1]+$row[pf2]+$row[pf3])/3,2)?></strong></li>
 <li class="l3"><a href="../user/order.php?ddzt=suc">写评价赚积分</a></li>
 </ul>
 <? 
 while1("*","yjcode_propj where probh='".$row[bh]."' order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 ?>
 <div class="pj">
  <div class="pjleft"><ul class="u1"><li class="l1"><img src="<?=$usertx?>" width="50" height="50" /></li><li class="l2"><?=returnnc($row1[userid])?></li></ul></div>
  <div class="pjright">
  <ul class="u1">
  <li class="l1">
  <img src="../img/x1.png" class="img1" width="76" height="15" />
  <? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);?>
  <div class="pf" style="width:<?=$pf/5*76?>px;"><img src="../img/x2.png" title="<?=$pf?>分" width="76" height="15" /></div>
  </li>
  <li class="l2"></li>
  </ul>
  <ul class="u2">
  <li class="l1">
  <?=$row1[txt]?><br>
  <? 
  if(1==$row1[iftp]){
  while2("*","yjcode_tp where bh='".$row1[orderbh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$row2[tp]);
  ?>
  <a href="../<?=$row2[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
  <? }}?>
  </li>
  <? if(!empty($row1[hf])){?><li class="l2">卖家回复：<?=$row1[hf]?></li><? }?>
  </ul>
  </div> 
 </div>
 <? }?>
 <div class="allpj">[<a href="pjlist_i<?=$row[id]?>v.html" target="_blank">查看全部评价</a>]</div>
 </div>
 
 <div id="bqdiv3">
  <ul class="bqcap">
  <li class="l1">交易规则</li>
  </ul>
  <div class="viewtxt fontyh"><? while1("*","yjcode_onecontrol where tyid=9");if($row1=mysql_fetch_array($res1)){echo $row1[txt];}?></div>
 </div>
 
 </div>
 <!--右侧E-->

</div>
 
 
 
 
 
 

<? include("../tem/bottom.html");?>
 


<script language="javascript">
$(".prolist .u1 .l1").mouseenter(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '6px'}, 200);
});
$(".prolist .u1 .l1").mouseleave(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '-50px'}, 200);
});
</script><div style="display:none;">
<div id="simTestContent">
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
    if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
	if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
	$sxall=$sxall.$row1[name1].":".$v."xcf";
	}
	}
   }
   for($i=0;$i<count($sx1arr);$i++){
   ?>
      <li class="l1"><?=$sx1arr[$i]?>：</li><li class="l2"><? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?> </li>
<? }?>
 <ul class="ins_notes">
<li> <h3>新站网声明：</h3>
</li>
<li><b>1.</b> 购买商品务必在平台进行交易；</li>
<li><b>2.</b> 如要求线下交易可联系官方客服举报，本站不对任何线下进行担保；</li>
<li><b>3.</b> 如需安装服务可咨询商家在服务大厅独立设立安装服务；</li>
<li><b>4.</b> 关闭本栏请刷新页面即可。</li>
<div id="warp">
<script type="text/javascript" src="static/js/tipswindown.js"></script>
<script type="text/javascript">
function showTipsWindown(title,id,width,height){
	tipsWindown(title,"id:"+id,width,height,"true","","true",id);
}
function confirmTerm(s) {
	parent.closeWindown();
	if(s == 1) {
		parent.document.getElementById("isread").checked = true;
	}
}
//弹出层调用
function popTips(){
	showTipsWindown("安装服务详情", 'simTestContent', 620, 250);
	$("#isread").attr("checked", false);
}
$(document).ready(function(){
	
	$("#isread").click(popTips);
	$("#isread-text").click(popTips);
	$("#isread22").click(popTips);
	
});
</script>
</body>
</html>