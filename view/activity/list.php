<?php 
require_once ("model/CategoryDAO.php"); 
$categories = CategoryDAO::getAll();
?>

<div class="container">
	<div class="box">
		<h4>Suggestions of Activities to STAY HOME</h4>
        <hr class="division">
        <?php foreach ($categories as $key => $value): ?>
        	<div class="row">
	        	<div class="col-sm-1">
	        		<img class="img-fluid" src="<?php echo $value->getIcon()?>">
	        	</div>
	        	<div class="col-sm-11">
	        		<h2><?php echo $value->getName()?></h2>
	        	</div>
        	</div>
        	<hr>
        <?php endforeach ?>
	</div>
</div>