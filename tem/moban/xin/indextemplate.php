<?
include("config/conn.php");
include("config/function.php");
include("config/xy.php");
$sj=date("Y-m-d H:i:s");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$rowcontrol[webkey]?>">
<meta name="description" content="<?=$rowcontrol[webdes]?>">
<title><?=$rowcontrol[webtit]?> - <?=webname?></title>
<link rel="shortcut icon" href="img/favicon.ico" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="homeimg/jquery.flexslider.css" rel="stylesheet" type="text/css" >
<script language="javascript" src="js/basic.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/index.js"></script>
<script type="text/javascript" src="homeimg/jquery.flexslider-min.js"></script>
<script language="javascript" type="text/javascript" src="homeimg/ss.js"></script>

<? if(empty($rowcontrol[ifwap])){?>
<script language="javascript">
if(is_mobile()) {document.location.href= '<?=weburl?>m/';}
</script>
<? }?>
</head>
<body>
<? 
autoAD("ADI00");
while1("*","yjcode_ad where adbh='ADI00' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
$tp="gg/".$row1[bh].".".$row1[jpggif];
$image_size= getimagesize($tp);
?>
<div class="topbanner_hj" style="background:url(<?=$tp?>) no-repeat center 0;height:<?=$image_size[1]?>px;"><a href="<?=$row1[aurl]?>" target="_blank"></a></div>
<? }?>

<? include("tem/top.html");?>
<? include("tem/top1.html");?>
<span id="leftnone" style="display:none">0</span>
<script language="javascript">
leftmenuover();
yhifdis(0);
document.getElementById("topmenu1").className="a1";
</script>

 <!--切换B-->
 <div class="banner" id="banner" >
 <? autoAD("xin_qh");$i=0;while1("*","yjcode_ad where adbh='xin_qh' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=$row1[aurl]?>" class="d1" target="_blank" style="background:url(gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>) center no-repeat;"></a>
 <? $i++;}?>
 <div class="d2" id="banner_id">
 <ul style="margin-left:-<?=86*$i/2?>px;">
 <? for($j=0;$j<$i;$j++){?><li></li><? }?>
 </ul>
 </div>
 </div>
 <script type="text/javascript">banner();</script>
 <!--切换E-->

<div class="yjcode fontyh">
 <div class="ksdl">
 <div id="idlno">
 <ul class="u1">
 <li class="l1"><img src="homeimg/dl.png" width="70" height="70"></li>
 <li class="l2">您还未登录<br><a href="reg/" class="a1">点击登录</a>，更多精彩<br><a href="reg/reg.php">去注册？</a></li>
 </ul>
 </div>
 <div id="idlyes" style="display:none;">
 <ul class="u1">
 <li class="l1"></li>
 <li class="l2">
 用 户 名：<span id="idl1" class="blue"></span><br>
 帐户总额：<span id="idl2" class="feng"></span>元<br>
 [<a href="/user/">会员中心</a> | <a href="/user/un.php">退出登录</a>]
 </li>
 </ul>
 </div>
 <script language="javascript">idldl(1);</script>
 <ul class="u2">
 <li class="l1 l11" id="iksa1" onmouseover="iksaover(1)"><span>公告</span></li>
 <li class="l1" id="iksa2" onmouseover="iksaover(2)"><span>最新入驻</span></li>
 <li class="l1" id="iksa3" onmouseover="iksaover(3)"><span>统计</span></li>
 </ul>
 <div class="ksm" id="ksm1">
 	<? while0("*","yjcode_gg where zt=0 order by sj desc limit 6");while($row=mysql_fetch_array($res)){?>
     [<?=dateMD($row[sj])?>] <a href="help/ggview<?=$row[id]?>.html" title="<?=$row[tit]?>" target="_blank"><?=returntitdian($row[tit],22)?></a><br>
	<? }?>
  </div>
 <div class="ksm" id="ksm2" style="display:none;">
   <? $i=1;while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' order by sj desc limit 5");while($row1=mysql_fetch_array($res1)){$i++;?>
      <li>
         <a href="shop/view<?=$row1[id]?>.html" target="_blank"><?=$row1[shopname]?></a>  入驻成功 
            <!--<a href="product/view<?=$row[id]?>.html" target="_blank"><?=returntitdian($row1[tit],40)?></a>--></p>
           </li>
		<? }?>
  </div>
 <div class="ksm" id="ksm3" style="display:none;">
 会员：<strong><?=$inittjarr[0]+returncount("yjcode_user")?></strong> 位<br>
 商品：<strong><?=$inittjarr[1]+returncount("yjcode_pro where zt=0 and ifxj=0")?></strong> 个<br>
 商家：<strong><?=returncount("yjcode_user where shopzt=2")?></strong> 家<br>
 需求：<strong><?=returncount("yjcode_task where zt=0")?></strong> 条<br>
 成交：<strong><?=sprintf("%.0f",$inittjarr[3]+returnsum("money1*num","yjcode_order where ddzt<>'backsuc' and ddzt<>'close'"))?></strong> 元<br>
 </div>
 <div class="d2"><a href="help/" target="_blank" class="a1">新手指导</a><a href="user/" target="_blank" class="a2">个人中心</a></div>
 </div>
