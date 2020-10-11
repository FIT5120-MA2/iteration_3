<?php
/**
 * Saraswati Blog Author widget
 *
 * @since 1.0.0
 */

if (!class_exists('Saraswati_Blog_Recent_Post_Widget')) :
    /**
     * Social widget class.
     */
    class Saraswati_Blog_Recent_Post_Widget extends WP_Widget
    {
        /**
         * Constructor.
         */
        function __construct()
        {
            $opts = array(
                'classname'   => 'saraswati-blog-recent-widget',
                'description' => esc_html__('Saraswati Blog Recent Post Widget', 'saraswati-blog'),
            );

            parent::__construct('saraswati-blog-recent-post', esc_html__('Saraswati Blog Recent Post Widget', 'saraswati-blog'), $opts);
        }

     
      /**
         * Echo the widget content.
         */
        public function widget( $args, $instance ){
        if(!empty($instance)){ 
       
         $title       = apply_filters( 'widget_title', !empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
         $no_of_post  = absint( $instance['no_of_post']);
             

          if(!empty($title) || !empty($no_of_post) )
          {
             echo $args['before_widget'];
          ?>

                  <h3 class="widget-title"><span><?php echo esc_html($title); ?></span></h3>
                  <div class="shape2"></div>                  
                  <div class="recent-posts">
                    <ul>
                      
                    <?php
                       $query_args =array('post_type'=>'post','posts_per_page'=>$no_of_post,'order'=>'desc');
                       $recent_posts = new WP_Query($query_args);
                       
                       if ( $recent_posts->have_posts() ) :
                            while ( $recent_posts->have_posts() ) :
                                $recent_posts->the_post();
                      ?>
 
                          <li>
                              <a href="<?php the_permalink(); ?>">
                                 <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive' ) ); ?>
                                <?php the_title(); ?>
                              </a><span class="post-meta"> <?php saraswati_blog_posted_on(); ?></span>
                          </li>
          
                      <?php  endwhile; endif;wp_reset_postdata(); ?>


                    </ul>
                  </div>
            
          <?php
             echo $args['after_widget'];
        }
     }
   } 
        

     public function update( $new_instance, $old_instance ){
        $instance                = $old_instance;
        $instance['title']       = sanitize_text_field( $new_instance['title'] );
        $instance['no_of_post']  = absint( $new_instance['no_of_post'] );
       
        return $instance;
     }

        /**
         * Output the settings update form.
         */
        public function form($instance ){
          ?>
          <p>
                <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><strong><?php _e( 'Title', 'saraswati-blog' ); ?></strong></label><br />
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" value="<?php
                 if (isset($instance['title']) && $instance['title'] != '' ) :
                   echo esc_attr($instance['title']);
                  endif;

                  ?>" class="widefat" />
            </p>

             <p>
                 <label for="<?php echo $this->get_field_id('no_of_post'); ?>"><strong><?php _e( 'Number of posts to show:', 'saraswati-blog' ); ?></strong></label><br />
                 <input type="number" name="<?php echo $this->get_field_name('no_of_post'); ?>" id="<?php echo $this->get_field_id('no_of_post'); ?>" value="<?php 
                   if (isset($instance['no_of_post']) && $instance['no_of_post'] != '' ) :
                    echo esc_html( $instance['no_of_post'] ); 
                    else :
                      echo "2";
                 endif;
                 ?>" class="widefat" />
                 <span class="small"></span>
              </p>

            
          <?php
     }
}
endif;

add_action( 'widgets_init', 'saraswati_blog_recenet_post_widget' ); 
function saraswati_blog_recenet_post_widget(){     
    register_widget( 'Saraswati_Blog_Recent_Post_Widget' );
}