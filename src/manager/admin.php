<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link rel="stylesheet" href="bootstrap.css"  />
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.5/css/jquery.dataTables.css" />
<script  src="//code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script  src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
<style type="text/css">
#header{
height:60px;;		
}
body{
font-family:Verdana, Geneva, sans-serif;
	font-size:13px;
	margin:0px;
}
#menu li a{
	display:block;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	 width:120px;
}
#menu li{
	display:inline;
	margin-left:5px;
	float:left;
	margin:0;
	padding:0;   
}

#menu{
display:inline;
list-style-type:none;
position:relative;
text-align:center;
}

#con{
width:800px;
	margin:0 auto;
}

#content{
	padding-top:30px;
	padding-left:12px;
}

#footer{
	border-top:1px #CCC solid;	
}

#links{
padding-top:20px;
}
</style>
</head>

<body>


<div id="con">

<div id="header">

<img src="img/bank1.jpg" alt="header" />

</div>
<div id="links">
<ul id="menu">
<li><a href="?page=add">Register Account</a></li>
<li><a href="?page=delreg">D-Register</a><li>
<li><a href="?page=View">Summary</a></li>
<li><a href="/user.php">MyAccont</a></li>
<li><a href="?page=block">Block</a></li>
<li> <a href="logout.php">Logout</a> </li>
</ul>
</div>
<div id="content">

<?php
if(isset($_GET['page'])){
	
	$page=$_GET['page'];

	switch($page){

		case "add":
			include_once("pages/admin/add.php");
		    break;
	    case "delreg":
			include_once("pages/admin/del.php");
			break;
        case "View":
			include_once("pages/admin/View.php");
			break;
		case "block":
			include_once("pages/admin/block.php");
	     	break;
}
	
}else
{
 ?>


  <h1>Welcome to the administration Panel</h1>
	<br>
	
		<img src="http://www.afdb.org/fileadmin/_migrated/pics/carrers-AfDB_2.jpg" />
		

<?php }?>
</div>
</div>
</body>
</html>
