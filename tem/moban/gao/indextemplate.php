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
 <? autoAD("gao_qh");$i=0;while1("*","yjcode_ad where adbh='gao_qh' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
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


<div class="bfb bfbtoj">
<div class="yjcode">

 <div class="d1">
  会员：<strong><?=$inittjarr[0]+returncount("yjcode_user")?></strong> 位&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 商品：<strong><?=$inittjarr[1]+returncount("yjcode_pro where zt=0 and ifxj=0")?></strong> 个&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 成交：<strong><?=sprintf("%.0f",$inittjarr[3]+returnsum("money1*num","yjcode_order where ddzt<>'backsuc' and ddzt<>'close'"))?></strong> 元
 </div>
 
 <div class="d2"><img <? adwhile("gao_06");?></a></div>
 
</div>
</div>

<div class="yjcode">
  <div class="ad1"><? adwhile("gao_01",2)?></a></div> 

 <!--推荐产品B-->
 <div class="tjpro">
 <ul class="u0"><li class="l1"><span class="s0"><img src="<?=weburl?>homeimg/tj.png"></span><span class="s1">限时优惠促销</span></li><li class="l2"><a href="product/search_j<?=$row1[id]?>v.html">查看更多</a></li></ul>
 <? 
 $i=1;
 while1("*","yjcode_pro where zt=0 and ifxj=0 and iftuan=1 and yhxs=2 and yhsj2>'".$sj."' order by yhsj2 asc limit 4");while($row1=mysql_fetch_array($res1)){
 $money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
 $au="product/view".$row1[id].".html";
 $dqsj=str_replace("-","/",$row1[yhsj2]);
 while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
 ?>
 <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
 <ul class="u1 u1<?=$i?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img class="tp" border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-1"),"img/none200x200.gif")?>" width="198" height="198" /></a>
 <div class="d1"><a target="_blank" href="<?=$au?>" target="_blank"><span class="list-name" id="djs<?=$i?>"></span></span><em class="look-but">点击查看 &gt;</em></a></div>
 <li class="l2">
 <span class="s1">￥<?=sprintf("%.2f",$money1)?></span>  <a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,47)?></a></li>
 </ul>
 <? $i++;}?>
 </div>
 <script language="javascript">
 userChecksj();
 </script>
 
 
 
  <!--产品列表B-->
 <?
 autoAD("shang_02");
 $sqlad="select * from yjcode_ad where adbh='shang_02' and zt=0 order by xh asc";mysql_query("SET NAMES 'GBK'");$resad=mysql_query($sqlad);
 $ni=1;
 while1("*","yjcode_type where admin=1 and (iftj is null or iftj=0) order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
  <div class="prolist">
      <ul class="u0"><li class="l1"><span class="s0"><img src="../upload/type/type1_<?=$row1[id]?>.png" width="25" height="25"></span><span class="s1"><?=$row1[type1]?></span><span class="s2"><?=$row1[seodes]?></span></li><li class="l2"><a href="product/search_j<?=$row1[id]?>v.html">查看更多 &gt;</a></li></ul>
    <ul class="u1"> 
   <?
   while0("*","yjcode_pro where ifxj=0 and zt=0 and iftj>0 and ty1id=".$row1[id]." order by iftj asc limit 8");while($row=mysql_fetch_array($res)){
   $au="product/view".$row[id].".html";
   $money1=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);
   ?>
  <li class="l1"> 
  <a target="_blank" href="<?=$au?>" class="a1"><img src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none180x180.gif")?>" width="252" height="252"></a>
  <a target="_blank" href="<?=$au?>" class="a2"><?=strgb2312($row[tit],0,37)?></a>

  <div class="d1">
  <a class="s1" href="<?=$au?>" class="a1">￥<?=$money1?></a>
  <a target="_blank" href="<?=$au?>" class="a3">购买</a>
 
 </li>
    <? }?>
 </div>
 <? $ni++;}?>
 
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
<!--**********右侧浮动结束***************-->
<script language="javascript">
$(".prolist .u1 .l1").mouseenter(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '6px'}, 200);
});
$(".prolist .u1 .l1").mouseleave(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '-50px'}, 200);
});
</script>
</body>
</html>