<?
include("../config/conn.php");
include("../config/function.php");
$getstr=$_GET[str];
$ses=" where id>0 and zt<>99";
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
if(returnsx("j")!=-1){$ses=$ses." and ty1id=".returnsx("j");}
if(returnsx("k")!=-1){$ses=$ses." and ty2id=".returnsx("k");}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>帮助中心 - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />

<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
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

<? include("left.php");?>

<!--列表开始-->
<div class="helpright">

 
 <ul class="helplist">
 <?
 pagef($ses,20,"yjcode_help","order by sj desc");
 $i=1;
 while($row=mysql_fetch_array($res)){
 ?>
 <li class="l1"><a href="<?=weburl?>help/view<?=$row[id]?>.html" class="g_ac0"><?=$row[tit]?></a></li>
 <li class="l2"><?=dateYMD($row[sj])?></li>
 <? if($i % 5==0){?><li class="l3"></li><? }?>
 <? $i++;}?>
 </ul>
 <div class="npa">
 <?
 $nowurl="search";
 $nowwd="";
 require("../tem/page.html");
 ?>
 </div>
</div>
<!--列表结束-->

</div>
<? include("../tem/bottom.html");?>
</body>
</html>