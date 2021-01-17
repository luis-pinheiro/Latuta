<?php
/*
* Plugin Name: Profit's logo Widget
* Description:  Widget
* Author: Luis Pinheiro
* Version: 1.0.0
* Author URI: http://profitcreations.wordpress.com
*/

/* Start Adding Functions Below this Line */

// Creating the widget
class profits_logo_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'profits_logo_widget',

            // Widget name will appear in UI
            __('Profits logo Widget', 'profits_logo_widget_domain'),

            // Widget description
            array('description' => __('logo widget based on materializecss.com',
                'profits_logo_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        $profit_logo_url = apply_filters('widget_logo', $instance['profit_logo_url']);
        $profit_logo_img_url = apply_filters('widget_logo', $instance['profit_logo_img_url']);
        
        // This is where you run the code and display the output
       
        echo '<a id="logo-container" href=" ' . esc_url( home_url( '/' ) ) . ' " class="brand-logo valign-wraper waves-effect waves-light">';
         
        echo '<img class="responsive-img valign" src=" ' . $profit_logo_url . ' " alt="Logo">';
      
        echo '</a>';
    }

// Widget Backend
    public function form($instance)
    {
        if ( $instance )
        {
            $profit_logo_url = esc_attr($instance['profit_logo_url']);

        } else {
            $profit_logo_url = '';
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('profit_logo_url'); ?>"><?php _e('profit_logo_url:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('profit_logo_url'); ?>"
                   name="<?php echo $this->get_field_name('profit_logo_url'); ?>" type="text"
                   value="<?php echo esc_attr($profit_logo_url); ?>"/>
        </p>
       
      
       
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['profit_logo_url'] = (!empty($new_instance['profit_logo_url'])) ? strip_tags($new_instance['profit_logo_url']) : '';
        
        return $instance;
    }
}
// Class profits_logo_widget ends here
// Register and load the widget
function profit_logo_load_widget()
{
    register_widget('profits_logo_widget');
}

add_action('widgets_init', 'profit_logo_load_widget');
/* Stop Adding Functions Below this Line */
?>
