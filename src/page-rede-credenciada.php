<?php

get_header();

do_action( 'hestia_before_single_page_wrapper' );

?>
<div class="<?php echo hestia_layout(); ?>">
	<div class="blog-post <?php esc_attr( $class_to_add ); ?>">
		<div class="container">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
			endif;
				?>
			<div class="col-md-8 page-content-wrap  col-md-offset-2">
				<div class="row">
					<div class="col-md-12">
					<a href="#" id="get-data">Get JSON data</a>
    				<div id="show-data"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php get_footer(); ?>
