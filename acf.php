<?php
// Homepage ACF template

// if any ACF rows are activated in admin:
if( have_rows('main_content') ): while( have_rows('main_content') ) : the_row();

//Main contect section
	if( get_row_layout() == 'homepage_row' ): ?>
        <section class="section-bg <?php var_dump( get_sub_field('dark_background') ); if( get_sub_field('dark_background') ){  echo "dark"; } else {} ?>" 
			<?php if( get_sub_field('row_background_image') ): ?> 
				style="background-image:url(<?php the_sub_field('row_background_image'); ?>);"
			<?php endif; ?> 
			<?php if( get_sub_field('row_background') ): ?> 
				style="background-color:<?php the_sub_field('row_background'); ?>;"
			<?php endif; ?>>
			<div class="container">
				<?php if( get_sub_field('title') ): ?> 
					<div class="row">
						<div class="col-sm-12">
							<h1><?php the_sub_field('title'); ?></h1>			
						</div>
					</div>
				<?php endif; ?>	 	
				<?php if( get_sub_field('subtitle') ): ?> 
					<div class="row">
						<div class="col-sm-12">
							<h3 id="subtitle-3"><?php the_sub_field('subtitle'); ?></h3>			
						</div>
					</div>
				<?php endif; ?>	
				<?php if( get_sub_field('content') ): ?> 
					<div class="row">
						<div class="col-sm-12">
							<?php the_sub_field('content'); ?>
						</div>
					</div>
				<?php endif; ?>
			</div> <!-- end container-->
       	</section> 
<?php 
// end Main contect section

// 6 blocks section
elseif( get_row_layout() == '6_things' ): ?>
	<section class="section-bg  <?php var_dump( get_sub_field('dark_background') ); if( get_sub_field('dark_background') ){  echo "dark"; } else {} ?>" 
	<?php if( get_sub_field('row_background_image') ): ?> 
		style="background-image:url(<?php the_sub_field('row_background_image'); ?>);"
	<?php endif; ?> 
	<?php if( get_sub_field('row_background') ): ?> 
		style="background-color:<?php the_sub_field('row_background'); ?>;"
	<?php endif; ?>>
	<div class="container">
		<?php if( get_sub_field('title') ): ?> 
			<div class="row">
				<div class="col-sm-12">
					<h1><?php the_sub_field('title'); ?></h1>			
				</div>
			</div>
		<?php endif; ?>	 
		<?php  if( have_rows('6_blocks') ): ?>
			<div class="six-blocks-row row">	
				<?php while ( have_rows('6_blocks') ) : the_row(); ?>
					<div class="col-sm-4">
						<a href="<?php the_sub_field('activity_link'); ?>">
							<div class="six-block">
								<h1 class="six-title"><?php the_sub_field('activity_title'); ?></h1>
								<img class="six-image" src="<?php  the_sub_field('activity_image'); ?>" />
								<div class="six-descbg"></div>
								<div class="six-desc">
									<?php  the_sub_field('activity_description'); ?>
								</div>
							</div> 
						</a>
					</div>
				<?php endwhile; ?>
			</div> <!-- end six-blocks-row row-->
		<?php  endif; ?>
		<?php if( get_sub_field('content') ): ?> 
			<div class="row">
				<div class="col-sm-12">
					<?php the_sub_field('content'); ?>
				</div>
			</div>
		<?php endif; ?>
	</div> <!-- end container -->
</section>
<?php 
// end 6 blocks section

