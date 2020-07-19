<div class="container">
	<div class="box">
		<h4>Daily Journal</h4>
		<hr class="division">
		<form method="post" action="requests.php?class=journal&action=add">
			<div class="form-group">
			    <label for="exampleFormControlTextarea1">How was your day?</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="description"></textarea>
			    <input type="hidden" id="custId" name="iduser" value=<?php echo $_SESSION["user"]->getId(); ?>>
			    <input type="hidden" id="custId" name="date" value=<?php echo date("Y/m/d"); ?>>
			</div>
			<button type="submit" class="btn btn-primary">Add Journal</button>
		</form>
	</div>
</div>