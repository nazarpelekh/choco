<?php if ($posters = get_field('posters','option' )) { ?>
	<?php foreach ($posters as $p) { ?>
		<div class="poster" style="background: url(<?php echo $p['image'] ?>) center/cover">
			<div class="info">
				<span class="text-xlarge text-bold"><?php echo $p['title'] ?></span>
				<?php if ( $p['text'] ) {
					echo '<p class="text-large text-bold">'.$p['text'].'</p>';
				} ?>
				<a href="<?php echo $p['link'] ?>" class="button white">Get Started</a>
			</div>
		</div>
	<?php } ?>
<?php } ?>