<?php

namespace Victoire\Widget\TimelineBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\FormBundle\Form\Type\LinkType;
use Victoire\Bundle\MediaBundle\Form\Type\MediaType;
use Victoire\Widget\ListingBundle\Form\WidgetListingItemType;

/**
 * WidgetTimeline form type.
 */
class WidgetTimelineEventType extends WidgetListingItemType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('title', null, array(
                'label' => 'widget_timeline_event.form.title.label',
                'required' => true,
            ))
            ->add('description', 'textarea', array(
                'label' => 'widget_timeline_event.form.description.label',
                'required' => false,
            ))
            ->add('image', MediaType::class, array(
                'label' => 'widget_timeline_event.form.image.label',
                'required' => false, ))
            ->add('link', LinkType::class)
            ->add('linkLabel', null, array(
                'label' => 'form.widget_timeline_event.linkLabel.label',
                'required' => false,
            ))
            ->add('date', null, array(
                'label' => 'form.widget_timeline_event.date.label',
                'widget' => 'single_text',
                'vic_datepicker' => true,
            ))
            ->add('iconFull', null, array(
                'label' => 'form.widget_timeline_event.iconFull.label',
            ))
            ->add('importance', ChoiceType::class, array(
                'label' => 'form.widget_timeline_event.importance.label',
                'choices' => array(
                    'minor' => 'form.widget_timeline_event.importance.choices.minor',
                    'medium' => 'form.widget_timeline_event.importance.choices.medium',
                    'major' => 'form.widget_timeline_event.importance.choices.major',
                ),
                'required' => true,
            ));
    }

    /**
     * bind form to WidgetTimeline entity.
     *
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'Victoire\Widget\TimelineBundle\Entity\WidgetTimelineEvent',
            'translation_domain' => 'victoire',
        ));
    }

    /**
     * get form name.
     *
     * @return string The form name
     */
    public function getBlockPrefix()
    {
        return 'victoire_widget_form_timeline_event';
    }
}
