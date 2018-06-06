<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
//已有标签 a b c d e f g h i j k l m p s
$tit="商品列表";
$ses=" where zt=0 and ifxj=0";
$ty1id=returnsx("j");if($ty1id!=-1){
 $sqlty1="select * from yjcode_type where admin=1 and id=".$ty1id;mysql_query("SET NAMES 'GBK'");$resty1=mysql_query($sqlty1);$rowty1=mysql_fetch_array($resty1);
 $ty1name=$rowty1[type1];$ses=$ses." and ty1id=".$ty1id;
 if(empty($rowty1[seotit])){$tit=$ty1name;}else{$tit=$rowty1[seotit];}
 $seokey=$rowty1[seokey];
 $seodes=$rowty1[seodes];

}
$ty2id=returnsx("k");if($ty2id!=-1){$ty2name=returntype(2,$ty2id);$ses=$ses." and ty2id=".$ty2id;$tit=$tit."/".$ty2name;}
$ty3id=returnsx("m");if($ty3id!=-1){$ty3name=returntype(3,$ty3id);$ses=$ses." and ty3id=".$ty3id;$tit=$tit."/".$ty3name;}
$ty4id=returnsx("i");if($ty4id!=-1){$ty4name=returntype(4,$ty4id);$ses=$ses." and ty4id=".$ty4id;$tit=$tit."/".$ty4name;}
$ty5id=returnsx("l");if($ty5id!=-1){$ty5name=returntype(5,$ty5id);$ses=$ses." and ty5id=".$ty5id;$tit=$tit."/".$ty5name;}
if(returnsx("s")!=-1){
 $skey=safeEncoding(returnsx("s"));
 $a=preg_split("/\s/",$skey);
 $bs="(";
 for($i=0;$i<=count($a);$i++){
 if(!empty($a[$i])){$bs=$bs."tit like '%".$a[$i]."%' and ";}
 }
 $ses=$ses." and ".$bs." tit<>'')";
 $tit=$tit."/".$skey;
}
if(returnsx("b")!=-1){$mon1=returnsx("b");$ses=$ses." and money2>=".$mon1;}
if(returnsx("c")!=-1){$mon2=returnsx("c");$ses=$ses." and money2<=".$mon2;}
if(returnsx("a")!=-1){$ifys=returnsx("a");$ses=$ses." and ysweb<>''";}
if(returnsx("d")!=-1){$ifzdfh=returnsx("d");$ses=$ses." and (fhxs=2 or fhxs=3 or fhxs=4)";}
if(returnsx("g")!=-1){$ifuserdj=returnsx("g");$ses=$ses." and ifuserdj=1";}

if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
$px="order by lastsj desc";
$pxv=returnsx("f");
if($pxv==1){$px="order by lastsj asc";}
elseif($pxv==2){$px="order by xsnum desc";}
elseif($pxv==3){$px="order by xsnum asc";}
elseif($pxv==4){$px="order by djl desc";}
elseif($pxv==5){$px="order by djl asc";}
elseif($pxv==6){$px="order by money2 desc";}
elseif($pxv==7){$px="order by money2 asc";}

if(!empty($_SESSION[SHOPUSER])){$myuserid=returnuserid($_SESSION[SHOPUSER]);}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$seokey?>">
<meta name="description" content="<?=$seodes?>">
<title><?=$tit?> - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="static/js/jquery.min.js"></script>
<script language="javascript" src="static/js/basic.js"></script>
<script language="javascript" src="static/js/index.js"></script>
<script language="javascript" src="static/js/layer.js"></script>
<link href="static/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="static/css/me.css" rel="stylesheet" type="text/css" />
<script src="static/js/jquery.js"></script>
<script src="static/js/all.js"></script>
 <script language="javascript" src="static/js/market.js"></script>
 


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
			
			
<script language="javascript">topjconc(1,'商品');document.getElementById("topt").value="";</script>

