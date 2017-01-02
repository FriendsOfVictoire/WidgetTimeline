<?php

namespace Victoire\Widget\TimelineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetTimeline.
 *
 * @ORM\Table("vic_widget_timeline")
 * @ORM\Entity
 */
class WidgetTimeline extends Widget
{
    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="WidgetTimelineEvent", mappedBy="timeline", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"startDate" = "ASC"})
     */
    protected $events;

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle).
     *
     * @return string
     */
    public function __toString()
    {
        return 'Chronologie #'.$this->id;
    }

    /**
     * Set events.
     *
     * @param WidgetTimelineEvent[] $events
     *
     * @return WidgetTimeline
     */
    public function setEvents($events)
    {
        foreach ($events as $_image) {
            $_image->setTimeline($this);
        }
        $this->events = $events;

        return $this;
    }
    /**
     * Add events.
     *
     * @param WidgetTimelineEvent $event
     *
     * @return WidgetTimeline
     */
    public function addEvent(WidgetTimelineEvent $event)
    {
        $event->setTimeline($this);
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove events.
     *
     * @param WidgetTimelineEvent $event
     */
    public function removeEvent(WidgetTimelineEvent $event)
    {
        $this->events->removeElement($event);
    }

    /**
     * Get events.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }
}
