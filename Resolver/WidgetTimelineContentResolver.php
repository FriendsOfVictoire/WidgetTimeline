<?php

namespace Victoire\Widget\TimelineBundle\Resolver;

use Victoire\Widget\TimelineBundle\Entity\WidgetTimelineEvent;
use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;

class WidgetTimelineContentResolver extends BaseWidgetContentResolver
{
    /**
     * Get the static content of the widget.
     *
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetStaticContent(Widget $widget)
    {
        $parameters = parent::getWidgetStaticContent($widget);
        $parameters['years'] = [];
        /** @var WidgetTimelineEvent $_item */
        foreach ($parameters['events'] as $_item) {
            $parameters['years'][$_item->getDate()->format('Y')] = $_item->getDate()->format('Y');
        }

        return $parameters;
    }
}
