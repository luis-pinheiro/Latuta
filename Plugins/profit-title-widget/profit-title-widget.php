<?php
/*
* Plugin Name: Profit's title Widget
* Description:  Widget
* Author: Luis Pinheiro
* Version: 1.0.0
* Author URI: http://profitcreations.wordpress.com
*/

/* Start Adding Functions Below this Line */

// Creating the widget
class profits_title_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'profits_title_widget',

            // Widget name will appear in UI
            __('Profits title Widget', 'profits_title_widget_domain'),

            // Widget description
            array('description' => __('title widget based on materializecss.com',
                'profits_title_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $profit_title_desc = apply_filters('widget_title', $instance['profit_title_desc']);
        
       

        // This is where you run the code and display the output
      echo '<div class="row center-align">';
      echo '<h1 class="lsm-title"> ' .  $title . '  </h1>';
      echo '<div class="">';
      echo '  <div class=" laco wow fadeInUp"></div>';
      echo '  </div>';
      echo '  <p class="lsm-title-desc"> ' . $profit_title_desc . ' </p> ';
      echo '</div>';

    }

// Widget Backend
    public function form($instance)
    {
        if ( $instance )
        {
            $title = esc_attr($instance['title']);
            $profit_title_desc = esc_attr($instance['profit_title_desc']);

        } else {
            $title = '';
            $profit_title_desc = '';
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
            <label for="<?php echo $this->get_field_id('profit_title_desc'); ?>"><?php _e('profit_title_desc:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('profit_title_desc'); ?>"
                   name="<?php echo $this->get_field_name('profit_title_desc'); ?>" type="text"
                   value="<?php echo esc_attr($profit_title_desc); ?>"/>
        </p>
       
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['profit_title_desc'] = (!empty($new_instance['profit_title_desc'])) ? strip_tags($new_instance['profit_title_desc']) : '';
        
        return $instance;
    }
}
// Class profits_title_widget ends here
// Register and load the widget
function profit_title_load_widget()
{
    register_widget('profits_title_widget');
}

add_action('widgets_init', 'profit_title_load_widget');
/* Stop Adding Functions Below this Line */
?>
