<?php
include("config.php");
include("classes/SiteResultsProvider.php");

	if(isset($_GET["term"])) {
		$term = $_GET["term"];
	}
	else {
		exit("Вы должны ввести поисковой запрос");
	}

	$type = isset($_GET["type"]) ? $type = $_GET["type"] : "sites";

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pisyun</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

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
							
							<input class="searchBox" type="text" name="term">
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
			$resultsProvider = new SiteResultsProvider($con);

			echo $resultsProvider->getNumResults($term);
			?>


		</div>


	</div>

</body>
</html>