function topd2over(){
document.getElementById("lkuang").style.display="";
document.getElementById("d2div").className="d2 d21";
}
function topd2out(){
document.getElementById("lkuang").style.display="none";
document.getElementById("d2div").className="d2";
}

function ser(x){
 t1v=document.f1.t1.value;
 if(t1v==""){alert("�����������ؼ���");document.f1.t1.focus();return false;}
 f1.action="../search/index.php?admin=5&id="+x;
}
//�����ղ�
var xmlHttpfavs = false;
try {
  xmlHttpfavs = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpfavs = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpfavs = false;
  }
}
if (!xmlHttpfavs && typeof XMLHttpRequest != 'undefined') {
  xmlHttpfavs = new XMLHttpRequest();
}

function shopfavInto(x){
url = "../tem/favshopInto.php?id="+x;
xmlHttpfavs.open("get", url, true);
xmlHttpfavs.onreadystatechange = updatePagefavs;
xmlHttpfavs.send(null);
}

function updatePagefavs() {
 if(xmlHttpfavs.readyState == 4) {
 response = xmlHttpfavs.responseText;
 response=response.replace(/[\r\n]/g,'');
  if(response=="err1"){topd2out();tclogin();return false;}
  else if(response=="err2"){alert("��~�����ղ��Լ��ĵ���Ŷ");return false;}
  else if(response=="ok"){
  document.getElementById("favsyes").style.display="";
  document.getElementById("favsno").style.display="none";
  document.getElementById("favsyes1").style.display="";
  document.getElementById("favsno1").style.display="none";
  }else{alert("δ֪������ˢ������");return false;}
 }
}

function topm2over(x){
document.getElementById("topm2_"+x).style.display="";
}
function topm2out(x){
document.getElementById("topm2_"+x).style.display="none";
}

//������¼����
function tclogin(){
layer.open({
  type: 2,
  area: ['650px', '415px'],
  title:["��ݵ�¼","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['/tem/openw.php', 'no'] 
});
}