</div>

<div class="bfb"></div>

<div class="yjcode">
 

 <!--推荐产品B-->
 <ul class="procap fontyh">
 <li class="l1">限时优惠促销</li>
 <li class="l2"><a href="product/" target="_blank">查看更多>></a></li>
 </ul>
 <div class="dtj fontyh">
 <? 
 $i=1;
 while1("*","yjcode_pro where zt=0 and ifxj=0 and iftuan=1 and yhxs=2 and yhsj2>'".$sj."' order by yhsj2 asc limit 5");while($row1=mysql_fetch_array($res1)){
 $money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
 $au="product/view".$row1[id].".html";
 $dqsj=str_replace("-","/",$row1[yhsj2]);
 while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
 ?>
 <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
 <ul class="u1 u1<?=$i?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-1"),"img/none180x180.gif")?>" /></a><span class="djs" id="djs<?=$i?>">正在加载</span></li>
 <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,47)?></a></li>
 <li class="l3">￥<?=sprintf("%.2f",$money1)?></li>
 <li class="l4"><a href="shop/view<?=$row2[id]?>.html" target="_blank"><?=strgb2312($row2[shopname],0,17)?></a></li>
 </ul>
 <? $i++;}?>
 </div>
 <script language="javascript">
 userChecksj();
 </script>
 <!--推荐产品E-->
 
 <!--热门商品B-->
 <ul class="procap fontyh">
 <li class="l1">热门商品</li>
 <li class="l2"><a href="product/" target="_blank">查看更多>></a></li>
 </ul>
 <div class="dtj fontyh">
 <? 
 $i=1;
 while0("*","yjcode_pro where zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 5");while($row=mysql_fetch_array($res)){
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 $au="product/view".$row[id].".html";
 while3("*","yjcode_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
 ?>
 <ul class="u1 u1<?=$i?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-1"),"img/none180x180.gif")?>" /></a></li>
 <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,47)?></a></li>
 <li class="l3">￥<?=sprintf("%.2f",$money1)?></li>
 <li class="l4"><a href="shop/view<?=$row3[id]?>.html" target="_blank"><?=strgb2312($row3[shopname],0,17)?></a></li>
 </ul>
 <? $i++;}?>
 </div>
 <!--热门商品E-->
 
 <div class="rmgg">
 <? adwhile("xin_03");?>
 </div>
 
