<?
include("../config/conn.php");
include("../config/function.php");
while0("*","yjcode_gg where id=".$_GET[id]);if(!$row=mysql_fetch_array($res)){php_toheader("gglist.html");}
checkdjl("c2",$row[id],"yjcode_gg");

while1("*","yjcode_gg where sj>='".$row[sj]."' and id<>".$row[id]." and zt<>99 order by sj asc");
if($row1=mysql_fetch_array($res1)){$pre="<a href='ggview".$row1[id].".html'>".$row1[tit]."</a>";}else{$pre="���ǵ�һƪ����";}

while1("*","yjcode_gg where sj<='".$row[sj]."' and id<>".$row[id]." and zt<>99 order by sj desc");
if($row1=mysql_fetch_array($res1)){$nex="<a href='ggview".$row1[id].".html'>".$row1[tit]."</a>";}else{$nex="�������һƪ����";}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$row[wkey]?>">
<meta name="description" content="<?=$row[wdes]?>">
<title><?=$row[tit]?> - <?=webname?></title>
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
<!--��ʼ-->
<div class="helpright">


 <h1 class="titcap fontyh"><a name="tit"><?=$row[tit]?></a></h1>
 <ul class="u1">
 <li class="l1">����ʱ�䣺<?=dateYMDHM($row[sj])?> �Ķ�������<?=$row[djl]?></li>
 <li class="l2" onMouseOver="objdis(1,'newm')" onMouseOut="objdis(0,'newm')">ɨһɨ���ֻ�����</li>
 </ul>
 <div id="newm" style="display:none;"><? $uw=weburl."help/ggview".$row[id].".html"; ?><img src="<?=weburl?>tem/getqr.php?u=<?=$uw?>&size=4" /></div>
 <div class="ntxt"><?=$row[txt]?></div>
 <div class="nxg">
 ��һƪ��<?=$pre?><br>
 ��һƪ��<?=$nex?>
 </div>

</div>
<!--����-->

</div>
<? include("../tem/bottom.html");?>
</body>
</html>