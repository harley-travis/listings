
<h1>Insert an inscription</h1>

<div class="container"> 
	<span>*20 character limit</span>
	<input type="text" ng-model="inscription" placeholder="inscription">
	<div id="inscription" class="inscription">{{inscription | limitTo: 20 }}</div>
</div><!-- inscription Data -->

<a href="#cut" class="btn btn-primary">Previous</a>
<a href="#checkout" class="btn btn-primary">Finish</a>