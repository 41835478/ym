<?
require("../config/conn.php");
require("../config/function.php");
$w=$_SERVER['HTTP_HOST'];
AdminSes_audit();
if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){echo "err2";exit;}
$sj=date("Y-m-d H:i:s");
if(panduan("*","yjcode_admin where adminuid='".$_SESSION["SHOPADMIN"]."' and adminpwd='".sha1($_GET[pwd])."'")==0){echo "err1";exit;}
$url="http://www.yjcode.com/update/shop/t5/1521781994_482_tgVwXA.zip";
$fp_output = fopen("gx.zip", 'wb');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FILE, $fp_output);
curl_exec($ch);
curl_close($ch);
echo "ok";
?>