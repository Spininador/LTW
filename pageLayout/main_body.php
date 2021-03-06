<div id="main_body">
	<div id="search_area">
		<div id="introParagraphDiv">
			<p>Looking for a restaurant?</p>
		</div>
		<div id="searchByDiv" >
			<p id="searchByP">Search by... </p>
			<ul>
				<li id="nameDiv" />
					<p>... name: </p>
					<input class="search_btn" id="res_name" type="text">
				</li>
				<li id="priceRangeDiv" />
					<p>... price range: </p>
					<input class="search_btn" id="res_price1" type="number" style="width:50px;">
					<input class="search_btn" id="res_price2" type="number" style="width:50px;margin-right:56px;">
				</li>
				<li id="locationDiv" />
					<p>... location: </p>
					<input class="search_btn" id="res_locat" type="text">
				</li>
				<li id="popularityDiv" />
					<p>... minimum rating: </p>
					<input class="search_btn" id="res_rat" type="number" min="1" max="10">
				</li>
			</ul>
		</div>
	</div>
	<div id="show_restaurants" >
		<p id="welcome">Welcome to this restaurant reviews database. To start searching, type your criteria on the left. You can also look through our selections, too.</p>
	</div>
</div>