<? function yjsendsms($m1,$m2){
$user = 'xqwzjs123';
$password = 'taojin888';
$sign = "║╬12345║©";//╤лпег╘цШ
if(!empty($m1)){
$url = "http://api.smsbao.com/sms";
$url .= '?u='.$user.'&p='.md5($password).'&m='.$m1.'&c='.urlencode(iconv("GBK","UTF-8//IGNORE",$sign.$m2));
$ret = file_get_contents($url);
}
}?>