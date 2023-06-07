<?php
	$myVar = 'news' ;	
  $dfc = new PDO('mysql:host=localhost;dbname=News;charset=utf8', 'root', '');
	$st = $dfc->prepare("select id, title, announce, content, image, date_format(`date`, '%d.%m.%Y') df from news where id=?");
	$st->bindValue(1, $_GET['id'] ?? 1);
	$st->execute();
  $row = $st->fetch();
?>



<?php 
require '../header/header.php';
?>

<div class="line"></div>

<div class="container">
	<span>
		<a href="http://localhost/techart/news/pages/index/index.php">Главная /</a>
		<span class='blog__announce'><?=$row['title']?></span>
	</span>
	<div class="blog__title">
		<h1><?=$row['title']?></h1>
	</div>
</div>

<div class="container flex">

	<div class="blog">
		<div class="blog__date">
			<span><?=$row['df']?></span>
		</div>
		<div class="blog__about">
			<h3><?=$row['title']?></h3>
		</div>
		<p class="blog_text"><?=$row['content']?></p>
		<a class="btn" href="http://localhost/techart/news/pages/index/index.php">
			<button><svg width="40px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Complete"> <g id="arrow-left"> <g> <polyline data-name="Right" fill="none" id="Right-2" points="7.6 7 2.5 12 7.6 17" stroke="#841844" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline> <line fill="none" stroke="#841844" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21.5" x2="4.8" y1="12" y2="12"></line> </g> </g> </g> </g></svg>  назад к новостям</button>
		</a>
	</div>

	<div class="blog_image">
		<img src="../../image/<?=$row['image']?>" alt="image">
	</div>

</div>


<?php 
require '../footer/footer.php'
?>