<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
$sj=date("Y-m-d H:i:s");
while0("*","yjcode_order where orderbh='".$orderbh."' and ddzt='backerr' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}

if(sqlzhuru($_POST[jvs])=="jf"){
 zwzr();
 $txt=sqlzhuru1($_POST[content]);
 if(empty($txt)){Audit_alert("申请理由内容不得为空，返回重试！","orderjf.php?orderbh=".$orderbh);}
 intotable("yjcode_orderlog","orderbh,userid,selluserid,admin,txt,sj","'".$orderbh."',".$row[userid].",".$row[selluserid].",1,'".$txt."','".$sj."'");
 updatetable("yjcode_order","ddzt='jf' where orderbh='".$orderbh."'");
 deletetable("yjcode_db where orderbh='".$orderbh."' and userid=".$userid);
 deletetable("yjcode_tk where orderbh='".$orderbh."' and userid=".$userid);
 php_toheader("orderview.php?orderbh=".$orderbh); 

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />
<link href="css/order.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>

<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>

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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 申请客服介入</li>
</ul>
<? $leftid=2;include("left.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0">请选择：</li>
 <li class="g_ac0_h g_bc0_h">订单详情</li>
 <li class="l1"><a href="order.php">我的订单</a></li>
 </ul>
 <? include("orderv.php");?>
 
 <script language="javascript">
 function tj(){
 if(confirm("确认要申请客服介入吗？")){}else{return false;}
 layer.msg('正在提交申请', {icon: 16  ,time: 0,shade :0.25});
 f1.action="orderjf.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* 站长提示：</strong><br>
 * <span class="red">申请客服介入后，订单资金将被冻结在平台，直至平台处理完本次纠纷</span><br>
 * 提供详细的退款申请理由，并且附上图片，将更有助于平台处理本次纠纷，纠纷处理过程中，可以随时补充内容。
 </li>
 <li class="l5"><script id="editor" name="content" type="text/plain" style="width:856px;height:380px;"><?=$row[txt]?></script></li>
 <li class="l4"><?=tjbtnr("申请客服介入")?></li>
 </ul>
 <input type="hidden" value="jf" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
<script language="javascript">
//实例化编辑器
var ue= UE.getEditor('editor'
, {
            toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'removeformat', 'formatmatch' ,'|', 'forecolor',
                 'fontsize', '|',
                'link', 'unlink',
                'insertimage', 'emotion', 'attachment']
        ]
        });
</script>
</body>
</html>