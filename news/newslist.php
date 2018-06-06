<?
include("../config/conn.php");
include("../config/function.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
$tit="";
$ses=" where zt=0";
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
if(returnsx("j")!=-1){$ses=$ses." and type1id=".returnsx("j")."";$ty1name=returnnewstype(1,returnsx('j'));$tit=$ty1name;}
if(returnsx("k")!=-1){$ses=$ses." and type2id=".returnsx("k")."";$ty2name=returnnewstype(2,returnsx('k'));$tit=$tit." ".$ty2name;}
if(returnsx("s")!=-1){$skey=safeEncoding(returnsx("s"));$ses=$ses." and tit like '%".$skey."%'";$tit=$tit.$sk;}
if(empty($tit)){$tit="信息列表";}
?>
<html>
<head>

<title><?=$tit?> - <?=webname?></title>

<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="indexqh.js"></script>


<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$seokey?>">
<meta name="description" content="<?=$seodes?>">

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
			
<script language="javascript">topjconc(3,'资讯');document.getElementById("topt").value="<?=$skey?>";</script>

<div class="yjcode">
 <div class="dqwz">
 <ul class="u1">
 <li class="l1">
 当前位置：<a href="<?=weburl?>">首页</a> > <a href="./">资讯</a>
 <? if(returnsx("j")!=-1){?> > <a href="newslist_j<?=returnsx("j")?>v.html"><?=returnnewstype(1,returnsx("j"))?></a><? }?>
 <? if(returnsx("k")!=-1){?> > <a href="newslist_j<?=returnsx("j")?>v_k<?=returnsx("k")?>v.html"><?=returnnewstype(2,returnsx("k"))?></a><? }?>
 </li>
 </ul>
 </div>


<div class="newslist">
<!--左B-->
 <div class="left">
 <ul class="list">
 <? 
 $i=1;pagef($ses,30,"yjcode_news","order by lastsj desc");while($row=mysql_fetch_array($res)){
 $tit=returntitdian($row[tit],64);
 if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
 ?>
 <li class="l1">
 <? if(returnsx('k')!=-1){?>[<?=$ty2name?>] <? }else{?><span class="hui">·</span> <? }?>
 <a href="txtlist_i<?=$row[id]?>v.html" target="_blank"><?=$tit?></a>
 </li>
 <li class="l2"><?=dateYMD($row[sj])?></li>
 <? if($i % 5==0){?><li class="l3"></li><? }?>
 <? $i++;}?>
 </ul>
 <div class="npa">
 <?
 $nowurl="newslist";
 $nowwd="";
 require("../tem/page.html");
 ?>
 </div>
 </div>
<!--左E-->

<!--右B-->
<div class="right">
 <? if(returnsx("j")!=-1){?>
 <div class="nty">
 <? while1("*","yjcode_newstype where admin=2 and name1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="newslist_j<?=returnsx("j")?>v_k<?=$row1[id]?>v.html"<? if(returnsx("k")==$row1[id]){?> class="a1"<? }?>><?=$row1[name2]?></a>
 <? }?>
 </div>
 <? }?>
 <? adwhile("ADNV04");?>
 <? include("right.php");?>
</div>
<!--右E-->
</div>
<!--
	* 我图风格升级 001版本；
	* ? 2017 星期派工作室出品；
	* www.xingqipai.com；
	* 请尊重原创，保留头部版权；
	* 在保留版权的前提下，默认允许仿站，但不提倡。不可将本模板应用于商业用途。
-->


</div>

<? include("../tem/bottom.html");?>
</body>
</html>