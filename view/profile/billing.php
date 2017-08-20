<style>
	.billing-card{
		padding: 20px;
		background: #eee;
		margin-top: 35px;
	}
	tr{
		line-height: 35px;
	}
</style>


<h2>Billing</h2>

<div class="billing-card">
	<h3>Plan Details</h3>
	<table>
		<tr>
			<td><b>Your Plan: </b></td>
			<td></td>
		</tr>
		<tr>
			<td><b>Renewal Date: </b></td>
			<td></td>
		</tr>
		<tr>
			<td><a href="#">Swith Plan</a></td>
			<td><a href="#">Cancel Plan</a></td>
		</tr>
	</table>
</div>


<div class="billing-card">
	<h3>Payment Details</h3>
	<table>
		<tr>
			<td><b>Next Bill Date: </b></td>
			<td></td>
		</tr>
		<tr>
			<td><b>Payment Method: </b></td>
			<td></td>
		</tr>
		<tr>
			<td><a href="#">Edit Payment</a></td>
			<td></td>
		</tr>
		<tr>
			<td>
				<form action="<?php echo D_ROOT; ?>/view/profile/index.php" method="post">
					<input type="hidden" name="action" value="pkg-one-yearly">
				
					<script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $stripe['publishable_key']; ?>" data-amount="240000" data-description="51 - 200 Yearly Subscription"></script>
				</form>
			</td>
		</tr>
	</table>
</div>


<div class="billing-card">
	<h3>Billing History</h3>
	<table class="table table-striped table-hover">
		<tr>
			<th>Date</th>
			<th>Type</th>
			<th>Payment</th>
			<th>Print</th>
		</tr>
	</table>
</div>