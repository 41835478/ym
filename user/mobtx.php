<?
include("../config/conn.php");
include("../config/function.php");
while1("uid,email,ifemail","yjcode_user where uid='".$_SESSION[SHOPUSER]."'");$row1=mysql_fetch_array($res1);
if(empty($row1[email]) || $row1[ifemail]==0){echo "err";exit;}

require("../config/mailphp/sendmail.php");
$yz=MakePass(6);
$str="��֤�룺<font color='red' style='font-size:18px;'>".$yz."</font>,������Ǳ��˲���������Դ���Ϣ����".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
yjsendmail("��ȫ���޸ġ�".webname."��",$row1[email],$str);
updatetable("yjcode_user","getpwd='".$yz."' where uid='".$_SESSION[SHOPUSER]."'");
?>