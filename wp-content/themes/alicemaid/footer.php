 	</div>
	<footer class="footer" id="footer">
		<div class="footer_side">
			<div class="container">
				<?php 	
				if(is_active_sidebar('footer-sidebar')){
					dynamic_sidebar('footer-sidebar');
				}
				else{
					_e('No Sidebar');
				} ?>
				
			</div>
		</div>
		<div class="footer-down">
			<div class="footer-icon">
				<div class="container">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="copyright">
				<div class="container">
					<?php echo date('Y'); ?> <?php bloginfo( 'sitename' ); ?>. <?php _e('Designed with <span><i class="fa fa-heart-o" aria-hidden="true"></i></span> by haintheme', 'AliceMaid'); ?>
				</div>
			</div>	
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>