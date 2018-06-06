<?
include("config/conn.php");
include("config/function.php");
include("config/xy.php");
$sj=date("Y-m-d H:i:s");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$rowcontrol[webkey]?>">
<meta name="description" content="<?=$rowcontrol[webdes]?>">
<title><?=$rowcontrol[webtit]?> - <?=webname?></title>
<link rel="shortcut icon" href="img/favicon.ico" />



<link rel="shortcut icon" href="img/favicon.ico" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/bootcss.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.m.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="js/index6.js"></script>
<script language="javascript" src="js/layui.js"></script>
<script language="javascript" src="js/common.js"></script>
<script language="javascript" type="text/javascript" src="js/ss.js"></script>
<script language="javascript">
userCheckses();
</script>



<? if(empty($rowcontrol[ifwap])){?>
<script language="javascript">
if(is_mobile()) {document.location.href= '<?=weburl?>m/';}
</script>
<? }?>
</head>
<body>

<? 
autoAD("ADI00");
while1("*","yjcode_ad where adbh='ADI00' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
$tp="gg/".$row1[bh].".".$row1[jpggif];
$image_size= getimagesize($tp);
?>
<div class="topbanner_hj" style="background:url(<?=$tp?>) no-repeat center 0;height:<?=$image_size[1]?>px;"><a href="<?=$row1[aurl]?>" target="_blank"></a></div>
<? }?>

<? include("tem/top.html");?>
<div class="yjcode"></div>
<? include("tem/top1.html");?>
<span id="leftnone" style="display:none">0</span>
<script language="javascript">
leftmenuover();
yhifdis(0);
document.getElementById("topmenu1").className="a1";
</script>

 <!--切换B-->
<div class="t_center">
<div id="focus"><td>    
 <ul> 
   <?
  autoAD("gao_qh");
  $i=1;
  while1("*","yjcode_ad where adbh='gao_qh' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
    <li><a href="<?=$row1[aurl]?>"><img src="gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="636" height="221" border="0" alt="<?=webname?>"/></a></li>
  <?
  $i++;
  }
  ?>
	</ul>
</div>
	
	
	<div class="scrollbox">
	<div class="scroltit"><strong>最新交易</strong><em>实时交易网站播报【<?=webname?>】</em><small title="向上" id="but_up" style="cursor: pointer;"><i class="iconfont">&#xe654;</i></small><small title="向下" id="but_down" style="cursor: pointer;"><i class="iconfont">&#xe652;</i></small></div>
    <div id="scrollDiv">
   <ul style="margin-top: 0px;">
   <? $i=0;while1("*","yjcode_order where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 20");while($row1=mysql_fetch_array($res1)){
    $sqlpro="select * from yjcode_pro where bh='".$row1[probh]."'";mysql_query("SET NAMES 'GBK'");$respro=mysql_query($sqlpro);$rowpro=mysql_fetch_array($respro);
    ?>
   <LI><strong><?=returnnc($row1[userid])?></strong> 购买了<span class="green">  <a href="<?=weburl?>product/view<?= $rowpro['id']?>.html"target="_blank" ><?=returntitdian($row1[tit],52)?></a></span> 成交价：<font  color="#ff6600"><strong>￥<?=$row1[money1]?></strong> </font>
   <SPAN style="COLOR: #f00">[<span class='blue'><?=returnorderzt($row1[ddzt])?></span>]</SPAN></LI>
   <? $i++;}?>
     
      </div>
</div>
</div>



