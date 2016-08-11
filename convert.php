<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
if(isset($_GET['mod']) && $_GET['mod']=='cpu'){
$BDcode=$_POST['BDcode'];
$ZQcode = str_replace("http://bdimg.share.baidu.com", "https://share.zqjs.tk", $BDcode);
if($ZQcode == $BDcode){
die("<h2>提交的不是百度分享代码！</h2>");
}
echo "<h2>ZQshare代码：<br><textarea id=textarea><!--ZQshare begin-->\n".$ZQcode."\n<!--ZQshare end--></textarea></h2>";
}else{
?>

<html>
<head>
<meta charset="utf-8" />
<title>
分享代码转换器
</title>
<style>
#textarea{
width:280px;
height:100px;
}
</style>
<script type="text/javascript">
function loadXMLDoc()
{
var xmlhttp;
var downurl=document.getElementById("downurl").value;
//alert(downurl);
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","/convert.php?mod=cpu",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("BDcode="+downurl);
}
</script>
</head>
<body>
<center>
<h1>分享代码转换器</h1>
<h3>本工具把百度分享代码转换成ZQshare代码。</h3>
<h2>百度分享代码：<input type="text" name="downurl" id="downurl" /><button onclick="loadXMLDoc()">获取代码</button></h2>
<div id="myDiv" style="border:1px solid black;"></div>
</center>
</body>
</html>
<?php
}
?>	