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
        	<div class="row">
        		<?php 
    			require_once  ("model/SuggestionDAO.php");
    			$suggestions = SuggestionDAO::getByIdcategory($value->getId());
    			foreach ($suggestions as $key2 => $value2) { ?>
    				<div class="col-sm-3">
    					<div class="act-box">
		        			<img src="<?php echo $value2->getIcon() ?>">
		        			<h4><?php echo $value2->getName() ?></h4>
		        		</div>
    				</div>
    			<?php }
    			?>
        	</div>
        	<hr>
        <?php endforeach ?>
	</div>
</div>
