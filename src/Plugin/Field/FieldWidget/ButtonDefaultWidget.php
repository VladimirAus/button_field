<?php

/**
 * @file
 * Contains \Drupal\button_field\Plugin\Field\FieldWidget\ButtonDefaultWidget.
 */

namespace Drupal\button_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'button_default' widget.
 *
 * @FieldWidget(
 *   id = "button_default",
 *   label = @Translation("Default Button"),
 *   field_types = {
 *     "button"
 *   }
 * )
 */
class ButtonDefaultWidget extends WidgetBase {
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'button_type' => 'primary',
    ] + parent::defaultSettings();
    return parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = [];

    $elements['button_type'] = [
      '#type' => 'select',
      '#title' => t('Button type'),
      '#options' => [
        'primary' => t('Primary'),
        'danger' => t('Danger'),
      ],
      '#default_value' => $this->getSetting('button_type'),
      '#description' => t('Style of the button.'),
    ];

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];

    $summary[] = t('Type: @type', ['@type' => $this->getSetting('button_type')]);

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = [];

    $element += [
      '#type' => 'submit',
      '#value' => $this->fieldDefinition->getLabel(),
      '#button_type' => $this->getSetting('button_type'),
    ];

    return $element;
  }

}
