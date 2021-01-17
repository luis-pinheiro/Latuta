<?php
/*
* Plugin Name: Profit's Widget Test
* Description:  Widget
* Author: Luis Pinheiro
* Version: 1.0.0
* Author URI: http://profitcreations.wordpress.com
*/

/* Start Adding Functions Below this Line */

// Creating the widget
class MyNew_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'MyNew_widget',

            // Widget name will appear in UI
            __('Profits Widget', 'MyNew_widget_domain'),

            // Widget description
            array('description' => __('Type a description here.',
                'MyNew_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
echo "Hello!";

    }

// Widget Backend
    public function form($instance)
    {
        if ( $instance )
        {
            $title = esc_attr($instance['title']);
        } else {
            $title = '';
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags(
            $new_instance['title']) : '';
        return $instance;
    }
}
// Class MyNew_widget ends here
// Register and load the widget
function MyNew_load_widget()
{
    register_widget('MyNew_widget');
}

add_action('widgets_init', 'MyNew_load_widget');
/* Stop Adding Functions Below this Line */
?>
