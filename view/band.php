
<h1>Select a Band</h1>

<div ng-controller="bandData"> 
	<ul>
		<li ng-repeat="(key,value) in bandtypes" >
		
		
			<!-- display the band data-->
			
			<span id="band-{{value.name}}" class="band_this priceAddID">{{value.name}}</span>
			
			<input type="checkbox" id="band-{{value.name}}" class="band_this priceAddID" value="{{value.price}}">
			
			<span class="displayPrice">{{'$' + value.price}}</span>
			<img class="img band-img" id="band-{{$index+1}}" ng-src="{{value.img}}">
			
			
			<ul>
				<li *ngFor="let option of bandtypes.productOptions">
				
				<!--
				-- LAST LEFT OFF:
				--_____________________
				-- I left off here. Trying to pull the child data in the json file to 
				-- display under the appropirate parent element.
				-- currently, it is only displaying the child info in the first parent
				-- and not displaying all child elements
				-->
				
				
					<!-- display the child data -->
					<span>{{option.child_name}}</span>
				
					<img class="img child-img" ng-src="{{option.child_img}}">
					
				</li>
			</ul>
			
			
			
			
			
			
			
			
			
		
<!--
			<span id="band-{{band.name}}" class="band_this priceAddID">{{band.name}}</span>
			
			<input type="checkbox" id="band-{{band.name}}" class="band_this priceAddID" value="{{band.price}}">
			
			<span class="displayPrice">{{'$' + band.price }}</span>
			<img class="img band-img" id="band-{{$index+1}}" ng-src="{{band.img}}">
-->
		
<!--
			<ul>
				<li ng-repeat="band in productOptions">
					<span>{{band.child_name}}</span>
					<img class="img child-img" ng-src="{{band.child_img}}">
				</li>
			</ul>
-->
		
		</li>
	</ul>	
	
</div>

<div class="container band-options-menu" ng-controller="band-size">

	<h3>Select Band Size</h3>
	<select ng-model="selectBandSize" ng-options="x for x in sizes"></select>

</div><!-- band-options-menu -->

<div class="container band-category" ng-controller="band-category">

	<!-- 
		** If category is selected, display ring options where the 
		** ring rotator display
		** INCLUDE.category file ??
		** another controller action in controller.php
	-->

	<h3>Shop By Category</h3>
	<select ng-model="bandCategory" ng-options="x for x in category"></select>
	
</div><!-- band-category -->

<a href="#color" class="btn btn-primary">Next</a>


<script>
	
	$(document).on("click", ".band_this", function() {
	  	
		// grab the unique id by selecting .band_this in repeat		
		var clickedId = $(this).attr("id"); //locates the ID name from the class
		var bandId = "#"+clickedId; // adds the # sign to the ID
		var bandIdValue = $(bandId).html(); // grabs the value from the ID
		ringArray.push(ringArray['band'] = bandIdValue); // send value to ringArray

		console.log(bandIdValue); // debug with console
	});
	
</script>


