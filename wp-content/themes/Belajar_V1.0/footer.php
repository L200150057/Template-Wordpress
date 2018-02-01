<div class="container">
	<hr/>
	<div class="row" id="navigation-footer-row">
		<div class="col-sm-4">
			<h2 class="widgettitle">About</h2>
			<p class="about"><?php echo get_option('about'); ?></p>
		</div>
		<div class="col-sm-4"> 
			<?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>
			<h2 class="widgettitle">Popular Tags</h2>
			<ul>
			<li><?php wp_tag_cloud( 'smallest=11&largest=11&number=10' ); ?></li>
			</ul>
			<?php endif; ?>
		</div>
		<div class="col-sm-4">
			<h2 class="widgettitle">Navigation</h2>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div>
	</div>
</div>
<footer class="blog-footer">
  <p>Copyright &copy; <?php bloginfo('name'); ?> <?php echo Date('Y'); ?> - Design By Muhammad Yuliato</p>
  <!-- Thanks for using this theme, its 100% FREE but please do not Remove A Copyright, I Believe you're a good person. -->
  <!-- Muhammad Yulianto :D -->
</footer>
<?php wp_footer(); ?>

<!-- Custom Javascript -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/custom.js'; ?>"></script>

</body>
</html>
