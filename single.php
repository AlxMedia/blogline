<?php get_header(); ?>

<section class="content">
	<div class="pad group">
		
		<?php while ( have_posts() ): the_post(); ?>
			<article <?php post_class(); ?>>	
				
				<h1 class="post-title"><?php the_title(); ?></h1>
				
				<ul class="post-meta group">
					<li><?php the_category(' / '); ?></li>
					<li><i class="fa fa-clock-o"></i><?php the_time('j M, Y'); ?></li>
					<?php if ( comments_open() ): ?><li><a href="<?php comments_link(); ?>"><i class="fa fa-comment"></i><?php comments_number( '0', '1', '%' ); ?></a></li><?php endif; ?>
				</ul><!--/.post-meta-->
				
				<?php if( get_post_format() ) { get_template_part('inc/post-formats'); } ?>
				
				<div class="clear"></div>
				
				<div class="entry">	
					<?php the_content(); ?>
					<?php wp_link_pages(array('before'=>'<div class="post-pages">'.__('Pages:','blogline'),'after'=>'</div>')); ?>
					<div class="clear"></div>				
				</div><!--/.entry-->
				
			</article><!--/.post-->				
		<?php endwhile; ?>
		
		<div class="clear"></div>
		
		<?php the_tags('<p class="post-tags"><span>'.__('Tags:','blogline').'</span> ','','</p>'); ?>
		
		<?php if ( ot_get_option('sharrre') != 'off' ) { get_template_part('inc/sharrre'); } ?>
		
		<div class="clear"></div>
		
		<?php if ( ( ot_get_option( 'author-bio' ) != 'off' ) && get_the_author_meta( 'description' ) ): ?>
			<div class="author-bio">
				<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
				<p class="bio-name"><?php the_author_meta('display_name'); ?></p>
				<p class="bio-desc"><?php the_author_meta('description'); ?></p>
				<div class="clear"></div>
			</div>
		<?php endif; ?>
		
		<?php if ( ot_get_option( 'post-nav' ) == 'content') { get_template_part('inc/post-nav'); } ?>
		
		<?php if ( ot_get_option( 'related-posts' ) != '1' ) { get_template_part('inc/related-posts'); } ?>
		
		<?php if ( ot_get_option('post-comments') != 'off' ) { comments_template('/comments.php',true); } ?>
		
	</div><!--/.pad-->
</section><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>