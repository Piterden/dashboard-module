<?php namespace Anomaly\DashboardModule\Widget\Extension\Form;

use Anomaly\ConfigurationModule\Configuration\Form\ConfigurationFormBuilder;
use Anomaly\DashboardModule\Widget\Contract\WidgetInterface;
use Anomaly\DashboardModule\Widget\Form\WidgetFormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Class WidgetExtensionFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\DashboardModule\Widget\Extension\Form
 */
class WidgetExtensionFormBuilder extends MultipleFormBuilder
{

    /**
     * Fired just before saving the configuration.
     */
    public function onSavingConfiguration()
    {
        /* @var WidgetFormBuilder $form */
        $form = $this->forms->get('widget');

        /* @var WidgetInterface $widget */
        $widget = $form->getFormEntry();

        /* @var ConfigurationFormBuilder $configuration */
        $configuration = $this->forms->get('configuration');

        if (!$configuration->getScope()) {
            $configuration->setScope($widget->getId());
        }
    }
}