<?php 


	if(isset($_GET["term"])) {
		$term = $_GET["term"];
	}
	else {
		exit("Вы должны ввести поисковой запрос");
	}

	
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
					
					<li>
						<a href='<?php echo "search.php?term=$term&type=sites"; ?>'>
							Поиск
						</a>
					</li>

					<li>
						<a href='<?php echo "search.php?term=$term&type=images"; ?>'>
							Картинки
						</a>
					</li>


				</ul>


			</div>


		</div>
	</div>

</body>
</html>