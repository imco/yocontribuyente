<?php
/*
Plugin Name: Change.org Action Blogger
Plugin URI: http://www.change.org/action-network
Description: Essentials for working with Change.org to extend the social impact of your blog.
Version: 0.3
Author: Change.org
Author URI: http://www.change.org/
License: GPL2
*/
/*  Copyright 2010 Change.org  (email : kyle@change.org)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$changeorg_colors = array(
  "1A3563" => 'Royal Blue',
  "0b5ae0" => 'Blue',
  "000000" => 'Black',
  "dc0000" => 'Red',
  "0ca101" => 'Green',
  "ef6b01" => 'Orange',
  "9301ef" => 'Purple',
  "ef015b" => 'Pink',
  "0C6905" => 'Forest Green',
  "FFE507" => 'Yellow',
  "77786C" => 'Gray',
  "5C4B1C" => 'Brown',
  );

class ChangeOrgPetitionWidget extends WP_Widget {
  var $causes = array(
    'an' => 'Animals',
    'cj' => 'Criminal Justice',
    'ed' => 'Education',
    'en' => 'Environment',
    'gr' => 'Gay Rights',
    'hc' => 'Health',
    'hr' => 'Human Rights',
    'ht' =>'Human Trafficking',
    'im' => 'Immigrant Rights',
    'us' => 'Poverty in America',
    'sf' => 'Sustainable Food',
    'wr' => "Women's Rights",
    );

  function ChangeOrgPetitionWidget() {
    $widget_ops = array(
      'description' => 'Display one or more Change.org petitions.',
      );
    parent::WP_Widget(false, 'Change.org Causes', $widget_ops);	
  }

  function widget($args, $instance) { 
    extract($args);
    echo $before_widget;

    $render_args = array('width' => $instance['width'], 'color' => $instance['color']);

    if ($instance['petition_id']) {
      $render_args['petition_id'] = $instance['petition_id'];
    } else {
      // Default to all causes if no petition chosen
      $render_args['causes'] = 'all';

      if (!$instance['allcauses']) {
        $cause_list = array();
        foreach (array_keys($this->causes) as $cause) {
          if ($instance["cause-$cause"]) {
            $cause_list[] = $cause;
          }
        }
        $render_args['causes'] = implode('_', $cause_list);
      }
    }

    echo _swf_petition($render_args);
    echo $after_widget;
  }

  function form($instance) {
    global $changeorg_colors;
    $instance = wp_parse_args((array)$instance, $this->instance_defaults());

    ?>
    <p>
      <label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo esc_attr($instance['width']); ?>" /></label>
      <label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Color:'); ?> <select class="widefat" id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>">
        <?php foreach ($changeorg_colors as $hex => $color) { ?> 
          <option value="<?php echo $hex ?>" <?php if ( $hex == $instance['color'] ) echo 'selected="selected"'; ?>><?php echo $color ?></option>
        <?php } ?>
      </select></label>
    </p>
    <p>Enter a petition number or select causes.  A petition will take precedence; 0 means the petitions will be selected from the list of causes.</p>
    <p>
      <label for="<?php echo $this->get_field_id('petition_id'); ?>"><?php _e('Petition ID:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('petition_id'); ?>" name="<?php echo $this->get_field_name('petition_id'); ?>" type="text" value="<?php echo esc_attr($instance['petition_id']); ?>" /></label>
      <fieldset><legend><?php _e('Causes:'); ?></legend>
        <input id="<?php echo $this->get_field_id("allcauses"); ?>" name="<?php echo $this->get_field_name("allcauses"); ?>" type="checkbox" value="1" <?php checked($instance["allcauses"]); ?> /> <label for="<?php echo $this->get_field_id("cause-$abbr"); ?>"> <strong>All Causes</strong></label><br />
        <?php foreach ($this->causes as $abbr => $label) { ?> 
          <input id="<?php echo $this->get_field_id("cause-$abbr"); ?>" name="<?php echo $this->get_field_name("cause-$abbr"); ?>" type="checkbox" value="1" <?php checked($instance["cause-$abbr"]); ?> /> <label for="<?php echo $this->get_field_id("cause-$abbr"); ?>"> <?php echo $label; ?></label><br />
        <?php } ?>
      </fieldset>
    </p>
    <?php
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $new_instance = wp_parse_args((array) $new_instance, $this->instance_defaults());
    $instance['width'] = strip_tags($new_instance['width']);
    $instance['color'] = strip_tags($new_instance['color']);
    $instance['petition_id'] = strip_tags($new_instance['petition_id']);
    $instance['allcauses'] = strip_tags($new_instance['allcauses']);
    foreach (array_keys($this->causes) as $key) {
      if ($instance['allcauses']) {
        $instance["cause-$key"] = 0;
      } else {
        $instance["cause-$key"] = strip_tags($new_instance["cause-$key"]);
      }

    }
    return $instance;
  }

  function instance_defaults() {
    $defaults = array(
      'width' => 300,
      'color' => '1A3563',
      'allcauses' => 0,
      'petition_id' => 0,
      ); 
    foreach (array_keys($this->causes) as $key) {
      $defaults["cause-$key"] = 0;
    }
    return $defaults;
  }
}

/* Register the widget */
add_action('widgets_init', create_function('', 'return register_widget("ChangeOrgPetitionWidget");'));


