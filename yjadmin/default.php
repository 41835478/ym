<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ht1=preg_split("/\//",$_SERVER['PHP_SELF']);
if($_GET[control]=="ret"){deletetable("yjcode_update");php_toheader("default.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link rel="stylesheet" href="layui/css/layui.css">
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="js/gx.js"></script>
<script language="javascript">
function retgx(){
if(confirm("����������ʧ�ܵ�����²��ύ����������ȷ����")){location.href="default.php?control=ret";}else{return false;}	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">

<div class="bqu1">
<a class="a1" href="default.php">ȫ�ֹ���</a>
</div>
  
<!--B-->
<div class="rkuang">

<!--��ʼ�жϸ�Σ-->
<div class="gaowei" id="gaowei" style="display:none;">
 <span class="gaocap">������վ����<strong id="errnum"></strong>����Σ©�����뾡���޸�������������ʧ</span>
 <?
 $errnum=0;
 $testv="yes";
 $dirarr=array("img/",
			   "gg/",
			   "ad/",
			   "ckeditor/attached/",
			   "config/ueditor/php/upload/",
			   "config/ueditor/php/upload1/",
			   "config/ueditor/php/upload2/",
			   "config/ueditor/php/upload3/",
			   "config/ueditor_mini/php/upload/",
			   "config/ueditor_mini/php/upload1/",
			   "config/ueditor_mini/php/upload2/",
			   "config/ueditor_mini/php/upload3/",
			   "upload/"
			   );
 for($i=0;$i<count($dirarr);$i++){
 createDir("../".$dirarr[$i]);
 $fp= fopen("../".$dirarr[$i]."shell.php","w");fwrite($fp,$testv);fclose($fp);if(@htmlget(weburl.$dirarr[$i]."shell.php")=="yes"){
  $errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="http://www.yj99.cn/faq/view20.html" target="_blank">�޸�����</a></li>
 <li class="l2">�ļ��У�<strong><?=$dirarr[$i]?></strong> ���ڿ�ִ�нű�Ȩ��©�����б�ע�벢����ľ��ķ���</li>
 </ul>
 <? 
 }
 }
 while1("*","yjcode_admin where adminuid='".$_SESSION["SHOPADMIN"]."'");$row1=mysql_fetch_array($res1);
 if(strcmp(sha1("admin"),$row1[adminpwd])==0 || strcmp(sha1("123456"),$row1[adminpwd])==0 || strcmp(sha1("admin888"),$row1[adminpwd])==0){$errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="pwd.php">�����޸�</a></li>
 <li class="l2">�벻Ҫ����admin��123456��admin888֮������ױ��µ����ַ���Ϊ����</li>
 </ul>
 <? }?>
</div>
<script language="javascript">
if(<?=$errnum?>==0){document.getElementById("gaowei").style.display="none";}else{document.getElementById("gaowei").style.display="";document.getElementById("errnum").innerHTML=<?=$errnum?>;}
</script>
<!--�����жϸ�Σ--> 

<!--����B-->
<form name="f1" method="post" onsubmit="return callServer('<?=$ht1[count($ht1)-2]?>')">
<div class="gx" id="gx1" style="display:none;">
<span class="gxts">��⵽���²�����������������</span>
<ul class="uk">
<li class="l1">��̨���룺</li>
<li class="l2"><input type="password" class="inp" name="t1" size="20" onfocus="inpf(this)" onblur="inpb(this)" /></li>
<li class="l1"></li>
<li class="l21">
�����󣬻�ͬ�����������°汾��<strong class="red">�����й����ο������������ñ���</strong>��
��<a href="http://www.yj99.cn/faq/view35.html" class="blue" target="_blank">����������������ϸ˵��</a>��
</li>
<li class="l3"><input type="submit" value="��ʼ����" class="btn1" /></li>
</ul>
</div>

<div class="gx" id="gx2" style="display:none;">
<span class="gxts">���İ汾�������°� <span style="font-size:12px;color:#94B5DC;font-weight:100;cursor:pointer;" onClick="retgx()">[��������]</span></span>
</div>

<div class="gx" id="gx3" style="display:;">
<span class="gxts">���ڻ�ȡ���°汾��Ϣ����</span>
</div>
</form>
<script language="javascript">gxchk();</script>
<!--����E-->


<!--ͳ��B-->
<div class="tongji">
 <ul class="u1">
 <li class="l1">�û���Ϣͳ��</li>
 <li class="l2">
 <a href="userlist.php?shopzt=1"><strong class="red"><?=returncount("yjcode_user where shopzt=1")?></strong><br>�������</a>
 <a href="baomoneylist.php?zt=1"><strong class="red"><?=returncount("yjcode_baomoneyrecord where zt=1")?></strong><br>�ⶳ��֤��</a>
 <a href="txlist.php?zt=4"><strong class="red"><?=returncount("yjcode_tixian where zt=4")?></strong><br>��Ҫ��������</a>
 <a href="userlist.php?rz=xy"><strong class="red"><?=returncount("yjcode_user where sfzrz=0")?></strong><br>ʵ����֤���</a>
 <a href="renglist.php?zt=1"><strong class="red"><?=returncount("yjcode_payreng where ifok=1")?></strong><br>�˹��������</a>
 <a href="userlist.php?zt=0"><strong><?=returncount("yjcode_user where zt=0")?></strong><br>���û�Ա</a>
 <a href="userlist.php"><strong><?=returncount("yjcode_user")?></strong><br>���û���</a>
 </li>
 </ul>

 <ul class="u1">
 <li class="l1">��Ʒ/������Ϣͳ��</li>
 <li class="l2">
 <a href="productlist.php?zt=1"><strong class="red"><?=returncount("yjcode_pro where zt=1")?></strong><br>��Ҫ�����Ʒ</a>
 <a href="productlist.php"><strong><?=returncount("yjcode_pro where zt<>99")?></strong><br>������Ʒ</a>
 <? $ddztarr=array("wpay","wait","db","back","backsuc","backerr","suc","close");for($i=0;$i<count($ddztarr);$i++){?>
 <a href="orderlist.php?ddzt=<?=$ddztarr[$i]?>"><strong><?=returncount("yjcode_order where ddzt='".$ddztarr[$i]."'")?></strong><br><?=returnorderzt($ddztarr[$i])?></a>
 <? }?>
 </li>
 </ul>

 <ul class="u1">
 <li class="l1">������Ϣͳ��</li>
 <li class="l2">
 <a href="newslist.php?zt=1"><strong class="red"><?=returncount("yjcode_news where zt=1")?></strong><br>��Ҫ��˸��</a>
 <a href="tasklist.php?zt=1"><strong class="red"><?=returncount("yjcode_task where zt=1")?></strong><br>��Ҫ�������</a>
 <a href="tasklist.php?zt=8"><strong class="red"><?=returncount("yjcode_task where zt=8")?></strong><br>�о��׵�����</a>
 <a href="gdlist.php?gdzt=1"><strong class="red"><?=returncount("yjcode_gd where gdzt=1 and zt<>99")?></strong><br>�ȴ�������</a>
 <a href="newspjlist.php?zt=1"><strong class="red"><?=returncount("yjcode_newspj where zt=1")?></strong><br>�����Ѷ����</a>
 <a href="inf2.php"><strong<? if($rowcontrol[smskc]<=50){?> class="red"<? }?>><?=$rowcontrol[smskc]?></strong><br>���ö�������</a>
 <a href="tasklist.php"><strong><?=returncount("yjcode_task where zt<>99")?></strong><br>��������</a>
 <a href="taskhflist.php"><strong><?=returncount("yjcode_taskhf")?></strong><br>��������ظ�</a>
 </li>
 </ul>

</div>
<!--ͳ��E-->


</div>
<!--E-->

</div>
</div>
<? include("bottom.php");?>
</body>
</html>