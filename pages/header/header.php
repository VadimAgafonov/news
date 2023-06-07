<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../builds/index.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
	<title>Новости</title>
</head>



<?php 
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$news = $page;
?>


<body>


<header>
	<div class="container">
		<div class="header__top">
			<div class="header__top__logo">
				<a href="http://localhost/techart/news/pages/index/index.php">
					<img src="../../image/logo.png" alt="">
				</a>
			</div>
			<div class="header__top__navigation">
				<ul>
					<?php 
					require('../menu.php');
					foreach($menu as $key => $item) { ?>
					<li><a class='<?php if($key == $myVar){ echo 'active__nav'; } ?>' href="<?=$item['url']?>"><?= $item['title'] ?></a></li>
					<?php }
					?> 
				</ul>
			</div>
		</div>
	</div>
</header>
	
</body>
</html>