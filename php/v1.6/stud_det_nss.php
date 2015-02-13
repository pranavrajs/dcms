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
<script type="text/javascript" src="js/html5-qrcode.js"></script>


</head>
<body>

<div class="box-content well">


<div class="row">


<div class="col-md-6">

 <div id="reader" style="height:300px;width:100%;">
 </div>


</div>

<div class="col-md-6">

<h3>&nbsp; </h3>
<div class="result"></div>


</div>



</div>

<script type="text/javascript">

     $('#reader').html5_qrcode(function(data){
            $('.result').html(data);
            window.location = 'stud_det.php?offline_id='+data;
    },
    function(error){
        //show read errors 
    }, function(videoError){

    }
    );


</script>

</div>
<?php 
    require 'footer.php';
?>