// 3 steps section
elseif( get_row_layout() == '3_steps' ): ?>
<section class="section-bg  <?php var_dump( get_sub_field('dark_background') ); if( get_sub_field('dark_background') ){  echo "dark"; } else {} ?>" 
		<?php if( get_sub_field('row_background_image') ): ?> 
			style="background-image:url(<?php the_sub_field('row_background_image'); ?>);"
		<?php endif; ?> 
		<?php if( get_sub_field('row_background') ): ?> 
			style="background-color:<?php the_sub_field('row_background'); ?>;"
		<?php endif; ?>>
		<div class="blue-overlay"></div>
		<div class="container">
			<?php if( get_sub_field('title') ): ?> 
				<div class="row">
					<div class="col-sm-12 title-3">
						<h1 id="title-3"><?php the_sub_field('title'); ?></h1>			
					</div>
				</div>
			<?php endif; ?>	
			<?php if( get_sub_field('subtitle') ): ?> 
				<div class="row">
					<div class="col-sm-12">
						<h3 id="subtitle-3"><?php the_sub_field('subtitle'); ?></h3>			
					</div>
				</div>
			<?php endif; ?>	
			<?php  if( have_rows('3_blocks') ): ?>
				<div class="row">	
					<?php while ( have_rows('3_blocks') ) : the_row(); ?>
						<div class="col-sm-4 step">
							<div class="s-t">
								<div class="step-top">
									<span class="counts"><?php the_sub_field('step_count'); ?></span>
									<h1><?php the_sub_field('Step_title'); ?></h1>
								</div>
								<div class="step-border-circle"></div>
								<img class="step-image" src="<?php the_sub_field('step_image'); ?>" />
							</div>
							<div class="step-botton">
								<h3><?php the_sub_field('step_description'); ?></h3>
							</div>
						</div>
					<?php endwhile; ?>
				</div> 
			<?php endif; ?>
		</div> <!-- end container-->
</section>
<?php 
// end 3 steps section

// Reviews section      	
elseif( get_row_layout() == 'reviews-all' ): ?>
<section class="section-bg <?php var_dump( get_sub_field('dark_background') ); if( get_sub_field('dark_background') ){  echo "dark"; } else {} ?>" 
    <?php if( get_sub_field('row_background_image') ): ?> 
    	style="background-image:url(<?php the_sub_field('row_background_image'); ?>);"
    <?php endif; ?> 
    <?php if( get_sub_field('row_background') ): ?> 
    	style="background-color:<?php the_sub_field('row_background'); ?>;"
    <?php endif; ?>>
	<div class="container">
		<?php if( get_sub_field('title') ): ?> 
			<div class="row">
				<div class="col-sm-12">
					<h1><?php the_sub_field('title'); ?></h1>			
				</div>
			</div>
		<?php endif; ?>	 
		<?php
		// counter to show even and odd reviews differently
			$counter = 0; 
			global $post;
			$args = array( 'post_type'=> 'review');
			$myposts = get_posts( $args );
			foreach( $myposts as $post ){ setup_postdata($post); ?>				
				<div class="row <?php  $counter++; if($counter % 2 == 0) { echo 'second-review';} ?>">		
					<div class="col-sm-12 review">
						<div class="row">
							<div class="col-sm-4 review-image <?php if($counter % 2 == 0) { echo 'col-md-push-8';} ?>"> 
								<?php the_post_thumbnail('small'); ?>
							</div>
							<div class="col-sm-8 col-sm-offset-0 <?php if($counter % 2 == 0) { echo 'col-md-pull-4';} ?>">
								<h2><?php the_title(); ?></h2>
								<div class="row">
									<div class="col-sm-11"><hr></div>
									<div class="col-sm-2 hidden-xs">
										<img class="rew-img" src="<?php bloginfo('template_url') ; ?>/images/icon-quote-mark.png" />
									</div>
									<div class="col-sm-9">
										<div class="review-content">
											<?php the_content(); ?>																									</div>
										<?php if( get_field('customerss_name') ): ?> 
											<span class="author"><?php echo the_field('customerss_name'); ?></span>
										<?php endif; ?>
									</div>
								</div> <!-- end row -->	
							</div> <!-- col-sm-8 col-sm-offset-0 -->	
						</div> <!-- end row -->	
					</div> <!-- col-sm-12 review -->	
				</div> <!-- end row -->				
		<?php } wp_reset_postdata(); ?> 
	</div>
</section> 
<?php  endif;

//end loop, after all sections are checked:
endwhile; else : endif; ?>