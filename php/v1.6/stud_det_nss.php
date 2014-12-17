<?php
require "connect.inc.php";
require "core.inc.php";
		 if(!loggedin()) {
 		
				header('Location:index.php');
 		}
 
	require 'header.php';
?>
<style type="text/css">
img{
    border:0;
}
#main{
    margin: 15px auto;
    overflow: auto;
	width: 750px;
}
#header{
}
#mainbody{
    width:100%;
	display:none;
}
#footer{
}
#qrfile{
    width:320px;
    height:240px;
}
#v{
    width:320px;
    height:240px;
}
#qr-canvas{
    display:none;
}
#iembedflash{
    margin:0;
    padding:0;
}
#mp1{
    text-align:center;
    font-size:25px;
}
#mp2{
    text-align:center;
    font-size:25px;
	color:red;
}
.selector{
	  margin:0;
    padding:0;
    cursor:pointer;
    margin-bottom:-5px;
}
#outdiv
{
    width:320px;
    height:240px;
	border: solid;
	border-width: 3px 3px 3px 3px;
}
#result{
	padding:20px;
	width:160%;
}

#imghelp{
    position:relative;
    left:0px;
    top:-160px;
    z-index:100;
    font:18px arial,sans-serif;
    background:#f0f0f0;

	padding-top:10px;
	padding-bottom:10px;
	border-radius:20px;
}
p.helptext{
    margin-top:54px;
    font:18px arial,sans-serif;
}
p.helptext2{
    margin-top:100px;
    font:18px arial,sans-serif;
}
#footer a{
	color: black;
}
.tsel{
    padding:0;
}
</style>
<script type="text/javascript" src="js/llqrcode.js"></script>
<script type="text/javascript" src="js/webqr2.js"></script>


</head>

<div class="box-content well">
<body onload="load()">
<div id="main">
<div id="mainbody">
<div id="jukebox"></div>
<table class="tsel" border="0">
<tr><td align="right" valign="top"  >
</td>
<td valign="top"  >
<table class="tsel" border="0">
<tr>
<td><img class="selector" id="webcamimg" src="webcam2.png" onclick="setwebcam();" align="left" /></td>
<td><img class="selector" id="qrimg" style="visibility:hidden;" src="qrimg2.png" onclick="setimg()" align="right"/></td></tr>
<tr><td colspan="2" align="center">
<div id="outdiv">
</div></td></tr>
</table>
</td>
</tr>
<tr><td colspan="3" align="center">
<img src="down.png"/>
</td></tr>
<tr><td colspan="3" align="center">
<div id="result"></div>
</td></tr>
</table>
</div>&nbsp;
<div id="footer">
<br>
</div>
</div>
<canvas id="qr-canvas" width="800" height="600"></canvas>
</div>
<?php 
	require 'footer.php';
?>