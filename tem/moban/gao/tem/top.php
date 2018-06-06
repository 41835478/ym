<?
include("../config/conn.php");
include("../config/function.php");
?>
<div class="bfb bfbtop fontyh">
<div class="yjcode">

 <div class="top">
  <ul class="u1">
  <li class="l1"><span class="s1">您好，欢迎来<?=webname?></a></span>
   </span>
   <li class="l2"><span id="yeslogin" style="display:none">欢迎您：<span id="yesuid"></span>&nbsp;&nbsp;[<a class="feng" href="<?=weburl?>user/qiandao.php" id="needqd" style="display:none;">每日签到</a><a class="blue" id="dontqd" style="display:none;" href="<?=weburl?>user/qiandao.php">今日已签到</a>]&nbsp;&nbsp;<a href="<?=weburl?>user/un.php">退出</a></span>
  <li class="l2"> <span id="notlogin" style="display:none"><a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect">微信登录 </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=weburl?>reg/">登录 </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=weburl?>reg/reg.php">免费注册</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=weburl?>config/qq/oauth/index.php" >QQ登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="feng" href="<?=weburl?>user/qiandao.php">每日签到</a></span>
  </ul>
 </div> 
</div>
</div>
<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
userCheckses();
</script>
<div class="yjcode"><? adwhile("ADTOP");?></div>