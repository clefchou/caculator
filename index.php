<!DOCTYPE html>
<html>

<head>
<link href="caculator.css" rel="stylesheet" type="text/css" />
 <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <title> button click test </title>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
  <script type="text/javascript"></script>

</head>

<body>

<script>
var __data = {t1:0, t2:0, flag:0, flag1:0,newnum:0};
function mygetNum(n)
{
var num = n;
var result = document.getElementById("ret").innerHTML;
$.ajax({
	
	url:"getnum.php",
	type:"POST",
	data:{trans_data:num,trans_result:result,trans_t1:__data.t1,trans_t2:__data.t2,trans_flag:__data.flag,trans_flag1:__data.flag1,trans_newnum:__data.newnum},

	success:function(data){
		var data = JSON.parse(data); 
		//alert(data.flag);
		document.getElementById("ret").innerHTML = data.result;
		__data.t1 = data.t1;
		__data.t2 = data.t2;
		__data.flag = data.flag;
		__data.flag1 = data.flag1;
		__data.newnum = data.newnum;
	}
});

}
</script>



  <div class="header"></div>
  <div id="ret">0</div>
 
  
  <ul class="nav">

	<li><a href="#" onclick="mygetNum(7)">7</a></li>
	<li><a href="#" onclick="mygetNum(8)">8</a></li>
	<li><a href="#" onclick="mygetNum(9)">9</a></li>
	<li><a href="#" onclick="mygetNum('/')">/</a></li>	
  </ul>
  <ul class="nav">
	<li><a href="#" onclick="mygetNum(4)">4</a></li>
	<li><a href="#" onclick="mygetNum(5)">5</a></li>
	<li><a href="#" onclick="mygetNum(6)">6</a></li>
	<li><a href="#" onclick="mygetNum('*')">*</a></li>	
  </ul>
  <ul class="nav">
	<li><a href="#" onclick="mygetNum(1)">1</a></li>
	<li><a href="#" onclick="mygetNum(2)">2</a></li>
	<li><a href="#" onclick="mygetNum(3)">3</a></li>
	<li><a href="#" onclick="mygetNum('+')">+</a></li>	
  </ul>
  <ul class="nav">
	<li><a href="#" onclick="mygetNum('=')">=</a></li>
	<li><a href="#" onclick="mygetNum(0)">0</a></li>
	<li><a href="#" onclick="mygetNum('CE')">CE</a></li>
	<li><a href="#" onclick="mygetNum('-')">-</a></li>	
  </ul>
  <div class="content">
	<h5>caculator</h5>
	<p>version 0.0.1</p>
	<h5>grasp the CSS mode</h5>
	<p>___________________</p>
  </div>
  <div class="footer">
	<p></p>
  </div>

</body>

</html>
