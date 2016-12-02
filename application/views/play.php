<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Main page</title>

	<style type="text/css">
		html {
			background: #f8f8f8;
		}

		.list_el > div {
			float: left;
		}

		.list_el {
			border: 1px solid #eaeaea;
			margin: 3px;
			background: white;
			width: 50%;
			padding: 4px 12px;

		}
		.list_el .created_at {
			font-size: 11px;
			color: #8d8d8d;
		}
		a {
			color: #2d1a89;
			text-decoration: none;
			font-size: 12px;
			padding-left: 20px;
			cursor: pointer;
		}
		
		h3 {
			color: #7a7a7a;
		}
	</style>
</head>
<body>
	<h3><?= $video['title']; ?></h3>
	
	<iframe width="630" height="360" src="https://www.youtube.com/embed/<?= $vid; ?>" frameborder="0" allowfullscreen></iframe>
	<br>

	<a id='youtube' href='<?= $video['url']; ?>' target='_blank'>Посмотреть на Youtube</a>
	<a id="edit" href='/index.php/main/edit/<?= $video['id']; ?>' '>Редактировать</a>
	<a id="delete" onclick='del(<?= $video['id']; ?>);'>Удалить</a>
	<br><br>
	<a onclick='location.href = "/index.php";'>Назад</a>


	<script>
		var xmlhttp = new XMLHttpRequest();
		function del(id){
			xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4) {
	                if (xmlhttp.status == 200) {
	                    console.log(this.responseText);
	                    location.href = '/index.php';
	                }
	            } 
			} 
			xmlhttp.open("GET", "/index.php/main/ajax/del?id="+id, true);
			xmlhttp.send(); 
		}
	</script>

</body>
</html>