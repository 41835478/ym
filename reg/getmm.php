<?
include("../config/conn.php");
include("../config/function.php");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>找回密码 - <?=webname?></title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="static/css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
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
			

<div class="yjcode">

 <div class="getpassword">
  <ul class="u1">
  <li class="l1">请选择找回密码的方式</li>
  <li class="l2">
  </li>
  </ul>
 </div>
 
 <div class="getpwdty fontyh">
 <ul class="u1">
 <li class="l1"><a href="getmob.php">通过手机找回</a></li>
 <li class="l2"><a href="getpasswd.php">通过邮箱找回</a></li>
 </ul>
 </div>

</div>

<? include("../tem/bottom.html");?>
</body>
</html>