<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}


if(sqlzhuru($_POST[jvs])=="yc" && empty($row[ycshsj]) && $row[ddzt]=="db"){
 zwzr();
 while1("*","yjcode_db where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 $sj=date('Y-m-d H:i:s');
 $sjv=$row1[dboksj];
 $oksj=date('Y-m-d H:i:s',strtotime ("+".$rowcontrol[ycsj]." day",strtotime($sjv)));
 updatetable("yjcode_db","dboksj='".$oksj."' where id=".$row1[id]);
 updatetable("yjcode_order","ycshsj='".$sj."' where id=".$row[id]);
 php_toheader("orderview.php?orderbh=".$orderbh); 

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
<link href="css/order.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ӳ�����ʱ��</li>
</ul>
<? $leftid=2;include("left.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h">��������</li>
 <li class="l1"><a href="order.php">�ҵĶ���</a></li>
 </ul>
 <? include("orderv.php");?>
 
 <? if(empty($row[ycshsj])){?>
 <script language="javascript">
 function tj(){
 layer.msg('���ڲ��������Ժ�', {icon: 16  ,time: 0,shade :0.25});
 f1.action="orderyc.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1"><strong>�ӳ�����ʱ��</strong></li>
 <li class="l2">�������ӳ�<strong class="red"><?=$rowcontrol[ycsj]?></strong>���ʽ𵣱�ʱ�䣬��ֻ���ӳ�һ�Σ���ȷ����Ҫ�ӳ����������°�ť����</li>
 <li class="l4"><?=tjbtnr("�ӳ�ʱ��")?></li>
 </ul>
 <input type="hidden" value="yc" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }else{?>
 <ul class="ordercz">
 <li class="l1"><strong>�ӳ�����ʱ��</strong></li>
 <li class="l2">���� <?=$row[ycshsj]?> �Ѿ����й��ӳ�����ʱ������������ٽ��иò�����</li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>