<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage Saraswati Blog
 */

if (!function_exists('saraswati_blog_breadcrumb_type')) :

    function saraswati_blog_breadcrumb_type($post_id)
    {
       $saraswati_blog_theme_options   = saraswati_blog_get_theme_options();
       $breadcrumb_type       = $saraswati_blog_theme_options['breadcrumb_option'];

        if(  $breadcrumb_type == 'simple' )
        {
?>    
<!--breadcrumb-->
<div class="col-sm-12 col-md-12 ">
  <div class="breadcrumb">
    <?php 
        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false
        );
       global $saraswati_blog_theme_options;

        $saraswati_blog_theme_options  = saraswati_blog_get_theme_options();
        
        $saraswati_blog_you_are_here_text        = esc_html( $saraswati_blog_theme_options['saraswati-blog-breadcrumb-text-option'] );
        if( !empty( $saraswati_blog_you_are_here_text ) ){
            $saraswati_blog_you_are_here_text = "<span class='breadcrumb'>".$saraswati_blog_you_are_here_text."</span>";
        }
        echo "<div class='breadcrumbs init-animate clearfix'><h3>".$saraswati_blog_you_are_here_text."</h3><div id='saraswati-blog-breadcrumbs' class='saraswati-blog-breadcrumbs clearfix'>";
        breadcrumb_trail( $breadcrumb_args );
        echo "</div></div>";
      // breadcrumb_trail(); 


     ?>
  </div>
</div>
<!--end breadcrumb-->    
<?php  
        }  
    }
endif;

add_action('saraswati_blog_breadcrumb_type', 'saraswati_blog_breadcrumb_type', 10, 1);    