<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}

if(sqlzhuru($_POST[jvs])=="shop"){
 zwzr();
 $c1=sqlzhuru1($_POST[C1]);if(empty($c1)){$c1=1;}else{$c1=0;}
 $c2=sqlzhuru1($_POST[C2]);if(empty($c2)){$c2=1;}else{$c2=0;}
 updatetable("yjcode_user","ordertx1=".$c1.",ordertx2=".$c2." where id=".$rowuser[id]);
 php_toheader("shop1.php?t=suc"); 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
tjwait();
f1.action="shop1.php";
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��������</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap4.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>
 <? systs("��ϲ���������ɹ�!","shop1.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="shop" name="jvs" />
 <ul class="uk">
 <li class="l1">����֪ͨ��</li>
 <li class="l2">
 <label><input name="C1" type="checkbox" value="1"<? if(empty($rowuser[ordertx1])){?> checked="checked"<? }?> /> ����֪ͨ</label>&nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="C2" type="checkbox" value="1"<? if(empty($rowuser[ordertx2])){?> checked="checked"<? }?> /> �ʼ�֪ͨ</label>
 </li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("�ύ")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>