<?php
/*
* Plugin Name: Profit's img Widget
* Description:  Widget
* Author: Luis Pinheiro
* Version: 1.0.0
* Author URI: http://profitcreations.wordpress.com
*/

/* Start Adding Functions Below this Line */

// Creating the widget
class profits_img_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'profits_img_widget',

            // Widget name will appear in UI
            __('Profits img Widget', 'profits_img_widget_domain'),

            // Widget description
            array('description' => __('img widget based on materializecss.com',
                'profits_img_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        $profit_img_url = apply_filters('widget_img', $instance['profit_img_url']);
        $profit_img_text = apply_filters('widget_img', $instance['profit_img_text']);
        $profit_img_text_link = apply_filters('widget_img', $instance['profit_img_text_link']);
        
       

        // This is where you run the code and display the output
        echo '<div class="center">';
        echo '  <img src=" ' . $profit_img_url . ' " class="materialboxed responsive-img" height="200px" alt="">';
        echo '  <div class="center">';
        echo '      <a href=" ' . $profit_img_text_link . ' "> ' . $profit_img_text . ' </a>';
        echo '  </div>';
        echo '</div>';
       
    }

// Widget Backend
    public function form($instance)
    {
        if ( $instance )
        {
            $profit_img_url = esc_attr($instance['profit_img_url']);
            $profit_img_text = esc_attr($instance['profit_img_text']);
            $profit_img_text_link = esc_attr($instance['profit_img_text_link']);

        } else {
            $profit_img_url = '';
            $profit_img_text = '';
            $profit_img_text_link = '';
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('profit_img_url'); ?>"><?php _e('profit_img_url:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('profit_img_url'); ?>"
                   name="<?php echo $this->get_field_name('profit_img_url'); ?>" type="text"
                   value="<?php echo esc_attr($profit_img_url); ?>"/>
        </p>
       <p>
            <label for="<?php echo $this->get_field_id('profit_img_text'); ?>"><?php _e('profit_img_text:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('profit_img_text'); ?>"
                   name="<?php echo $this->get_field_name('profit_img_text'); ?>" type="text"
                   value="<?php echo esc_attr($profit_img_text); ?>"/>
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('profit_img_text_link'); ?>"><?php _e('profit_img_text_link:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('profit_img_text_link'); ?>"
                   name="<?php echo $this->get_field_name('profit_img_text_link'); ?>" type="text"
                   value="<?php echo esc_attr($profit_img_text_link); ?>"/>
        </p>
       
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['profit_img_url'] = (!empty($new_instance['profit_img_url'])) ? strip_tags($new_instance['profit_img_url']) : '';
        $instance['profit_img_text'] = (!empty($new_instance['profit_img_text'])) ? strip_tags($new_instance['profit_img_text']) : '';
        $instance['profit_img_text_link'] = (!empty($new_instance['profit_img_text_link'])) ? strip_tags($new_instance['profit_img_text_link']) : '';
        
        return $instance;
    }
}
// Class profits_img_widget ends here
// Register and load the widget
function profit_img_load_widget()
{
    register_widget('profits_img_widget');
}

add_action('widgets_init', 'profit_img_load_widget');
/* Stop Adding Functions Below this Line */
?>
