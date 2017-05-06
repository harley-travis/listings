
<h1>Select a Stone Cut</h1>

<div ng-controller="cutData"> 
	<ul>
		<li ng-repeat="cut in cuttypes">
			
			
			<span href="#" id="cut-{{cut.name}}" class="cut_this">{{cut.name}}</span>
			<span class="displayPrice">{{'$' + cut.price }}</span>
			<img class="band-img" id="cut-{{$index+1}}" ng-src="{{cut.img}}">
			
		</li>
	</ul>
</div>

<a href="#stone" class="btn btn-primary">Previous</a>
<a href="#inscription" class="btn btn-primary">Next</a>


<script>
	
	$(document).on("click", ".cut_this", function() {
	  	
		var clickedcutId = $(this).attr("id"); //locates the ID name from the class
		var cutId = "#"+clickedcutId; // adds the # sign to the ID
		var cutIdValue = $(cutId).html(); // grabs the value from the ID
		ringArray.push(ringArray['cut'] = cutIdValue); // send value to ringArray

	  	console.log(cutIdValue);
   
	});
</script>

