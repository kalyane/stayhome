<div class="form">
	<img src="assets/images/logoSignup.png">
	<h1>Login</h1>
	<form  method="post" action="requests.php?class=user&action=login">
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
		<button type="submit" class="btn btn-primary">Login</button> or <a href="?class=user&action=signuppage">Sign up</a>
	</form>
</div>