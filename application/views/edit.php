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

		.edit {
			border: 1px solid #eaeaea;
			margin: 3px;
			background: white;
			width: 50%;
			padding: 4px 12px;

		}
		
		.edit input {
			width: 80%;
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
	<h3>Редактирование ролика</h3>
	<div class='edit'>
		Наименование: <br>
		<input type="text" id='name' value="<?= $video['title']; ?>"><br>
		Ссылка: <br>
		<input type="text" id='url' value="<?= $video['url']; ?>"><br>
		<a id="edit" onclick="save(<?= $video['id']; ?>);">Сохранить</a>
		<a id="cancel" onclick="location.href='/index.php';" >Отмена</a>
	</div>
	

	<script>
		base_url = '<?=base_url()?>';
		var xmlhttp = new XMLHttpRequest();
		function save(id){
	        var name = document.getElementById('name').value;
			var url = document.getElementById('url').value;
			xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4) {
	                if (xmlhttp.status == 200) {
	                    console.log(this.responseText);
	                    location.href = '/index.php';
	                }
	            } 
			} 
			xmlhttp.open("GET", "/index.php/main/ajax/save?id="+id+"&name="+encodeURI(name)+"&url="+encodeURI(url), true);
			xmlhttp.send(); 
		}
	</script>
</body>
</html>