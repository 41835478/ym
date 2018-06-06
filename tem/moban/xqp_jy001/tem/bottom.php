<?
include("../config/conn.php");
include("../config/function.php");
?>


 <div class="bfb bfbbot">
  <div class="yjcode">
   <div class="d1"><img src="https://www.aspzhan.com/homeimg/blogo.jpg" /></div>
    <div class="d2"> 
   <? $i=1;while1("*","yjcode_ad where adbh='gao_04' and zt=0 order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
 
    <span class="s1"><a href="<?=$row1[aurl]?>" target="_blank"><?=$row1[tit]?></a></span>
    <? $i++;}?>
    <? $i=1;while1("*","yjcode_ad where adbh='gao_05' and zt=0 order by xh asc limit 3");while($row1=mysql_fetch_array($res1)){?>
    
    <span class="s2"><a href="<?=$row1[aurl]?>" target="_blank"><?=$row1[tit]?></a></span>
   <? $i++;}?>

  <span class="s3">官方客服：<?=$rowcontrol[webtelv]?></span>
   </div>
 <ul class="u1">
 <li class="l1">客户指南</li>
 <li class="l2">
  <a href="<?=weburl?>help/search_j9v.html">买家指南</a>
  <a href="<?=weburl?>help/search_j10v.html">卖家指南</a>
  <a href="<?=weburl?>help/search_j11v.html">安全交易</a>
  <a href="<?=weburl?>help/search_j12v.html">常见问题</a>
  <a href="<?=weburl?>help/search_j13v.html">服务中心</a>
  
  </li>
 </ul>
 <ul class="u2">
 <li class="l1">手机访问</li>
 <li class="l2"><img src="<?=weburl?>tem/getqr.php?u=<?=weburl?>m&size=4" /></li>
 </ul>

</div>
</div>






<div class="bfb bfbbot1">
<div class="yjcode">
 <div class="bq">
 <a href="<?=weburl?>">网站首页</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview2.html">关于我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview3.html">广告合作</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview4.html">联系我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview5.html">隐私条款</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="<?=weburl?>help/aboutview6.html">免责声明</a><br>
 CopyRight 2014-2024 <?=webname?> | <?=$rowcontrol[beian]?><br><?=$rowcontrol[webtj]?><br>



</div>
</div>



<script language="javascript">
$(".prolist .u1 .l1").mouseenter(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '6px'}, 200);
});
$(".prolist .u1 .l1").mouseleave(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '-50px'}, 200);
});
</script>