function co_petition_shortcode_handler($atts, $content = null) {
  $atts = shortcode_atts( array(
    'id' => 0,
    'width' => 300,
    'color' => '1A3563',
  ), $atts );

  /* Map tag attributes into petition attributes. */
  if ($atts['id']) {
    $atts['petition_id'] = $atts['id'];
  } else {
    // TODO Fall back to global specified causes?
    $atts['causes'] = 'all';
  }

  return _swf_petition($atts);
}

/* Register the shortcode */
add_shortcode('change_petition','co_petition_shortcode_handler');


/* Expects a petition_id or cause, width, and color. */
function _swf_petition($atts) {
  $params = array();
  if (isset($atts['petition_id'])) {
    $params['petition_id'] = $atts['petition_id'];
  } elseif (isset($atts['causes'])) {
    $params['causes'] = $atts['causes'];
  }
  $params['width'] = $atts['width'];
  $params['color'] = isset($atts['color']) ? $atts['color'] : '000000';

  $pairs = array();
  foreach ($params as $key => $value) {
    $pairs[] = $key . '=' . urlencode($value);
  }
  $url = "http://e.change.org/flash_petitions_widget.js?" . implode('&amp;', $pairs);
  
  return <<<END
  <div id="change_BottomBar"><span id="change_Powered"><a href="http://www.change.org/petitions" target="_blank">Petitions</a> by Change.org</span><a>|</a><span id="change_Start">Start a <a href="http://www.change.org/petition" target="_blank">Petition</a> &raquo;</span></div>
  <script type="text/javascript" src="$url"></script>
END;
}


function changeorg_settings_page() {
  global $changeorg_colors;
  ?>
  <div class="wrap">
    <h2>Change.org Action Blogger</h2>

    <form method="post" action="options.php">
      <?php settings_fields( 'changeorg-general' ); ?>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Default Width</th>
          <td>
            <input type="text" name="width" value="<?php echo get_option('width'); ?>" /><br />
            The default width if unspecified when adding a new widget or using <code>[co_petition]</code>.
          </td>
        </tr>
        <tr valign"top">
          <th scope="row">Default Color</th>
          <td>
            <select name="color">
            <?php foreach ($changeorg_colors as $hex => $color) { ?> 
              <option value="<?php echo $hex ?>" <?php if (false) echo 'selected="selected"'; ?>><?php echo $color ?></option>
            <?php } ?>
            </select>
          </td>
        </tr>
      </table>

      <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      </p>

    </form>
  </div>

  <?php
}

function changeorg_options_init() {
  register_setting('changeorg_general', 'color');
  register_setting('changeorg_general', 'width');
}

function changeorg_options_add_page() {
  add_options_page('Change.org Action Blogger', 'Change.org', 'manage_options',
    __FILE__, 'changeorg_settings_page');
}

add_action('admin_init', 'changeorg_options_init' );
add_action('admin_menu', 'changeorg_options_add_page');
?>