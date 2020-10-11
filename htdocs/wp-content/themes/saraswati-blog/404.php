<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Saraswati_Blog
 */

get_header();
?>

 <div class="main-container">
      <div class="container">
        <div class="row">
            <div class="col-md-8 content-wrap">

            	<article>
                  <div class="page-404 blog-post post-content text-center fourclass">
                    <h2 class="ext-large color-text"><?php esc_html_e( '404', 'saraswati-blog' ); ?></h2>
                    <h3><span class="color-text"><?php esc_html_e( 'Sorry', 'saraswati-blog' ); ?></span><?php esc_html_e( ', The page was not found', 'saraswati-blog' ); ?></h3>
                     <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'saraswati-blog' ); ?></p>
                    <div class="search-form">
                      <div class="row">
	                       <?php 
                              // Load Search Form
                              get_search_form(); 
                          ?>
                      </div>
                    </div>
                  </div><!-- .404-page -->
                </article>

            </div>
          <div class="col-md-4 sidebar-wrap" id="secondary">
			 	<?php get_sidebar(); ?>
			</div> 	      

<?php
get_footer();
