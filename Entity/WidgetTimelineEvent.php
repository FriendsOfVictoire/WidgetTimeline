<?php

namespace Victoire\Widget\TimelineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\MediaBundle\Entity\Media;
use Victoire\Bundle\CoreBundle\Annotations as VIC;
use Victoire\Widget\ListingBundle\Entity\WidgetListingItem;

/**
 * WidgetTimeline.
 *
 * @ORM\Table("vic_widget_timeline_event")
 * @ORM\Entity
 */
class WidgetTimelineEvent extends WidgetListingItem
{
    use \Victoire\Bundle\WidgetBundle\Entity\Traits\LinkTrait;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     * @VIC\ReceiverProperty("textable")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @VIC\ReceiverProperty("textable")
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="\Victoire\Bundle\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id", onDelete="CASCADE")
     * @VIC\ReceiverProperty("imageable")
     */
    protected $image;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="WidgetTimeline", inversedBy="events")
     * @ORM\JoinColumn(name="timeline_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $timeline;

    /**
     * @var string
     *
     * @ORM\Column(name="importance", type="string", length=255, nullable=true)
     * @VIC\ReceiverProperty("textable")
     */
    protected $importance;

    /**
     * @var string
     *
     * @ORM\Column(name="link_label", type="string", length=55, nullable=true)
     */
    protected $linkLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_full", type="boolean", nullable=true)
     */
    protected $iconFull;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get timeline.
     *
     * @return string
     */
    public function getTimeline()
    {
        return $this->timeline;
    }

    /**
     * Set timeline.
     *
     * @param string $timeline
     *
     * @return $this
     */
    public function setTimeline($timeline)
    {
        $this->timeline = $timeline;

        return $this;
    }

    /**
     * Get image.
     *
     * @return Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image.
     *
     * @param Media $image
     *
     * @return $this
     */
    public function setImage(Media $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get linkLabel.
     *
     * @return string
     */
    public function getLinkLabel()
    {
        return $this->linkLabel;
    }

    /**
     * Set linkLabel.
     *
     * @param string $linkLabel
     *
     * @return $this
     */
    public function setLinkLabel($linkLabel)
    {
        $this->linkLabel = $linkLabel;

        return $this;
    }

    /**
     * Get iconFull.
     *
     * @return bool
     */
    public function getIconFull()
    {
        return $this->iconFull;
    }

    /**
     * Set iconFull.
     *
     * @param bool $iconFull
     *
     * @return $this
     */
    public function setIconFull($iconFull)
    {
        $this->iconFull = $iconFull;

        return $this;
    }

    /**
     * Get importance.
     *
     * @return string
     */
    public function getImportance()
    {
        return $this->importance;
    }

    /**
     * Set importance.
     *
     * @param string $importance
     *
     * @return $this
     */
    public function setImportance($importance)
    {
        $this->importance = $importance;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }
}
