
<style>
	.check{
		width: 245px;
		float: left;
	}
	.clear{
		clear: both;
	}
</style>
<?php $i=0; $encontrados = array(); ?>
<?php foreach ($permisos as $value) { ?>
	<?php if(in_array($value->idhijo, $modulos)) { ?>

	<?php if(!in_array($value->padre, $encontrados)){ ?>
		<?php if($i > 0){ ?>
		</div>
		<?php if($i%4==0){ ?>
		<div class="clear"></div>
		<?php } } ?>
	<?php $encontrados[] = $value->padre; $i++; ?>
	<div class="check">
		<h3 class="space15"> <?php echo $value->padre; ?></h3>
		<?php } ?>
		<?php if($value->estado == '1') { ?>
		<div class="checkbox">
			<label>
				<input id="modulo" type="checkbox" name="modulos[]" checked value="<?php echo $value->idhijo; ?>" class="grey">
				<?php echo $value->hijo; ?>
			</label>
		</div>

		<?php } else { ?>
		<div class="checkbox">
			<label>
				<input id="modulo" name="modulos[]" type="checkbox" value="<?php echo $value->idhijo; ?>" class="grey">
				<?php echo $value->hijo; ?>
			</label>
		</div>

		<?php } ?>
	<?php } else { ?>
		<?php if(!in_array($value->padre, $encontrados)){ ?>
			<?php if($i > 0){ ?>
			</div>
			<?php if($i%4==0){ ?>
			<div class="clear"></div>
			<?php } } ?>
			<?php $encontrados[] = $value->padre; $i++; ?>
			<div class="check">
			<h3 class="space15"> <?php echo $value->padre; ?></h3>
		<?php } ?>

		<div class="checkbox">
			<label>
				<input id="modulo" type="checkbox" name="modulos[]" value="<?php echo $value->idhijo; ?>" class="grey">
				<?php echo $value->hijo; ?>
			</label>
		</div>
	<?php } ?>

<?php } ?>





		<script>
			jQuery(document).ready(function() {
				Main.init();
				// SVExamples.init();
				TableData.init();

				Index.init();
			});
		</script>