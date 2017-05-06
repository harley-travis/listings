
<h1>Select a Stone</h1>

<div ng-controller="stoneData"> 
	<ul>
		<li ng-repeat="stone in stonetypes">
		
			<span href="#" id="stone-{{stone.name}}" class="stone_this">{{stone.name}}</span>
			<span class="displayPrice">{{'$' + stone.price }}</span>
			<img class="band-img" id="stone-{{$index+1}}" ng-src="{{stone.img}}">
			
		</li>
	</ul>
</div>

<div class="container clarity-options-menu" ng-controller="clarity">

	<h3>Select clarity</h3>
	<select ng-model="selectClarity" ng-options="x for x in clarity"></select>

</div><!-- clarity-options-menu -->

<a href="#color" class="btn btn-primary">Previous</a>
<a href="#cut" class="btn btn-primary">Next</a>

<script>
	
	$(document).on("click", ".stone_this", function() {
	  	
		var clickedStoneId = $(this).attr("id"); //locates the ID name from the class
		var stoneId = "#"+clickedStoneId; // adds the # sign to the ID
		var stoneIdValue = $(stoneId).html(); // grabs the value from the ID
		ringArray.push(ringArray['stone'] = stoneIdValue); // send value to ringArray

	  	console.log(stoneIdValue);
   
	});
</script>


