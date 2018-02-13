<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
			<ul class="post-meta col-md-12">
				<li><?php the_terms( $post->ID, 'country', 'Countries: ', ' / ' ); ?></li>
				<li><?php the_terms( $post->ID, 'genre', 'Genres: ', ' / ' ); ?></li>
				<li>Ticket Price: <?php echo get_post_meta(get_the_ID(), 'film-ticket-price', true); ?></li>
				<li>Release Date: <?php echo get_post_meta(get_the_ID(), 'film-release-date', true); ?></li>
			</ul>
			<?php unite_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>