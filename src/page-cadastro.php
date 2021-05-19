<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Hestia
 * @since Hestia 1.0
 * @modified 1.1.30
 */

 $source = 'http://sistema.cartaoamigo.com.br/formulario-associado'; // Produção
//  $source = 'http://sistema-dev.cartaoamigo.com.br/formulario-associado'; // Desenvolvimento

 if (isset($_GET['plano'])) {
	$source .= '?plano=' . $_GET['plano'];
  }

get_header();

$wrap_class = apply_filters( 'hestia_filter_index_search_content_classes', 'col-md-8 blog-posts-wrap' );

do_action( 'hestia_before_index_wrapper' ); ?>

<div class="<?php echo hestia_layout(); ?>">
	<div class="hestia-blogs" data-layout="<?php echo esc_attr( $sidebar_layout ); ?>">
		<div class="container" id="associe-se">
			<?php

			do_action( 'hestia_before_index_posts_loop' );
			$paged         = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$posts_to_skip = ( $paged === 1 ) ? apply_filters( 'hestia_filter_skipped_posts_in_main_loop', array() ) : array();

			?>
			<div class="row">
				<div class="<?php echo esc_attr( $wrap_class ); ?>">
					<?php
					do_action( 'hestia_before_index_content' );
					?>
				</div>
                <div class="ca-loading">
                    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
				<div class="md-col-12">
					<iframe  id="formCadastro" src="<?php echo $source; ?>"></iframe>
				</div>
			</div>
		</div>
	</div>
	<script>
		(function($){
			$('#formCadastro').on( 'load', function() {
				$('.ca-loading').hide();
			} );
}		)(jQuery)
	</script>
	<?php do_action( 'hestia_after_archive_content' ); ?>

<?php get_footer(); ?>
