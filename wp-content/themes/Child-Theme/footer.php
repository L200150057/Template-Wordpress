<div class="container">
	<hr/>
	<div class="row" id="navigation-footer-row">
		<div class="col-sm-4">
			<h2 class="widgettitle">About</h2>
		</div>
		<div class="col-sm-4"> 
			<?php the_widget( 'WP_Widget_Categories', 'title', $args ); ?> 
		</div>
		<div class="col-sm-4">
			<h2 class="widgettitle">Navigation</h2>
			<?php wp_nav_menu(); ?>
		</div>
	</div>
<footer class="blog-footer">
  <p>Copyright &copy; <?php bloginfo('name'); ?> <?php echo Date('Y'); ?> - Design By Muhammad Yuliato</p>
</footer>
</div>
<?php wp_footer(); ?>

<!-- Custom Javascript -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/custom.js'; ?>"></script>

</body>
</html>
