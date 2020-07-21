<div class="container">
	<div class="box">
		<button style="float: right;" class="btn btn-primary" id="add">+ Add Journal</button>
		<h4>Daily Journal</h4>
		<hr class="division">
		<?php 
		for ($x = 0; $x < count($journal); $x++) {
			$date = strtotime($journal[$x]->getDate());
			$new_date = date('F j, Y', $date);
			echo '<div class="journal">
					<h5>'.$new_date.'</h5>
					<p>'.$journal[$x]->getDescription().'</p>
				</div>
				<hr>';
		}
		 ?>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#add").click(function(){
            window.location.href="?class=journal&action=addpage";
        });
    });
</script>