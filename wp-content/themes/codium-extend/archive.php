<?php get_header( ); ?>
	<div id="container">
		<div id="content" class="two-thirds column">
		
			<h1 class="page-title">
			<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: <span>%s</span>', 'codium_extend' ), get_the_date() ); ?>
			<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: <span>%s</span>', 'codium_extend' ), get_the_date('F Y') ); ?>
			<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: <span>%s</span>', 'codium_extend' ), get_the_date('Y') ); ?>
			<?php else : ?>
							<?php _e( 'Blog Archives', 'codium_extend' ); ?>
			<?php endif; ?>
			</h1>
			<div class="linebreak clear"></div>	

			<?php if (have_posts()) : ?>  
			<?php rewind_posts(); while (have_posts()) : the_post(); ?>

			<span <?php body_class('cat-links'); ?>><?php printf(__('%s', 'codium_extend'), get_the_category_list(' ')) ?></span>
			
			<!-- Begin post -->
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf(__('Link to %s', 'codium_extend'), esc_html(get_the_title(), 1)) ?>" rel="bookmark"><?php the_title() ?></a></h2>
				<div class="entry-date"><?php unset($previousday); printf(__('%1$s &#8211; %2$s', 'codium_extend'), the_date('', '', '', false), get_the_time()) ?></div>
									
						<div class="entry-content">
					<?php the_content(''.__('read more <span class="meta-nav">&raquo;</span>', 'codium_extend').''); ?>
					<?php wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'codium_extend'), "</div>\n", 'number'); ?>
						</div>
						<div class="clear"></div>
						<div class="entry-meta">
							<?php the_tags(__('<span class="tag-links">Tags ', 'codium_extend'), ", ", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n") ?>
							<?php edit_post_link(__('Edit', 'codium_extend'), "\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t<span class=\"meta-sep\">|</span>\n"); ?>
							<a href="<?php the_permalink() ?>" title="Permalink to <?php the_title() ?>" rel="bookmark"><?php printf(__('Permalink', 'codium_extend')) ?></a> <span class="meta-sep">|</span>
							<span class="comments-link"><?php comments_popup_link(__('Comment (0)', 'codium_extend'), __('Comment (1)', 'codium_extend'), __('Comments (%)', 'codium_extend')) ?></span>
						</div>
						
			</div>
			<!-- End post -->

<div class="linebreak clear"></div>

<?php endwhile; endif ?>

<div class="center">			
	<?php if(function_exists('wp_pagenavi')) { 
		wp_pagenavi();
	} else {?>
		<div class="navigation mobileoff"><p><?php posts_nav_link(); ?></p></div>
		 <?php } ?>  
		<div class="navigation_mobile"><p><?php posts_nav_link(); ?></p></div> 
</div>

		</div><!-- #content -->
	</div><!-- #container -->
	
<?php get_sidebar() ?>
<?php get_footer() ?>