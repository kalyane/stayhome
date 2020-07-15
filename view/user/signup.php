<div class="form">
	<img src="assets/images/logoSignup.png">
	<h1>Sign up</h1>
	<form  method="post" action="requests.php?class=user&action=signup">
		<div class="row">
		    <div class="form-group col-sm-6">
		    	<label>Name</label>
		      <input type="text" id="name" name="name" class="form-control">
		    </div>
		    <div class="form-group col-sm-6">
		    	<label>Surname</label>
		      <input type="text" id="surname" name="surname" class="form-control">
		    </div>
		</div>
	  <div class="form-group">
	  	<label>Email</label>
	    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
	  </div>
	  <div class="form-group">
		    <div class="">
		    	<label>Password</label>
		      <input type="password" class="form-control" id="password" name="password">
		    </div>
		</div>
		<button type="submit" class="btn btn-primary">Sign up</button> or <a href="?class=user&action=loginpage">Login</a>
	</form>
</div>