<div class="bfb bfblist fontyh">
<div class="yjcode">

 <div class="jieguo">
 全部结果 > 
 <? if($ty1id!=-1){?><a href="search_j<?=$ty1id?>v.html" class="g_ac0">"<?=$ty1name?>"</a> > <? }?>
 <? if($ty2id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class="g_ac0">"<?=$ty2name?>"</a> > <? }?>
 <? if($ty3id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class="g_ac0">"<?=$ty3name?>"</a> > <? }?>
 共搜索到<span id="jgcount"></span>件商品
 </div>
 <!--selB-->
 <div class="psel">
 
 <ul class="u2">
 <li class="l1">商品分类：</li>
 <li class="l2">
 <a href="./"<? if($ty1id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while1("*","yjcode_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row1[type1]?></a>
 <? }?>
 </li>
 </ul>
 
 <? if($ty1id!=-1){if(panduan("*","yjcode_type where admin=2 and type1='".$ty1name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty1name?>：</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v.html"<? if($ty2id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while1("*","yjcode_type where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr) && check_in("_k".$row1[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row1[type2]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty2id!=-1){if(panduan("*","yjcode_type where admin=3 and type1='".$ty1name."' and type2='".$ty2name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty2name?>：</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html"<? if($ty3id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while3("*","yjcode_type where admin=3 and type1='".$ty1name."' and type2='".$ty2name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$row3[id]?>v.html" <? if(check_in("_m".$row3[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row3[type3]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty3id!=-1){if(panduan("*","yjcode_type where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty3name?>：</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html"<? if($ty4id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while3("*","yjcode_type where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$row3[id]?>v.html" <? if(check_in("_i".$row3[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row3[type4]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty4id!=-1){if(panduan("*","yjcode_type where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty4name?>：</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html"<? if($ty5id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while3("*","yjcode_type where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$row3[id]?>v.html" <? if(check_in("_l".$row3[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row3[type5]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>

 <? 
 $si=0;
 $sbarr=array();
 while1("*","yjcode_typesx where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
 <ul class="u2">
 <li class="l1"><?=$row1[name1]?>：</li>
 <li class="l2">
 <a href="<?=rentser($ev,'','','');?>" <? if(check_in("_".$ev."_v",$getstr) || !check_in("_".$ev,$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while2("*","yjcode_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row2[name2]?></a>
 <? }?>
 </li>
 </ul>
 <? 
 $si++;
 }
 for($si=0;$si<count($sbarr);$si++){if(returnsx($sbarr[$si])!=-1){$nsx="xcf".returnsx($sbarr[$si])."xcf";$ses=$ses." and tysx like '%".$nsx."%'";}}
 ?>
 </div>
 <!--selE-->

<!--排序B-->
 <div class="paixu">
  <div class="d1">
  <? 
  $pxv=returnsx("f");
  $p1s=-1;
  $p2s=2;
  $p3s=4;
  $p4s=6;
  if($pxv==-1){$p1a="a1";$p1s="1";}elseif($pxv==1){$p1a="a2";$p1s="-1";}
  if($pxv==2){$p2a="a1";$p2s="3";}elseif($pxv==3){$p2a="a2";$p2s="2";}
  if($pxv==4){$p3a="a1";$p3s="5";}elseif($pxv==5){$p3a="a2";$p3s="4";}
  if($pxv==6){$p4a="a1";$p4s="7";}elseif($pxv==7){$p4a="a2";$p4s="6";}
  ?>
  <a href="<?=rentser('f',$p1s,'','');?>"<? if($pxv==-1 || $pxv==1){?> class="<?=$p1a?> g_ac1_h"<? }?>>综合排序</a>
  <a href="<?=rentser('f',$p2s,'','');?>"<? if($pxv==2 || $pxv==3){?> class="<?=$p2a?> g_ac1_h"<? }?>>销量高低</a>
  <a href="<?=rentser('f',$p3s,'','');?>"<? if($pxv==4 || $pxv==5){?> class="<?=$p3a?> g_ac1_h"<? }?>>人气排行</a>
  <a href="<?=rentser('f',$p4s,'','');?>"<? if($pxv==6 || $pxv==7){?> class="<?=$p4a?> g_ac1_h"<? }?>>价格排序</a>
  </div>
  <form name="f1" method="post" onSubmit="return psear('_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$ty5id?>v')">
  <div class="d2">
  <ul class="u2">
  <li class="l2"><label><input id="C1" type="checkbox" value="1"<? if($ifys==1){?> checked<? }?>> <span>有演示站</span></label></li>
  <li class="l2"><label><input id="C2" type="checkbox" value="1"<? if($ifzdfh==1){?> checked<? }?>> <span>自动发货</span></label></li>
  <li class="l2"><label><input id="C3" type="checkbox" value="1"<? if($ifuserdj==1){?> checked<? }?>> <span>会员折扣</span></label></li>
  <li class="l4">价格：</li>
  <li class="l5"><input name="money1" id="money1" value="<?=$mon1?>" type="text" /></li>
  <li class="l6">-</li>
  <li class="l5"><input name="money2" id="money2" value="<?=$mon2?>" type="text" /></li>
  <li class="l7">关键字：</li>
  <li class="l8"><input name="ink1" value="<?=$skey?>" id="ink1" type="text" /></li>
  <li class="l9"><input name="" value="搜索" type="submit" /></li>
  </ul>
  </div>
  </form>
 </div>
 <!--排序E-->



 <!--已选条件B-->
 <div class="nser g_bc0_h">
 <ul class="u1">
 <li class="l1">已选条件：</li>
 <li class="l2">
 <? if($ty1id!=-1){?>
 <span><a href="./" class="g_ac0"><?=$ty1name?></a></span>
 <? }?>
 
 <? if($ty2id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v.html" class="g_ac0"><?=$ty2name?></a></span>
 <? }?>
 
 <? if($ty3id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class="g_ac0"><?=$ty3name?></a></span>
 <? }?>
 
 <? if($ty4id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class="g_ac0"><?=$ty4name?></a></span>
 <? }?>
 
 <? if($ty5id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html" class="g_ac0"><?=$ty5name?></a></span>
 <? }?>
 
 <? 
 for($si=0;$si<count($sbarr);$si++){
  $tsx=returnsx($sbarr[$si]);
  if($tsx!=-1){
   while1("*","yjcode_typesx where id=".$tsx);if($row1=mysql_fetch_array($res1)){
   if($row1[admin]==2){
 ?>
 <span><a href="<?=rentser($sbarr[$si],'','','','search');?>" class="g_ac0"><?=$row1[name1]."：".$row1[name2]?></a></span>
 <? }}}}?>
 
 <? 
 if(returnsx("b")!=-1 || returnsx("c")!=-1){ 
  if(returnsx("c")!=-1 && returnsx("b")!=-1){$tjv=returnsx("b")."-".returnsx("c")."元";}
  elseif(returnsx("c")==-1){$tjv=returnsx("b")."元以上";}
  elseif(returnsx("b")==-1){$tjv=returnsx("c")."元以下";}
 ?>
 <span><a href="<?=rentser('b','','c','','search');?>" class="g_ac0"><?=$tjv?></a></span>
 <? }?>
 
 <? if($skey!=""){?>
 <span><a href="<?=rentser('s','','','','search');?>" class="g_ac0"><?=$skey?></a></span>
 <? }?>
 
 <? if($ifys==1){?>
 <span><a href="<?=rentser('a','','','','search');?>" class="g_ac0">有演示站</a></span>
 <? }?>
 
 <? if($ifzdfh==1){?>
 <span><a href="<?=rentser('d','','','','search');?>" class="g_ac0">自动发货</a></span>
 <? }?>
  
 </li>
 </ul>
 </div>
 <!--已选条件E-->

 <!--图片B-->
  <div class="prolist">
  <div class="lis">
  <div class="l">
  
   <!--产品列表B-->
 <? pagef($ses,20,"yjcode_pro",$px);?>
  
  <? if(0==$rowcontrol[propx]){?>
  <!--图片B-->
  <div class="l">

    <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  while1("id,uqq,shopname,xinyong","yjcode_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,50);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc");
  $xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));
  ?>
   <div class="lv<? if($i % 4==0){echo " lv0";}?>" onMouseOver="this.className='lv lv1<? if($i % 4==0){echo " lv0";}?>';" onMouseOut="this.className='lv<? if($i % 4==0){echo " lv0";}?>';">
  <ul class="u1">
   <ul class="dlist">
    <li class="l1">
      <div class="d1">
	  <a class="s1" href="<?=$au?>" class="a1">查看详情</a>
     <? if(!empty($row[ysweb])){?> <a target="_blank" href="<?=$row[ysweb]?>" class="a3">查看演示</a><? }else{?> <a  class="a3">无演示<? }?></span></div>
     <a href="<?=$au?>" target="_blank"><img src="<?=returntppd($tp,"../img/none180x180.gif")?>" /></a></li>
	  <li class="l2"><a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=$tit?></a></li>
  <li class="l3">
   <span class="s1">￥<?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></span>
  </li>
  
  <li class="l5">
  <span class="red">
  <a class="btn btn-auto btn-diy" href="../shop/view<?=$row1[id]?>.html"  title="<?=$row1[shopname]?>"  _title="<img src='../upload/<?=$row[userid]?>/shop.jpg'width='100px' height='100px'><p><?=returntitdian($row1[shopname],28)?><br/>" color="#ff6600">
  <img src="../upload/<?=$row[userid]?>/shop.jpg" width="24" height="24">
  </span></a>
  <img src="img/dj/<?=returnxytp($xy)?>" title="<?=$xy?>分" /></i>
  
  </li>
  
  <div class="listr">
  <li class="l6">
  <div class="pull-right smgray text-right mt5 ">
    		 
	<? if($row1[baomoney]){?><a class="btn btn-warning btn-bao btn-diy" href="javascript:;" _title='该商家已加入保证金计划<br>已缴纳 &lt;b&gt;<?=$row1[baomoney]?>&lt;/b&gt; 元保证金' color="#FF7E00"><span class="m1">保</span></a><? }else{?><a class="btn btn-warning btn-bao btn-diy" href="javascript:;" _title='该商家没有加入保证金计划<br> &lt;b&gt;&lt;/b&gt;详细测试再下单' color="#FF7E00"><span class="m1">保</span></a><? }?>	
		
		
	<? if($row[fhxs]==1){?> <a class="btn btn-success btn-auto btn-diy" href="javascript:;" _title="手动发货商品，拍下后，卖家会收到待发货的邮件、短信提醒" color="#4cae4c"><span class="m1">手</span></a><? }?>
	
	<? if($row[fhxs]==2){?><a class="btn btn-successs btn-autoo btn-diy" href="javascript:;" _title="自动发货商品，拍下后，即可收到来自该商品的发货（下载）链接" color="#ffa800"><span class="m1">自</span></a><? }?>
						
    
	<? if(1==$row[ifuserdj]){?>	
   <a class="btn btn-info btn-dijia btn-diy" href="javascript:;" _title="SVIP会员，可享受不同的优惠" color="#46b8da"><span class="m1">优</span></a>   <? }?>
    <a class="btn btn-iinfo btn-dijiia btn-diy" href="javascript:;" _title="销量 <?=$row[xsnum]?> 笔" color="#e40231"><span class="m1">销</span></a>

   </div>
  </li>
  </ul>
  
  </div>
  <? $i++;}?>
  </div>
  <!--结束-->
  <? }else{?>
  <!--列表B-->



  <!--列表B-->
  <? }?>


    </div>
     </div>
 
  <div class="npa">
  <?
  $nowurl="search";
  $nowwd="";
  require("../tem/page.html");
  ?>
  </div>
  
</div>
</div>

<SCRIPT language=javascript> 
document.onkeydown = pageEvent; 
var prevpage="search_p0v.html#pagetop"; 
var nextpage="search_p2v.html#pagetop"; 
function pageEvent(evt){ 
evt = evt ||window.event; 
var key=evt.which||evt.keyCode;
if (key == 37)  layer.alert("亲，已是第一页了，再翻就到南极啦！",5)
if (key == 39)  location = nextpage
}; 
</SCRIPT> 



<? include("../tem/bottom.html");?>



<div class="ad1"><!--咨询B-->
<link href="static/css/index_1.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="static/js/index.js"></script>
</div>
<script language="javascript">
$(".prolist .u1 .l1").mouseenter(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '6px'}, 200);
});
$(".prolist .u1 .l1").mouseleave(function () {
    $(this).find('.d1').eq(0).stop().animate({'top': '-50px'}, 200);
});
</script><script language="javascript">
document.getElementById("jgcount").innerHTML=<?=$count?>;
</script>
</body>
</html>