<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);

if($_GET[control]=="ok"){ //完成
 $bh=$_GET[bh];
 while0("*","yjcode_taskhf where bh='".$bh."' and taskty=1 and id=".$_GET[id]." and useridhf=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("taskhflist1.php");}
 $sj=date("Y-m-d H:i:s");
 $txt="已经完成任务，发起验收申请";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$row[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 updatetable("yjcode_taskhf","zt=1 where id=".$_GET[id]." and zt=0 and useridhf=".$userid);
 php_toheader("taskhflist1.php");
 
}elseif($_GET[control]=="pt"){ //申请平台介入
 while0("*","yjcode_taskhf where id=".$_GET[id]." and taskty=1 and zt=3 and useridhf=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("taskhflist1.php");}
 updatetable("yjcode_taskhf","zt=4 where id=".$row[id]);
 $sj=date("Y-m-d H:i:s");
 $txt="对卖家验收不通过的做法不赞同，要求平台介入";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$row[bh]."',".$row[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 php_toheader("taskhflist1.php");

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function myok(x,y){
if(!confirm("您确定已经完成该任务了吗？")){return false;}
location.href="taskhflist1.php?control=ok&id="+x+"&bh="+y;
}
function ptjr(x){
if(!confirm("确定要申请平台介入吗？")){return false;}
location.href="taskhflist1.php?control=pt&id="+x;
}
</script>
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


<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 任务大厅 > 我是接手方 > 多人任务</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="taskhfcap">
 <li class="l1">任务</li>
 <li class="l2">雇主预算</li>
 <li class="l3">单份佣金</li>
 <li class="l4">状态</li>
 <li class="l5">操作</li>
 </ul>
  
 <?
 $ses=" where taskty=1 and useridhf=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);
 $au="../task/view".$row1[id].".html";
 ?>
 <ul class="taskhflist">
 <li class="l0"></li>
 <li class="l1"><a href="<?=$au?>" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312(strip_tags($row1[tit]),0,100)?></a><span class="sj"><?=$row[sj]?></span></li>
 <li class="l2"><strong><?=$row1[money1]?></strong>元</li>
 <li class="l3"><strong><?=$row[money1]?></strong>元</li>
 <li class="l4">
 <span class="zt"><?=returntask1($row[zt])?></span>
 </li>
 <li class="l5">
 <? if(0==$row[zt]){?>
 <a href="taskysjs1.php?bh=<?=$row[bh]?>&hfid=<?=$row[id]?>" class="btna btna1">请验收</a>
 <? }elseif(3==$row[zt]){?>
 <a href="javascript:void(0);" onclick="ptjr(<?=$row[id]?>)" class="btna btna1">申请平台介入</a>
 <? }?>
 <a href="taskgt1.php?bh=<?=$row[bh]?>&hfid=<?=$row[id]?>" class="btna btna3">沟通记录</a>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="taskhflist1.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>