<div class="t_right">
<div class="index_user">
<!--公告调用开始-->
<div class="iright">
 <ul class="ksdl" id="notlogin1"  style="">
 <li class="l1"><a href="reg/index.html" class="a1"></a><a href="reg/reg.html" class="a2"></a></li>
    	<a href="reg/reg.php" target="_blank" class="iu_reg"></a>
		<a href="reg/index.php" onClick="layer_login();" class="iu_login"></a>
		<div class="user_third"><span>第三方帐号登录：</span>
		<a target="_blank"  href="config/qq/oauth/index.php" class='login_icon'></a>
		<a target="_blank"  href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect"  class='login_icon login_click' id='wechat'></a>
 </div>
 </ul>
 <ul class="ksdl2" id="yeslogin1" style="display:none;">
 <li class="l1">
 <li class="iu_tx"><a href="user/index.php" target="_blank"><img border="0" src="picture/nonetx.gif" id="itx" width="48" height="48" align="left"></a>
  <li class="iu_name">欢 迎 您：<span id="yesuid1" class="blue"></span>
  <li class="iu_name">可用余额：<span id="imoney1" class="s2"></span>
  <li class="iu_link"><a href="user/index.php">会员中心</a> 
 <a href="user/favpro.php">我的收藏</a> <a href="user/order.php">订单</a><a href="user/jflog.php">积分</a>	<a href="user/un.php">退出</a>		</li></ul>
 </li>
 </ul>
 <ul class="u12 fontyh">
 </ul>
 </div>
 <script language="javascript">idldl(1);</script>
 <!--快速登录E-->
</div>
<div class="index_gg">
<ul class="tit"><?=webname?> - 统计指数：<span class="bz"></span></ul>
<ul>
<li><span>商  品：<em><?=$inittjarr[1]+returncount("yjcode_pro where zt=0 and ifxj=0")?></em> 个</span> 

 <span>会  员：<em><?=$inittjarr[0]+returncount("yjcode_user")?></em> 位</span></li> 

<li><span>交  易：<em><?=$inittjarr[2]+returncount("yjcode_order where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")?></em> 笔</span>
 <span>金 额：<em><?=sprintf("%.0f",$inittjarr[3]+returnsum("money1*num","yjcode_order where ddzt<>'backsuc' and ddzt<>'close'"))?></em> 元</span></li> 

</ul>
<ul class="tit">网站公告 <a href="help/gglist.html" target="_blank" class="ggmore">More></a></ul>
<ul>
<li>

   <? while0("*","yjcode_gg where zt=0 order by sj desc limit 7");while($row=mysql_fetch_array($res)){?>

<li><div class="gt"><a href="help/ggview<?=$row[id]?>.html" title="<?=$row[tit]?>" target=_blank> 
  【网站公告】<?=returntitdian($row[tit],36)?></A></div><div class="date">[<?=dateMD($row[sj])?>]</div></li>
  <? }?>
  

</ul>
</div>
</div>





</div>
  </div>
 </div>
</div>
</div>
  </div>
 </div>
</div>
</div>

<div class="yjcode">
  <div class="ad1"><? adwhile("gao_01",2)?></a></div> 
  
  
  
  
  
  
<div class="bfb bfbtoj">
<div class="yjcode">
<ul class="bfbtoj_di">

 <div class="d1">
 <? autoAD("ADI13");while0("*","yjcode_ad where adbh='ADI13' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
 
	<li><a href="<?=$row[aurl]?>" target="_blank"> <img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" width="406" height="50"></a></li>
 <? }?>
  </div>
  <div class="d2"> <div class="notice fr">
	


		<div class="txtscroll">
	
	<i class="yy-icon yy-laba"></i>

	<div class="bd">
		<div class="tempWrap" style="overflow:hidden; position:relative; height:20px"><ul style="height: 360px; position: relative; padding: 0px; margin: 0px; top: -120px;">
 
<? $i=1;while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){$i++;?>

		<li style="height: 20px;">欢迎最新商家
	<font  size="" color="#00b36"><a href="shop/view<?=$row1[id]?>.html" target="_blank"><?=$row1[shopname]?></a></font> 	加入<?=webname?>	
 <? }?>
		</ul></div>
	</div>
			<div class="hd"><a class="next"></a><a class="prev"></a></div>
			  <script>jQuery(".txtscroll").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"topLoop",autoPlay:true,easing:"easeOutCirc"});</script>
		</div>
