<?
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
$uid=$_GET[id];
$sqluser="select * from yjcode_user where shopzt=4 and id=".$uid;mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>���̵������� - <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="glotop1 box">
 <div class="d1" onClick="gourl('../')"><img src="../img/leftjian.png" height="21" /></div>
 <div class="d2">���̵�������</div>
 <div class="d3" onClick="gourl('../user/')"><img src="../img/home.png" /></div>
</div>

<div class="shopdq box">
<div class="d1">
 <ul class="u1">
 <li class="l1">��ܰ��ʾ�������ʵĵ����Ѿ����ڡ�</li>
 <li class="l2">������ǵ������ˣ��뼰ʱ���ڡ�<br>1��������Զ˻�Ա����<br>2������ҵ����Ѱ�ť<br>3����������</li>
 </ul>
</div>
</div>
 
<? include("../tem/bottom.php");?>
</body>
</html>