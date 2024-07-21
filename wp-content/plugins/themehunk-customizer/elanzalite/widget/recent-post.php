<?php
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * ElanzaLite Recent Post Widget
 * This widget shows latest place post
 */
class THunkcustomizer_RecentPost extends WP_Widget {
    /** constructor */
    function __construct() {
        $widget_ops = array(
            'classname' => 'elanzalite_recent_posts_widget',
            'description' => 'Display recent post in sidebar with thumbnail images'
        );
        parent::__construct('advanced-recent-posts', 'THunk : Recent Post With Thumbnail', $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $linkmore = '';
        $title = apply_filters('widget_title', empty($instance['title']) ? 'Recent Post' : $instance['title'], $instance, $this->id_base);

        $ptitle = isset( $instance['title'])? $instance['title']: 'Recent Post';
        $number = isset($instance['number'])? absint($instance['number']): 5;

        $excerpt_length = isset($instance['excerpt_length'])? absint($instance['excerpt_length']):5;

        $default_sort_orders = array('date', 'title', 'comment_count', 'rand');
        // by default, display latest first

        $sort_by = isset($instance['sort_by']) ? esc_attr($instance['sort_by']) : 'date';      
        $sort_order='DESC';
        //Excerpt more filter
        $new_excerpt_more = create_function('$more', 'return " ";');
        add_filter('excerpt_more', $new_excerpt_more);
        // Excerpt length filter
        $new_excerpt_length = create_function('$length', "return " . $excerpt_length . ";");
        if (isset($instance["excerpt_length"])){
            add_filter('excerpt_length', $new_excerpt_length);
        }
        // post info array.
        $my_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
              'meta_query' => array(
         array(
            'key' => '_thumbnail_id'
         )
      ),
            'ignore_sticky_posts' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $number, 
          
        );
        $excerpt_readmore = '[...]';     
        $adv_recent_posts = new WP_Query($my_args);
//       echo "<pre>"; print_r($adv_recent_posts); echo "</pre>";

        echo $before_widget;
        ?>
        <!--Start Review Thumb-->
        <div class="recent-widget">
        <div class="recent-post">
           <h4 class="widgettitle"><?php echo apply_filters('widget_title',$ptitle ); ?></h4 class="widgettitle">
            <div class="sidebar-tip"></div>
            <?php
             if ( $adv_recent_posts->have_posts() ) { 
            while ($adv_recent_posts->have_posts()) { $adv_recent_posts->the_post();
                   $link_more = ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . $excerpt_readmore . '</a>';
                              ?>      
                <!--Start Review Element-->
                <div class="th-widget-recent-post">
                      <?php
                      if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                      <a href="<?php esc_url(get_permalink()); ?>"> <?php the_post_thumbnail('elanzalite-recent-post-thumb'); ?></a>

                      <?php  } ?>
                      
                                  <div class="th-recent-post">
                        <h5 class="r_title"><a  href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title_attribute(); ?>" class="post-title"><?php if (strlen($adv_recent_posts->post_title) > 18) {
                        echo substr(the_title($before = '', $after = '', FALSE), 0, 18) . '...'; } else {
                                   the_title();
                            } ?></a></h5>
                           <ul class="th-recent-meta">
                             <?php if (isset($instance['date'])) : ?>
                            <li class="post-date"><?php the_time( get_option('date_format') ); ?></li>
                            <?php endif; ?>
                            </ul>

                            <?php if (isset($instance['excerpt']) && $instance['excerpt']) : ?>
                            <div class="post-entry">                   
                            <?php if (isset($instance['excerpt']) && $instance['excerpt']) : ?>                            
                                    <p><?php echo get_the_excerpt() . $link_more; ?> </p>
                            <?php endif; ?>
                            </div>
                        <?php endif; ?>               
                          
                    </div>
                </div>
                            <div class="clearfix"></div>
                <!--End Review Element-->  

            <?php
        }

    } wp_reset_postdata();
        ?>
        </div>
         </div>
        <!--End Review Thumb-->
        <?php
        echo $after_widget;
        remove_filter('excerpt_length', $new_excerpt_length);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['sort_by'] = esc_attr($new_instance['sort_by']);
        $instance['show_type'] = esc_attr($new_instance['show_type']);
        $instance['number'] = absint($new_instance['number']);
        $instance['date'] = esc_attr($new_instance['date']);
        $instance['comment_num'] = esc_attr($new_instance['comment_num']);
        $instance["excerpt_length"] = absint($new_instance["excerpt_length"]);
        $instance["excerpt"] = esc_attr($new_instance["excerpt"]);
        return $instance;
    }

    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Blog Post';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        $show_type = isset($instance['show_type']) ? esc_attr($instance['show_type']) : 'post';
        $excerpt_length = isset($instance['excerpt_length']) ? absint($instance['excerpt_length']) : 5;
     
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','elanzalite'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p style="display:none;">
            <label for="<?php echo $this->get_field_id("sort_by"); ?>">
        <?php _e('Post Sort','elanzalite'); ?>:
                <select id="<?php echo $this->get_field_id("sort_by"); ?>" name="<?php echo $this->get_field_name("sort_by"); ?>">
                    <option value="date"<?php selected($instance["sort_by"], "date"); ?>><?php _e('Recent Sort Post','elanzalite'); ?></option>
                    <option value="title"<?php selected($instance["sort_by"], "title"); ?>><?php _e('Title Sort Post','elanzalite'); ?></option>
                    <!-- <option value="comment_count"<?php selected($instance["sort_by"], "comment_count"); ?>><php echo 'R_N_CMT'; ?></option> -->
                    <option value="rand"<?php selected($instance["sort_by"], "rand"); ?>><?php _e('Random Sort Post','elanzalite'); ?></option>
                </select>
            </label>
        </p>
        <p>
             <label for="<?php echo $this->get_field_id("excerpt"); ?>">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("excerpt"); ?>" name="<?php echo $this->get_field_name("excerpt"); ?>"<?php if(isset($instance["excerpt"])){ checked((bool) $instance["excerpt"], true); } ?> />
        <?php _e('Show Post Excerpt','elanzalite'); ?>
            </label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id("excerpt_length"); ?>">
                <?php _e('Post Excerpt length','elanzalite'); ?>
            </label>
            <input type="text" id="<?php echo $this->get_field_id("excerpt_length"); ?>" name="<?php echo $this->get_field_name("excerpt_length"); ?>" value="<?php echo $excerpt_length; ?>" size="3" />
        </p>      
        <p style="display:none;">
            <label for="<?php echo $this->get_field_id("date"); ?>">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("date"); ?>" name="<?php echo $this->get_field_name("date"); ?>"<?php checked((bool) $instance["date"], true); ?> />
                <?php _e('Post Date','elanzalite'); ?> 
            </label>
        </p>
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Add Number Of Post To Show','elanzalite'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

        <p>
            
                <input type="hidden" id="<?php echo $this->get_field_id('show_type'); ?>" name="<?php echo $this->get_field_name('show_type'); ?>" value="listing"/>
             
        </p>
<?php } } ?>