</div>
 </div></div>
 
</div>  






 
 <div class="yjcode">
 
  
<!--推荐产品B-->
<div class="tjpro">
 <ul class="u0"><li class="l1"><span class="s0"><img src="<?=weburl?>homeimg/to1.png" /></span><span class="s1">限时抢购</span></li><li class="l2"><a href="product/"class="l2">查看更多 ></a></li></ul>
   <? 
 $i=1;
 while1("*","yjcode_pro where zt=0 and ifxj=0 and iftuan=1 and yhxs=2 and yhsj2>'".$sj."' order by yhsj2 asc limit 4");while($row1=mysql_fetch_array($res1)){
 $money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
 $au="product/view".$row1[id].".html";
 $dqsj=str_replace("-","/",$row1[yhsj2]);
 while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
 ?>
  <ul class="u1">
 <li class="l1">
 <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
 <img src="<?=returntppd(returntp("bh='".$row1[bh]."'","-1"),"img/none200x200.gif")?>">
 <div class="d1"><a target="_blank" href="<?=$au?>"><span class="list-name" id="djs<?=$i?>"></span></span><em class="look-but">我要购买</em></a></div>
 </li>
 <li class="l2"> <a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,47)?></a></li>
  <div class="d2">
    <? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><span class="a5">自动发货</span><? }?>&nbsp;&nbsp;<font size="2" color=""><?=dateYMD($row1[sj])?></font></time>
   <em class="a4">￥<?=sprintf("%.2f",$money1)?></em></span>
 </ul>
  <? $i++;}?>
   <script language="javascript">
 userChecksj();
 </script>
 
 </div>
<script language="javascript">
userChecksj();
</script>
<!--推荐产品E-->



<!--商品列表推荐商家B-->
<div class="taskm">
 <ul class="u1">
 <li class="l1 l11" id="taska1" onMouseOver="taskover(1)"><span class="s0"><img src="<?=weburl?>homeimg/to4.png"></span>推荐商家</li>
 <li class="l0"><span></span></li>
 <li class="l1" id="taska2" onMouseOver="taskover(2)"><span class="s0"><img src="<?=weburl?>homeimg/to5.png"></span>热门商品</li>

<li class="index_menu">

<span>
  
<a href="<?=weburl?>product/search_j93v_e57_60v.html" target="_blank">织梦</a>

  
<a href="<?=weburl?>product/search_j93v_e57_61v.html" target="_blank">帝国</a>

  
<a href="<?=weburl?>product/search_j93v_e57_67v.html" target="_blank">thinkphp</a>

  
<a href="<?=weburl?>product/search_j93v_e57_64v.html" target="_blank">ecshop</a>

  
<a href="<?=weburl?>product/search_j93v_e57_62v.html" target="_blank">Discuz</a>

  
<a href="<?=weburl?>product/search_j93v_e58_70v.html" target="_blank">ASP</a>

  
<a href="<?=weburl?>product/search_j93v_e58_69v.html" target="_blank">PHP</a>

  
<a href="<?=weburl?>product/search_j93v_e58_71v.html" target="_blank">.NET</a>

  
<a href="<?=weburl?>product/search_j99v_k172v.html" target="_blank">vps</a>

  
<a href="<?=weburl?>task/" target="_blank">威客任务</a>

  
<a href="<?=weburl?>product/search_j100v_k177v.html" target="_blank">建站优化</a>

  


  </span>
 </li>
 </ul>
 
  <div class="d1" id="taskm1" >
