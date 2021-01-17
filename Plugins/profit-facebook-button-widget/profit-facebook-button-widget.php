<?php
/*
* Plugin Name: Profit's facebook_button Widget
* Description:  Widget
* Author: Luis Pinheiro
* Version: 1.0.0
* Author URI: http://profitcreations.wordpress.com
*/

/* Start Adding Functions Below this Line */

// Creating the widget
class profits_facebook_button_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'profits_facebook_button_widget',

            // Widget name will appear in UI
            __('Profits facebook_button Widget', 'profits_facebook_button_widget_domain'),

            // Widget description
            array('description' => __('facebook_button widget based on materializecss.com',
                'profits_facebook_button_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        $facebook_button_url = apply_filters('widget_facebook_button', $instance['facebook_button_url']);
        $profit_facebook_button_text = apply_filters('widget_facebook_button', $instance['profit_facebook_button_text']);



        // This is where you run the code and display the output
        echo '<div class="row center">';
        echo '  <a id="lsm-fb" href=" ' . $facebook_button_url . ' " title=" ' . $profit_facebook_button_text . ' " class="btn btn-primary btn-lg waves-effect waves-light btn-large text-center center center-align  hvr-icon-bounce white-text" target="_blank"> ' . $profit_facebook_button_text . ' </a>';
        echo '</div>';

    }

// Widget Backend
    public function form($instance)
    {
        if ( $instance )
        {
            $facebook_button_url = esc_attr($instance['facebook_button_url']);
            $profit_facebook_button_text = esc_attr($instance['profit_facebook_button_text']);

        } else {
            $facebook_button = '';
            $profit_facebook_button_text = '';
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('facebook_button_url'); ?>"><?php _e('facebook_button_url:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook_button_url'); ?>"
                   name="<?php echo $this->get_field_name('facebook_button_url'); ?>" type="text"
                   value="<?php echo esc_attr($facebook_button_url); ?>"/>
        </p>
       <p>
            <label for="<?php echo $this->get_field_id('profit_facebook_button_text'); ?>"><?php _e('profit_facebook_button_text:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('profit_facebook_button_text'); ?>"
                   name="<?php echo $this->get_field_name('profit_facebook_button_text'); ?>" type="text"
                   value="<?php echo esc_attr($profit_facebook_button_text); ?>"/>
        </p>

        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['facebook_button_url'] = (!empty($new_instance['facebook_button_url'])) ? strip_tags($new_instance['facebook_button_url']) : '';
        $instance['profit_facebook_button_text'] = (!empty($new_instance['profit_facebook_button_text'])) ? strip_tags($new_instance['profit_facebook_button_text']) : '';

        return $instance;
    }
}
// Class profits_facebook_button_widget ends here
// Register and load the widget
function profit_facebook_button_load_widget()
{
    register_widget('profits_facebook_button_widget');
}

add_action('widgets_init', 'profit_facebook_button_load_widget');
/* Stop Adding Functions Below this Line */
?>
