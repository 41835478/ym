<?
include("../config/conn.php");
include("../config/function.php");
?>
<div class="bfb bfbtop fontyh">
<div class="yjcode">

 <div class="top">
  <ul class="u1">
  <li class="l1"><span class="s1">���ã���ӭ��<?=webname?></a></span>
   </span>
   <li class="l2"><span id="yeslogin" style="display:none">��ӭ����<span id="yesuid"></span>&nbsp;&nbsp;[<a class="feng" href="<?=weburl?>user/qiandao.php" id="needqd" style="display:none;">ÿ��ǩ��</a><a class="blue" id="dontqd" style="display:none;" href="<?=weburl?>user/qiandao.php">������ǩ��</a>]&nbsp;&nbsp;<a href="<?=weburl?>user/un.php">�˳�</a></span>
  <li class="l2"> <span id="notlogin" style="display:none"><a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect">΢�ŵ�¼ </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=weburl?>reg/">��¼ </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=weburl?>reg/reg.php">���ע��</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=weburl?>config/qq/oauth/index.php" >QQ��¼</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="feng" href="<?=weburl?>user/qiandao.php">ÿ��ǩ��</a></span>
  </ul>
 </div> 
</div>
</div>
<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
userCheckses();
</script>
<div class="yjcode"><? adwhile("ADTOP");?></div>