<div class="rec_shop">
<div>
 <? 
 $i=1;
 while1("*","yjcode_user where pm>0 and shopzt=2 and zt=1 order by pm asc limit 8");while($row1=mysql_fetch_array($res1)){
 $xy=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
 ?>
    <ul><li>
      <a href="shop/view146.html" class="avatar" target="_blank"><img src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none300x300.gif")?>" /></a>
	  <span class="info"><a href="shop/view<?=$row1[id]?>.html" target="_blank" class="name" ><?=$row1[shopname]?></a>
	 
     <p  class="i_bz"><img src="img/dj/<?=returnxytp($xy)?>" title="<?=$xy?>分" /></p>
	 
	 <p><a class='slink' href="shop/view<?=$row1[id]?>.html" target="_blank">TA的店铺</a></p>
	
	 
	 </span>
  <?
  while2("*","yjcode_pro where userid=".$row1[id]." and zt=0 and ifxj=0 order by lastsj desc limit 1");while($row2=mysql_fetch_array($res2)){
  $au="../product/view".$row2[id].".html";
  $tp="../".returntp("bh='".$row2[bh]."' order by iffm desc","-2");
  ?>
	 	   <li class='hot_goods'>
	   <strong>TA的宝贝<i>(<?=returncount("yjcode_pro where zt=0 and ifxj=0 and userid=".$row1[id])?>)</i></strong>
	   	   <p><em>￥<?=returnjgdian(returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row1[yhsj1],$row2[yhsj2],$row2[id]))?></em>
		   <a href="<?=$au?>" target="_blank" ><?=strgb2312($row2[tit],0,44)?></a></p>
		 </li>
<? }?>
 </ul>
 <? $i++;}?>
 
 
 
 
 </div>
  </div>
   </div>
 <div class="d1" id="taskm2" style="display:none;">
 
 <? 
 $i=1;
 while0("*","yjcode_pro where zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 5");while($row=mysql_fetch_array($res)){
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 $au="product/view".$row[id].".html";
 while3("*","yjcode_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
 ?>
     <ul class="u2">
  <li class="l1"><span class="feng">￥<?=$money1?></span> <a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=strgb2312($row[tit],0,30)?></a></li>
  <li class="l2">发布时间： <?=dateYMD($row[sj])?></li>
  </ul>
  <? $i++;}?>
    
  </div>
 <div class="d2">
  <a href="#" class="a1">近期收入榜</a>
 <div class="tjshop fontyh">
  <div class="dleft">
    <? while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' and pm>0 order by pm asc limit 1");while($row1=mysql_fetch_array($res1)){?>
    <ul class="u1">
  <li class="li"><img width="85" height="85" src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none180x180.gif")?>" /></li>
  <li class="l2">
  <a href="shop/view<?=$row1[id]?>.html" target="_blank"><?=strgb2312($row1[shopname],0,17)?></a>
  <span class="s1">收入：</span>
  <span class="s2">￥<strong><?=$row1[sellmyue]?></strong></span>
  </li>
  </ul>
  <? }?>
    <? $i=2;while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' and pm>1 order by pm asc limit 4");while($row1=mysql_fetch_array($res1)){?>
      <ul class="u2">
  <li class="l1"><img width="40" height="40" src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none60x60.gif")?>" /></li>
  <li class="l2 l22">
  <a href="shop/view<?=$row1[id]?>.html" target="_blank"><?=strgb2312($row1[shopname],0,17)?></a>
  <span class="s1">收入：</span>
  <span class="s2">￥<strong><?=$row1[sellmyue]?></strong></span>
  </li>
  </ul>
  <? $i++;}?>
    
    </div>
</div> 
</div>
<!--商品列表推荐商家E-->


<!--文字友情-->
<div class="indexcap fontyh"style="display:none;">友情链接</div>
<div class="mr_frbox">
<div id="linkBoxContent" class="clearfix f14">  
<div class="linkBox_div">
 <? while0("*","yjcode_ad where adbh='ADI14' and type1='文字' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
 <? }?>      
 
 
  </div>
  </div>
</div>


</div>
</div>








 <!--友情E-->
</div>
</div>

</div>
<? include("tem/bottom.html");?>

</body>
</html>