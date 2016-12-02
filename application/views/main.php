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

		.title a {
			color: black;
			font-size: 14px;
		}
		
		h3 {
			color: #7a7a7a;
		}
	</style>
</head>
<body>
	<h3>Главная страница</h3>
	<?php foreach($playlist as $item) { ?>
	<div class='list_el' id='<?= $item['id']; ?>'>
		<div class='title' >
			<a href='/index.php/main/play/<?= $item['id']; ?>'><?= $item['title']; ?></a>
			<span class='created_at'> 
				(Добавлено: <?= $item['created_at']; ?>)
			</span>
		</div><br>
		<a id='youtube' href='<?= $item['url']; ?>' target='_blank'>Посмотреть на Youtube</a>
		<a id="edit" href='/index.php/main/edit/<?= $item['id']; ?>' '>Редактировать</a>
		<a id="delete" onclick='del(<?= $item['id']; ?>);'>Удалить</a>
	</div>

	<?php } ?> 

	<br><a id="add" href='/index.php/main/edit' target='_blank'>+ Добавить</a>
	
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