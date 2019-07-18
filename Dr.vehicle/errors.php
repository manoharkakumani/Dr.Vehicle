<?php  if (count($errors) > 0) : ?>
	<div style="color: #464a92;">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error;?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>

