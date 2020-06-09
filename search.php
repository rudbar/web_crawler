<?php
include("config.php");
include("classes/SiteResultsProvider.php");
include("classes/ImageResultsProvider.php");

if(isset($_GET["term"])) {
	$term = $_GET["term"];
}
else {
	exit("Вы должны ввести поисковой запрос");
}

$type = isset($_GET["type"]) ? $type = $_GET["type"] : "sites";
$page = isset($_GET["page"]) ? $type = $_GET["page"] : 1;

	
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Pisyun</title>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="description" content="Поисковая система">
	<meta name="keywords" content="Поисковая система, янтанякс, картинки">
	<meta name="author" content="Yan Kachan">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>
<body>

	<div class="wrapper">

		<div class="header">
			
			<div class="headerContent">
				
				<div class="logoContainer">
					<a href="index.php">
						<img src="assets/images/yantanyaxLogo.png">
					</a>
				</div>

				<div class="searchContainer">
					
					<form action="search.php" method="GET">
						
						<div class="searchBarContainer">
							<input type="hidden" name="type" value="<?php echo $type; ?>">
							<input class="searchBox" type="text" name="term" value="<?php echo $term; ?>">
							<button class="searchButton">
								<img src="assets/images/icons/search.png">
							</button>

						</div>



					</form>

				</div>

			</div>


			<div class="tabsContainer">
				
				<ul class="tabList">
					
					<li class="<?php echo $type == 'sites' ? 'active' : '' ?>">
						<a href='<?php echo "search.php?term=$term&type=sites"; ?>'>
							Поиск
						</a>
					</li>

					<li class="<?php echo $type == 'images' ? 'active' : '' ?>">
						<a href='<?php echo "search.php?term=$term&type=images"; ?>'>
							Картинки
						</a>
					</li>


				</ul>


			</div>
		</div>












		<div class="mainResultsSection">
			
			<?php
			if($type == "sites") {
				$resultsProvider = new SiteResultsProvider($con);
				$pageSize = 20;
			}
			else {
				$resultsProvider = new ImageResultsProvider($con);
				$pageSize = 30;
			}
			
			$numResults = $resultsProvider->getNumResults($term);

			echo "<p class='resultsCount'>$numResults results found</p>";




			echo $resultsProvider->getResultsHtml($page, $pageSize, $term);
			?>


		</div>





		<div class="paginationContainer">
			
			<div class="pageButtons">


				<div class="pageNumberContainer">
					<img src="assets/images/pageStart.png">
				</div>

				<?php 


				$pagesToShow = 10;
				$numPages = ceil($numResults / $pageSize);
				$pagesLeft = min($pagesToShow, $numPages);

				$currentPage = $page - floor($pagesToShow / 2);

				if($currentPage < 1) {
					$currentPage = 1;
				}

				if($currentPage + $pagesLeft > $numPages + 1) {
					$currentPage = $numPages + 1 - $pagesLeft;
				}

				while($pagesLeft != 0 && $currentPage <= $numPages) {

					if($currentPage == $page) {
						echo "<div class='pageNumberContainer'>
								<img src='assets/images/pageSelected.png'>
								<span class='pageNumber'>$currentPage</span>
							</div>";
					}
					else {
						echo "<div class='pageNumberContainer'>
								<a href='search.php?term=$term&type=$type&page=$currentPage'>
									<img src='assets/images/page.png'>
									<span class='pageNumber'>$currentPage</span>
								</a>
						</div>";
					}


					$currentPage++;
					$pagesLeft--;

				}







				?>

				<div class="pageNumberContainer">
					<img src="assets/images/pageEnd.png">
				</div>



			</div>






	</div>
	<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>