<?
include("../config/conn.php");
include("../config/function.php");
$getstr=$_GET[str];
$id=returnsx("i");
while0("*","yjcode_news where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader(weburl."404.html");exit;}
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
?>
<html>
<head>
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="indexqh.js"></script>


<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$seokey?>">
<meta name="description" content="<?=$seodes?>">
<title>新闻资讯 - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="static/js/jquery.min.js"></script>
<script language="javascript" src="static/js/basic.js"></script>
<script language="javascript" src="static/js/index.js"></script>
<script language="javascript" src="static/js/layer.js"></script>
<link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="static/css/me.css" rel="stylesheet" type="text/css" />
<script src="static/js/jquery.js"></script>
<script src="static/js/all.js"></script>
 <script language="javascript" src="static/js/market.js"></script>
</head>
<body><?php include_once("baidu_js_push.php") ?>
<? include("../tem/openwv.php");?>
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
			

<div class="yjcode">
 <div class="dqwz">
 <ul class="u1">
 <li class="l1">当前位置：<a href="<?=weburl?>">首页</a> > <a href="./">资讯评论</a></li>
 </ul>
 </div>



<div class="newsmain">
 <!--左B-->
 <div class="left">
 <h1 class="titcap fontyh"><a href="txtlist_i<?=$id?>v.html"><?=$row[tit]?></a></h1>
 
 <!--评论B-->
 <? $ses="yjcode_newspj where newsbh='".$row[bh]."'";?>
 <div class="pinlun fontyh">
  <ul class="plu1">
  <li class="l1"><strong>全部评论</strong>(<?=returncount($ses." and zt=0")?>)</li><li class="l2"></li>
  </ul>
  <ul class="plu0">
  <li class="l1"><textarea id="pjt"></textarea></li>
  <li class="l3"></li>
  <li class="l2"><a href="javascript:void(0);" onClick="newspj('<?=$row[bh]?>')">发表评论</a></li>
  </ul>
  
  <? 
  if(!empty($_SESSION[SHOPUSER])){
  $userid=returnuserid($_SESSION[SHOPUSER]);
  while1("*",$ses." and zt=1 and userid=".$userid." order by sj desc");while($row1=mysql_fetch_array($res1)){
  $usertx="../upload/".$row1[userid]."/user.jpg";
  if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}
  ?>
  <div class="pld">
  <div class="pld1"><img src="<?=$usertx?>" width="50" height="50" /></div>
  <ul class="plu2">
  <li class="l1"><?=returnnc($row1[userid])?> <span class="red">(正在审核)</span></li>
  <li class="l2"><?=$row1[txt]?></li>
  <li class="l3"><?=$row1[sj]?></li>
  </ul>
  </div>
  <? }}?>
  
  <? 
  pagef(" where newsbh='".$row[bh]."' and zt=0",20,"yjcode_newspj","order by sj desc");while($row=mysql_fetch_array($res)){
  $usertx="../upload/".$row[userid]."/user.jpg";
  if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}
  ?>
  <div class="pld">
  <div class="pld1"><img src="<?=$usertx?>" width="50" height="50" /></div>
  <ul class="plu2">
  <li class="l1"><?=returnnc($row[userid])?></li>
  <li class="l2"><?=$row[txt]?></li>
  <li class="l3"><?=$row[sj]?></li>
  </ul>
  </div>
  <? }?>
  
  <div class="npa">
  <?
  $nowurl="pjlist";
  $nowwd="";
  require("../tem/page.html");
  ?>
  </div>
  
 </div>
 <!--评论E-->
 
 </div>
 <!--左E-->
 
 <!--右B-->
 <div class="right">
 <div class="adf"><? adwhile("ADNV01");?></div>
 <? include("right.php");?>
 </div>
 <!--右E-->

</div>

</div>

<? include("../tem/bottom.html");?>
</body>
</html>