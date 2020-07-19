<?php require_once 'model/UserDAO.php'; ?>

<div class="container">
	<div class="addactivity">
		<div class="form">
			<h1>Add New Activity</h1>
			<form  method="post" action="requests.php?class=activity&action=add">
				<div class="row">
				    <div class="form-group col-sm-6">
				    	<label>Name</label>
				      <input type="text" id="name" name="name" class="form-control">
				    </div>
				    <div class="form-group col-sm-6">
					    <label for="exampleFormControlSelect1">Category</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="idcategory">
					    	<?php 
					    	for ($x = 0; $x < count($categories); $x++) {
					    		echo "<option value=".$categories[$x]->getId().">".$categories[$x]->getName()."</option>";
					    	}
					    	 ?>
					    </select>
					  </div>
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
					  	<label for="example-time-input">Time Starts</label>
						<input class="form-control" type="time" step="60" id="example-time-input" name="timestart">
				 	 </div>
				 	 <div class="form-group col-sm-6">
					  	<label for="example-time-input">Time Finishes</label>
						<input class="form-control" type="time" step="60" id="example-time-input" name="timefinish">
				 	 </div>
				</div>
			  
			    <div class="form-group">
				    <label for="exampleFormControlTextarea1">Description</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
				</div>
				<input type="hidden" id="custId" name="iduser" value="<?php echo $_SESSION["user"]->getId(); ?>">
				<button type="submit" class="btn btn-primary">Add Activity</button>
			</form>
		</div>
	</div>
</div>