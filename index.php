<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link href="styles1.css" type="text/css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
		<title>
			ERD, Persona & Use Case - PC Part Picker
		</title>
	</head>
	<body>
		<header>
			<h1>Entity Relationship Diagram for PC Part Picker Website</h1>
		</header>
		<img src="pcpartpickerdotcom.svg" class="erdSvg"/>
		<aside>
		<img src="avatar-me.png" class="userPhoto"/>
		<h2>Lily - DIY PC Builder, 22 yrs. old</h2>
			<h3 class="persona">A student on a budget</h3>
				<p>
				Lily has been building PCs since she was 12 years old.  Recently she was given money as a graduation gift amd she would like to replace her existing system with a new build.  Lily knows what size of RAM she will need that will support the scientific graphing program she needs for graduate school and her favorite PC games.
				</p>
			<hr>
			<h4>Needs</h4>
				<ol>
					<li>Keep the RAM chip cost below 80$ to fit Lily's budget</li>
					<li>Meet minimum requirements for Lily's build
						<ul>
							<li>correct amount of RAM</li>
							<li>compatible with system build</li>
						</ul>
					</li>
					<li>Get the best possible product based on user ratings</li>
				</ol>
			<h4>Frustrations</h4>
				<p>
					As a DIY PC builder, Lily dislikes doing the time consuming research necessary to purchase individual computer components for a complete computer build.  The RAM chip she will ultimately decide to purchase should be compatible with her motherboard and also be the best rated by other experienced PC Builders.
				</p>
			<h4>Ideal Website</h4>
			<ul>
				<li>Offer many choices for the size of RAM she needs</li>
				<li>Search and filter tools to hide products that don't fit her minimum requirements</li>
				<li>Show the rating and number of ratings each product has</li>
				<li>Compatible with system build</li>
				<li>Prices from a wide swath of vendors for comparison shopping</li>
				<li>One click ordering</li>
			</ul>
			<hr>
			<h3>
				Conceptual Model
			</h3>
			<ul>
				<li>User can see many product types</li>
				<li>User can use filter to search for a specific product type</li>
				<li>User can use additional filters to limit choices to minimum requirements</li>
				<li>User can see price, vendors, ratings, specifications and comments about the product</li>
				<li>User can follow a link to vendor POS website to make purchase</li>
			</ul>

		</aside>
	</body>
		<footer>
		<a href="http://pcpartpicker.com/part/gskill-memory-f312800cl9d8gbxl">PC Part Picker - <span class="ram">G.Skill Ripjaws X Series 8GB (2 x 4GB) DDR3-1600 Memory</span></a><br><br>
		&copy; 2016 el41net

		</footer>
</html>