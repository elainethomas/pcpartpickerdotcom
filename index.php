<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link href="styles1.css" type="text/css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Candal' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Coda' rel='stylesheet' type='text/css'>
		<title>
			ERD for PC Part Picker Website
		</title>
	</head>
	<body>
		<header>
			<h1>Entity Relationship Diagram for PC Part Picker Website</h1>
		</header>
		<img src="pcpartpickerdotcom.svg" class="erdSvg"/>
		<img src="avatar-me.png" class="userPhoto"/>
		<h2>Lily - DIY PC Builder, 22 yrs. old</h2>
			<h3>A student on a budget</h3>
			<div>
				<p>
					Lily has been building PCs since she was 12 years old. Recently she was given money as a graduation gift and she would like to replace her existing computer with a new build. Lily knows what size of RAM that will support the scientific graphing program she needs for graduate school and her favorite PC games.
				</p>
			<h4>Needs</h4>
				<ol>
					<li>Keep the RAM chip cost below 60$ to fit budget</li>
					<li>Meet minimum requirements for build
						<ul>
							<li>correct amount of RAM</li>
							<li>compatible with system build</li>
						</ul>
					</li>
					<li>Get the best possible product based on user ratings</li>
				</ol>
			<h4>Frustrations</h4>
				<p>
					As a DIY PC builder, Lily dislikes doing the time consuming research necessary to purchase individual computer components for a complete computer build. Pouring over documentation and visiting several PC parts websites to read specifications and find the best prices can take hours. Lily has a limited budget so other user's ratings will be important for her to decide on the best possible product within her budget.
				</p>
		</div>
		<h3>Use Case 1</h3>
		<h4>Basic Flow</h4>
		<ul>
			<li>Lily selects the individual parts heading from the landing page.
				<ul>
					<li>When hovering over the individual parts link a graphical menu with key word names opens up.
						<ul>
							<li>Lily selects the type of part she is looking for
								<ul>
									<li>The website directs her to a large filterable listing of all products of the selected type.
										<ul>
											<li>Lily uses her minimum requirements for her build to filter the list.
												<ul>
													<li>Lily uses the product's user ratings and comments to guide her decision.
														<ul>
															<li>When she has made up her mind, Lily selects the name of the chosen product vendor
																<ul>
																	<li>The link takes her directly to the product listing on the vendor's site for easy check out.</li>
																</ul>
															</li>
														</ul>
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul><br>
		<h3>Use Case 2</h3>
		<h4>Alternate Flow</h4>
		<ul>
			<li> After landing on the homepage, Lily uses the site search tool at the top of the page to enter the size and type of product she is looking for.
				<ul>
					<li>The website takes her to a list that is indicated to be 5 pages long of parts that fit her search terms. The list includes the vendor, price and shopping cart button.
						<ul>
							<li>Lily browses the list till she finds a product she is interested in, and selects it.
								<ul>
									<li>She can now see that the product fits her search terms and all of her minimum requirements.
										<ul>
											<li>Lily selects the name of the chosen product vendor.
												<ul>
													<li>The link takes her directly to the product listing on the vendor's site for easy check out.</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</body>
	<footer>
		<a href="http://pcpartpicker.com/part/gskill-memory-f312800cl9d8gbxl">PC Part Picker Website<span class="foot">G.Skill Ripjaws X Series 8GB (2 x 4GB) DDR3-1600 Memory</span></a><br><br>
		&copy; 2016 el41net

	</footer>
</html>