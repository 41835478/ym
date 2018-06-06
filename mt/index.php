<?
include("../config/conn.php");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>手机版触屏版网页版</title>
<link href="static/css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
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

<div class="bfb bfb1">
<div class="yjcode">
 <div class="mtm">
 <ul class="u1">
 <li class="l1"><? $uw=weburl."m"; ?><img src="<?=weburl?>tem/getqr.php?u=<?=$uw?>&size=6" /></li>
 <li class="l2"><a href="http://<?=str_replace("http://","",weburl);?>m" target="_blank"><?=str_replace("http://","",weburl);?>m</a></li>
 </ul>
 </div>
</div>
</div>

<? include("../tem/bottom.html");?>
</body>
</html>