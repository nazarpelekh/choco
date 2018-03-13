<div class="burger-button">
	<span class="burger-top"></span>
	<span class="burger-bottom"></span>
</div>
<div class="craft-box-content" data-attr="box1">
	<div class="top-content clearfix">
		<table>
			<tr>
				<th>Lemon</th>
				<th>1</th>
			</tr>
			<tr>
				<th>Cracken</th>
				<th>2</th>
			</tr>
			<tr>
				<th>Truffle</th>
				<th>2</th>
			</tr>
			<tr>
				<th>Rasberry Crumble Long Name</th>
				<th>2</th>
			</tr>
		</table>
		<table>
			<tr>
				<th>Truffle</th>
				<th>10</th>
			</tr>
			<tr>
				<th>Rasberry Crumble</th>
				<th>2</th>
			</tr>
			<tr>
				<th>Champagne Liquer</th>
				<th>10</th>
			</tr>
			<tr>
				<th>Rum Liquer</th>
				<th>2</th>
			</tr>
		</table>
	</div>
	<p></p>
	<p>Piece: &nbsp; 100</p>
	<p class="text-extrabold">Piece: &nbsp; 100</p>
</div>
<div class="craft-box-content" data-attr="box2">
	<div class="top-content clearfix">
		<table>
			<tr>
				<th>Lemon</th>
				<th>1</th>
			</tr>
			<tr>
				<th>Cracken</th>
				<th>2</th>
			</tr>
			<tr>
				<th>Truffle</th>
				<th>2</th>
			</tr>
			<tr>
				<th>Rasberry Crumble Long Name</th>
				<th>2</th>
			</tr>
		</table>
		<table>
			<tr>
				<th>Truffle</th>
				<th>10</th>
			</tr>
			<tr>
				<th>Rasberry Crumble</th>
				<th>2</th>
			</tr>
			<tr>
				<th>Champagne Liquer</th>
				<th>10</th>
			</tr>
			<tr>
				<th>Rum Liquer</th>
				<th>2</th>
			</tr>
		</table>
	</div>
	<p></p>
	<p>Piece: &nbsp; 100</p>
	<p class="text-extrabold">Piece: &nbsp; 100</p>
</div>
<div class="menu">
	<div class="logo-cont">
		<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg" alt="">
	</div>
	<nav>
		<?php wp_nav_menu(array('container' => false, 'items_wrap' => '%3$s', 'theme_location'  => 'main_menu')); ?>
	</nav>
	<div class="shopping-bag-section">
		<a href="" class="shopping-bag">
			<img src="<?php echo get_template_directory_uri() ?>/assets/images/shop-icon.svg" alt="">
			<span class="number">20</span>
			<span>Shopping Bag</span>
		</a>

		<div class="shopping-container">
			<div class="item">
				<div class="delete-button"><span class="close"></span></div>
				<a href="" class="item-name text-bold text-small js-show-box-content" id="box1">Custom Box (Small)</a>
				<p class="quantity">12 piece Box</p>
				<p class="price">
					<span class="note">$24</span>
					<span class="coin">00</span>
				</p>
			</div>
			<div class="item">
				<div class="delete-button"><span class="close"></span></div>
				<a href="" class="item-name text-bold text-small js-show-box-content" id="box2">Custom Box (Small)</a>
				<p class="quantity">12 piece Box</p>
				<p class="price">
					<span class="note">$24</span>
					<span class="coin">00</span>
				</p>
			</div>
			<a href="" class="show-more text-small">Show 3 more</a>
		</div>
	</div>
	<div class="socials">
		<a href="<?php the_field('face','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/facebook.svg" alt=""></a>
		<a href="<?php the_field('twit','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/twitter.svg" alt=""></a>
		<a href="<?php the_field('inst','option') ?>" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/assets/images/instagram.svg" alt=""></a>
	</div>
</div>