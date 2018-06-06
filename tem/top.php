<?
include("../config/conn.php");
include("../config/function.php");
?>


<div class="bfb bfbtop fontyh">
  <div class="yjcode">
  
    <span id="notlogin" style="display:none">
      <nav class="nav_top">
        <div class="container clearfix">
          <div class="fr_left">
            <ul class="clearfix nav_top_item">
              <li class="clearfix top_user_info" id="top_user_info">
                <div class="fl">
                  <a href="<?=weburl?>">
                    <i class="iconfont">&#xe616;</i>
                    <?=webname?>，靠谱的在线交易平台。</a></div>
            </ul>
          </div>
          <div class="fr">
            <ul class="clearfix nav_top_item">
              <li class="clearfix top_user_info" id="top_user_info">
                <div class="fl" style="display:none">
                    <a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect">
                    <i class="iconfont">&#xe638;</i>QQ登录</a></div>
					<div class="fl" style="display:none">
                  <a class="topLogin_btn" href="<?=weburl?>config/qq/oauth/index.php">
                    <i class="iconfont">&#xe638;</i>QQ登录</a></div>
                <div class="fl">
                  <a class="topLogin_btn" href="<?=weburl?>reg/">
                    <i class="iconfont">&#xe608;</i>登录</a></div>
                <div class="fl">
                  <a href="<?=weburl?>reg/reg.php">
                    <i class="iconfont">&#xe654;</i>注册</a></div>
              </li>
              <li>
                <a href="<?=weburl?>user/qiandao.php" target="_blank">
                  <i class="iconfont">&#xe602;</i>每日签到</a></li>
              <li>
                <a href="<?=weburl?>help/" target="_blank">
                  <i class="iconfont">&#xe602;</i>帮助</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </span>
	
    <span id="yeslogin" style="display:none">
      <nav class="nav_top">
        <div class="container clearfix">
          <div class="fr_left">
            <ul class="clearfix nav_top_item">
              <li class="clearfix top_user_info" id="top_user_info">
                <div class="fl">
                  <a href="index.php">
                    <i class="iconfont">&#xe616;</i><?=webname?></a></div>
            </ul>
          </div>
          <div class="fr">
            <ul class="clearfix nav_top_item">
              <li>
                <font size="" color="#ffff00">
                  <a id="yesuid" href="<?=weburl?>user/index.php"></a>
                </font>
              </li>
              <li class="position_re my_browse">
                <a href="<?=weburl?>user/index.php">
                  <i class="iconfont">&#xe608;</i>个人中心</a></li>
              <li class="clearfix top_user_info" id="top_user_info"></li>
              <li>
                <a href="<?=weburl?>user/qiandao.php" target="_blank" id="needqd" style="display:none;">
                  <i class="iconfont">&#xe618;</i>每日签到</a></li>
              <li>
                <a href="<?=weburl?>user/qiandao.php" target="_blank" id="dontqd" style="display:none;">
                  <i class="iconfont">&#xe620;</i>今日已签到</a></li>
              <li>
                <a href="<?=weburl?>help/" target="_blank">
                  <i class="iconfont">&#xe602;</i>帮助</a></li>
              <li>
                <a href="<?=weburl?>user/un.php">
                  <i class="iconfont">&#xe609;</i>退出</a>
                <li class="l2">
                  <span id="yeslogin" style="display:none">欢迎您：
                    <span id="yesuid"></span>&nbsp;&nbsp; [
                    <a class="feng" href="<?=weburl?>user/qiandao.php" id="needqd" style="display:none;">每日签到</a>
                    <a class="blue" id="dontqd" style="display:none;" href="<?=weburl?>user/qiandao.php">今日已签到</a>]&nbsp;&nbsp;
                    <a href="<?=weburl?>user/un.php">退出</a></span>
                </li>
            </ul>
          </div>
        </div>
      </nav>
    </span>
	
  </div>
</div>

<span id="webhttp" style="display:none"><?=weburl?></span>
<script language="javascript">
userCheckses();
</script>
<div class="yjcode"><? adwhile("ADTOP");?></div>
