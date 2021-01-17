<?php
/*
* Plugin Name: Profit's Card Widget
* Description:  Widget
* Author: Luis Pinheiro
* Version: 1.0.0
* Author URI: http://profitcreations.wordpress.com
*/

/* Start Adding Functions Below this Line */

// Creating the widget
class profits_card_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'profits_card_widget',

            // Widget name will appear in UI
            __('Profits Card Widget', 'profits_card_widget_domain'),

            // Widget description
            array('description' => __('Card widget based on materializecss.com',
                'profits_card_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $card_img = apply_filters('widget_card_img', $instance['card_img']);
        $card_desc = apply_filters('widget_card_desc', $instance['card_desc']);

       

        // This is where you run the code and display the output
// echo '<div class="col-xs-12 col-sm-6 col-md-3">';
echo '     <div class="card hoverable">';
echo '    <div class="card-image waves-effect waves-block waves-light">';
echo '      <img class="activator" src=" ' . $card_img . ' ">';
echo '    </div>';
echo '    <div class="card-content">';
echo '      <span class="card-title activator grey-text text-darken-4">' . $title . '<i class="material-icons right">more_vert</i></span>';
echo '    </div>';
echo '     <div class="card-reveal">';
echo '      <span class="card-title grey-text text-darken-4">' . $title . '<i class="material-icons right">close</i></span>';
echo '      <p>' . $card_desc . '</p>';
echo '    </div>';
echo '  </div>';
// echo '   </div> ';

    }

// Widget Backend
    public function form($instance)
    {
        if ( $instance )
        {
            $title = esc_attr($instance['title']);
            $card_img = esc_attr($instance['card_img']);
            $card_desc = esc_attr($instance['card_desc']);

        } else {
            $title = '';
            $card_img = '';
            $card_desc = '';
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('card_img'); ?>"><?php _e('Image Url:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('card_img'); ?>"
                   name="<?php echo $this->get_field_name('card_img'); ?>" type="text"
                   value="<?php echo esc_attr($card_img); ?>"/>
        </p>
         <p>
            <label for="<?php echo $this->get_field_id('card_desc'); ?>"><?php _e('Descriptie:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('card_desc'); ?>"
                   name="<?php echo $this->get_field_name('card_desc'); ?>" type="text"
                   value="<?php echo esc_attr($card_desc); ?>"/>
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['card_img'] = (!empty($new_instance['card_img'])) ? strip_tags($new_instance['card_img']) : '';
        $instance['card_desc'] = (!empty($new_instance['card_desc'])) ? strip_tags($new_instance['card_desc']) : '';
        return $instance;
    }
}
// Class profits_card_widget ends here
// Register and load the widget
function profit_card_load_widget()
{
    register_widget('profits_card_widget');
}

add_action('widgets_init', 'profit_card_load_widget');
/* Stop Adding Functions Below this Line */
?>
