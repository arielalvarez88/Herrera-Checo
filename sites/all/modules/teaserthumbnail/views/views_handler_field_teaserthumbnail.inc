<?php
// $Id: views_handler_field_teaserthumbnail.inc,v 1.4 2009/12/26 05:46:00 hunvreus Exp $
class views_handler_field_teaserthumbnail extends views_handler_field {
  function option_definition() {
    $options = parent::option_definition();
    $options['link_to_node'] = array('default' => TRUE);
    $options['original_picture'] = array('default' => FALSE);
    $options['preset'] = array('default' => '');
    return $options;
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    $form['link_to_node'] = array(
      '#title' => t('Link the thumbnail to its node'),
      '#type' => 'checkbox',
      '#default_value' => !empty($this->options['link_to_node']),
    );

	$form['original_picture'] = array(
      '#title' => t('Display original'),
      '#type' => 'checkbox',
      '#default_value' => !empty($this->options['original_picture']),
      '#description' => t('If checked, the view will display the original picture used to build the thumbnail without applying the ImageCache preset.'),
    );

    $presets = imagecache_presets(TRUE);
    $options = array('' => '');
    foreach ($presets as $preset) {
      $options[$preset['presetname']] = $preset['presetname'];
    }
    
    $form['preset'] = array(
      '#type' => 'select',
      '#title' => t('Thumbnail preset'),
      '#default_value' => $this->options['preset'],
      '#description' => t('This preset will override any other teaser thumbnail setting.'),
      '#options' => $options,
    );
  }

  function render($values) {
    $node = NULL;
    $thumbnail = $values->{$this->field_alias};
    if (!empty($thumbnail)) {
      if (empty($this->options['original_picture'])) {
        if (empty($this->options['preset'])) {
          $node->teaserthumbnail = $thumbnail;
          $node->type = $values->type;
          $thumbnail = theme('teaserthumbnail_thumbnail', $node);
        }
        else {
          $thumbnail = theme('imagecache', $this->options['preset'], $thumbnail);
        }
      }
      else {
        $thumbnail = theme('image', $thumbnail);
      }
      if (!empty($this->options['link_to_node'])) {
        return l($thumbnail, 'node/'. $values->nid, array('html' => TRUE));
      }
      else {
        return $thumbnail;
      }
    }
  }
}