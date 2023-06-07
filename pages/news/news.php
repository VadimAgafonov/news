<?php 
	$dfc = new PDO('mysql:host=localhost;dbname=News;charset=utf8', 'root', '');
	
	$st = $dfc->prepare("select id, title, announce, date_format(`date`, '%d.%m.%Y') df from news order by `date` desc limit ? , ?");
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;
	$limit = 4;
	$offset = ($page-1) * $limit;
	$st->bindValue(1, $offset, PDO::PARAM_INT);
	$st->bindValue(2, $limit, PDO::PARAM_INT);
	$st->execute();
	$res = $st->fetchAll();

	$totalPages = 5;
	$currentPage = 5;
?>



<div class="container">
	<div class="news__title">
		<h1>Новости</h1>
	</div>
<!-- NEWS -->
	<div class="news">

	

	<?php 
	foreach($res as $row) { ?>
<div class="news__blocks">
	<div class="news__blocks__date">
		<span class='news__blocks__date__span'><?=$row['df']?></span>
	</div>
	<div class="news__blocks__title">
		<a href="http://localhost/techart/news/pages/blog/blog.php?id=<?=$row['id']?>"><h3><?=$row['title']?></h3></a>
	</div>
	<div class="news__blocks__content">
		<p><?=$row['announce']?></p>
	</div>
	<div class="news__blocks__btn">
		<a href="http://localhost/techart/news/pages/blog/blog.php?id=<?=$row['id']?>">
		<button>Подробнее <svg width="20px" height="18px" viewBox="0 0 32 32" id="i-arrow-right" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#841844" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 6 L30 16 22 26 M30 16 L2 16"></path> </g></svg></button>
		</a>
	</div>
</div>
<?php } ?>
</div> 
<!-- //NEWS -->

<!-- Pagination -->
<?php 
$totalPages = 5;
$currentPage = 1;?>


<div class="pagination">
	<?php 
	
	for($i = 1; $i <= $totalPages; $i++) { ?>
		<a class="num <?php if($page == $i){echo 'active';} ?>" href="http://localhost/techart/news/pages/index/index.php?page=<?=$i?>">
	<div><?=$i?></div>
	</a>
	<?php }
	?>	
	<?php 
	$nextPage = $page+1;
	?>

	<a href="http://localhost/techart/news/pages/index/index.php?page=<?=$nextPage?>">
		<div>
		<svg class='arrow_btn <?php if($page == 5){echo "hide";}?>' width="20px" height="13px" viewBox="0 0 32 32" id="i-arrow-right" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#841844" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M22 6 L30 16 22 26 M30 16 L2 16"></path> </g></svg>
		</div>	
	</a>
</div>







</div>	


