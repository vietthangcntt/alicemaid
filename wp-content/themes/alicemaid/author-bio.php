<div class="author-info">
	<div class="avatar">
		<?php echo get_avatar(get_the_author_meta('ID')); ?>
	</div>
	<div class="info">
		<div class="title">
			<span class="author-name">
				<?php printf('<a href="%1$s">%2$s</a>',get_author_posts_url(get_the_author_meta('ID')),get_the_author()); ?>
			</span>
			<div id="social">
				<ul>
					<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
				</ul>
			</div>
		</div>
		<p><?php echo get_the_author_meta( 'description' ); ?></p>
	</div>

</div>