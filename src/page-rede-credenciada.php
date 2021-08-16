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
				<form>
					<fieldset>
						<legend>Encontre a clínica mais próxima de você</legend>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label for="lista-de-especialidades">Especialidade</label>
									<select class="form-control" id="lista-de-especialidades">
										<option>...</option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="lista-de-ufs">UF</label>
									<select class="form-control" id="lista-de-ufs">
										<option>...</option>
									</select>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="lista-de-cidades">Cidades</label>
									<select class="form-control" id="lista-de-cidades">
										<option>...</option>
									</select>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	
	<?php get_footer(); ?>