</div>

 <!--产品列表B-->
 <?
 autoAD("xin_01");
 autoAD("xin_02");
 $sqlad="select * from yjcode_ad where adbh='xin_01' and zt=0 order by xh asc";mysql_query("SET NAMES 'GBK'");$resad=mysql_query($sqlad);
 $sqlad1="select * from yjcode_ad where adbh='xin_02' and zt=0 order by xh asc";mysql_query("SET NAMES 'GBK'");$resad1=mysql_query($sqlad1);
 $ni=1;
 while1("*","yjcode_type where admin=1 and (iftj is null or iftj=0) order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <div class="bfb fontyh<? if($ni % 2==0){?> bfbtype1<? }else{?> bfbtype2<? }?>">
 <div class="yjcode">
 
  <ul class="typecap">
  <li class="l1"><?=$row1[type1]?></li>
  <li class="l2">
  <a href="" class="a1" onMouseOver="typeaover(<?=$ni?>,0)" id="typea<?=$ni?>_0">推荐</a>
  <? $j=1;while2("*","yjcode_type where admin=2 and type1='".$row1[type1]."' order by xh asc limit 8");while($row2=mysql_fetch_array($res2)){?>
  <a href="" id="typea<?=$ni?>_<?=$j?>" onMouseOver="typeaover(<?=$ni?>,<?=$j?>)"><?=$row2[type2]?></a>
  <? $j++;}?>
  <span id="typea<?=$ni?>" style="display:none;"><?=$j?></span>
  </li>
  </ul>
  
  <div class="leftgg"><? if($rowad=mysql_fetch_array($resad)){adreadID($rowad[id],220,420);}?><div class="gg1"><? if($rowad1=mysql_fetch_array($resad1)){adreadID($rowad1[id],220,160);}?></div></div>
  
  <div class="pdright fontyh" id="dright<?=$ni?>_0">
  <? 
  while0("*","yjcode_pro where zt=0 and ifxj=0 and ty1id=".$row1[id]." and iftj>0 order by iftj asc limit 6");while($row=mysql_fetch_array($res)){
  $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
  $au="product/view".$row[id].".html";
  while3("*","yjcode_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
  ?>
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-1"),"img/none180x180.gif")?>" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,47)?></a></li>
  <li class="l3">￥<?=sprintf("%.2f",$money1)?></li>
  <li class="l4"><a href="shop/view<?=$row3[id]?>.html" target="_blank"><?=strgb2312($row3[shopname],0,17)?></a></li>
  </ul>
  <? }?>
  </div>

  <? $j=1;while2("*","yjcode_type where admin=2 and type1='".$row1[type1]."' order by xh asc limit 8");while($row2=mysql_fetch_array($res2)){?>
  <div class="pdright fontyh" id="dright<?=$ni?>_<?=$j?>" style="display:none;">
  <? 
  while0("*","yjcode_pro where zt=0 and ifxj=0 and ty1id=".$row1[id]." and ty2id=".$row2[id]." order by lastsj desc limit 6");while($row=mysql_fetch_array($res)){
  $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
  $au="product/view".$row[id].".html";
  while3("*","yjcode_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
  ?>
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-1"),"img/none180x180.gif")?>" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank"><?=strgb2312($row[tit],0,47)?></a></li>
  <li class="l3">￥<?=sprintf("%.2f",$money1)?></li>
  <li class="l4"><a href="shop/view<?=$row3[id]?>.html" target="_blank"><?=$row3[shopname]?></a></li>
  </ul>
  <? }?>
  </div>
  <? $j++;}?>
  
  <div class="rxph">
  <ul class="u1"><li class="l1">热销排行榜</li><li class="l2"></li></ul>
  <? 
  while0("*","yjcode_pro where zt=0 and ifxj=0 and ty1id=".$row1[id]." order by xsnum desc limit 10");for($i=1;$i<=3;$i++){if($row=mysql_fetch_array($res)){
  $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
  $au="product/view".$row[id].".html";
  ?>
  <ul class="u2 u2<?=$i?>">
  <li class="l1"><a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=strgb2312($row[tit],0,22)?></a></li>
  <li class="l2">
  <a href="<?=$au?>" target="_blank"><img align="left" border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none180x180.gif")?>" /></a>
  已售<?=$row[xsnum]?>份<br>
  <strong>￥<?=$money1?></strong>
  </li>
  </ul>
  <? }}?>
  <?
  while($row=mysql_fetch_array($res)){
  $au="product/view".$row[id].".html";
  ?>
  <ul class="u3">
  <li class="l1"><img src="homeimg/ph<?=$i?>.gif" /></li>
  <li class="l2"><a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=returntitdian($row[tit],24)?></a></li>
  </ul>
  <? $i++;}?>
  </div>
 
 </div>
 </div>
 <? $ni++;}?>
 <!--产品列表E-->

<div class="yjcode">

<!--合作伙伴B-->
<div class="indexcap fontyh">合作伙伴</div>

<div class="mr_frbox">
  <img class="mr_frBtnL prev" src="homeimg/mfrL.jpg" width="28" height="46" />
  <div class="mr_frUl">
  <ul>
   
	 <? autoAD("ADI13");while0("*","yjcode_ad where adbh='ADI13' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
 
	<li><a href="<?=$row[aurl]?>" target="_blank"> <img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" width="140" height="49"></a></li>
 <? }?>
    </ul>
  </div>
  <img class="mr_frBtnR next" src="homeimg/mfrR.jpg" width="28" height="46" />
</div>
<script language="javascript">
$(".mr_frUl ul li img").hover(function(){$(this).css("border-color","#A0C0EB");},function(){$(this).css("border-color","#d8d8d8")});
jQuery(".mr_frbox").slide({titCell:"",mainCell:".mr_frUl ul",autoPage:true,effect:"leftLoop",autoPlay:true,vis:7});
</script>
<!--合作伙伴E-->

</div>

 <!--友情E-->
</div>
</div>

</div>
<? include("tem/bottom.html");?>
<script language="javascript">
$(function(){
 $('.flexslider').flexslider({
 controlNav: false
 });
 $('.flexslider2').cxScroll({
 direction: "top",
 step:5 
 });
});
</script>

</body>
</html>