<?php
/*
* Plugin Name: Profit's header Widget
* Description:  Widget
* Author: Luis Pinheiro
* Version: 1.0.0
* Author URI: http://profitcreations.wordpress.com
*/

/* Start Adding Functions Below this Line */

// Creating the widget
class profits_header_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'profits_header_widget',

            // Widget name will appear in UI
            __('Profits header Widget', 'profits_header_widget_domain'),

            // Widget description
            array('description' => __('header widget based on materializecss.com',
                'profits_header_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        $profit_header_title = apply_filters('widget_header', $instance['profit_header_title']);
        $profit_header_desc = apply_filters('widget_header', $instance['profit_header_desc']);
        $profit_header_img = apply_filters('widget_header', $instance['profit_header_img']);
        
       

        // This is where you run the code and display the output
        
        echo '<header style="background-image: url( ' . $profit_header_img . ' ); background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover; height: 400px; ">';
        echo '  <div class="valign-wrapper" style="background-color: rgba(0,0,0,.15) !important; height: inherit;">';
        echo '    <div class="valign center-block">';
        echo '        <h1 class="center-align lsm-header-title white-text display-1"> ' . $profit_header_title . ' </h1>';
        echo '      <h4 class="center lsm-header-title white-text display-4" style="font-family: Great Vibes, cursive !important;"> ' . $profit_header_desc . ' </h4> ';
        echo '    </div>';
        echo '  </div>';
        echo '</header>';
        
    }

// Widget Backend
    public function form($instance)
    {
        if ( $instance )
        {
            $profit_header_title = esc_attr($instance['profit_header_title']);
            $profit_header_desc = esc_attr($instance['profit_header_desc']);
            $profit_header_img = esc_attr($instance['profit_header_img']);

        } else {
            $profit_header_title = '';
            $profit_header_desc = '';
            $profit_header_img = '';
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('profit_header_title'); ?>"><?php _e('profit_header_title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('profit_header_title'); ?>"
                   name="<?php echo $this->get_field_name('profit_header_title'); ?>" type="text"
                   value="<?php echo esc_attr($profit_header_title); ?>"/>
        </p>
       <p>
            <label for="<?php echo $this->get_field_id('profit_header_desc'); ?>"><?php _e('profit_header_desc:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('profit_header_desc'); ?>"
                   name="<?php echo $this->get_field_name('profit_header_desc'); ?>" type="text"
                   value="<?php echo esc_attr($profit_header_desc); ?>"/>
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('profit_header_img'); ?>"><?php _e('profit_header_img:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('profit_header_img'); ?>"
                   name="<?php echo $this->get_field_name('profit_header_img'); ?>" type="text"
                   value="<?php echo esc_attr($profit_header_img); ?>"/>
        </p>
       
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['profit_header_title'] = (!empty($new_instance['profit_header_title'])) ? strip_tags($new_instance['profit_header_title']) : '';
        $instance['profit_header_desc'] = (!empty($new_instance['profit_header_desc'])) ? strip_tags($new_instance['profit_header_desc']) : '';
        $instance['profit_header_img'] = (!empty($new_instance['profit_header_img'])) ? strip_tags($new_instance['profit_header_img']) : '';
        
        return $instance;
    }
}
// Class profits_header_widget ends here
// Register and load the widget
function profit_header_load_widget()
{
    register_widget('profits_header_widget');
}

add_action('widgets_init', 'profit_header_load_widget');
/* Stop Adding Functions Below this Line */
?>
