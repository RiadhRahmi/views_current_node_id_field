<?php

namespace Drupal\current_node_id\Plugin\views\field;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\ResultRow;

/**
 * A handler to provide a field that is completely custom by the administrator.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("current_node_id_field")
 */
class CurrentNodeIdField extends FieldPluginBase
{

    /**
     * {@inheritdoc}
     */
    public function usesGroupBy()
    {
        return FALSE;
    }

    /**
     * {@inheritdoc}
     */
    public function query()
    {
        // Do nothing -- to override the parent query.
    }

    /**
     * {@inheritdoc}
     */
    protected function defineOptions()
    {
        $options = parent::defineOptions();

        $options['hide_alter_empty'] = ['default' => FALSE];
        return $options;
    }

    /**
     * {@inheritdoc}
     */
    public function buildOptionsForm(&$form, FormStateInterface $form_state)
    {
        parent::buildOptionsForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function render(ResultRow $values)
    {
        // Return a random text, here you can include your custom logic.
        // Include any namespace required to call the method required to generate
        // the desired output.
        $node = \Drupal::routeMatch()->getParameter('node');
        return !empty($node) ? $node->id() : null;
    }

}
