Victoire CMS Timeline Bundle
============

Need to add a timeline in a victoire cms website ?

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require friendsofvictoire/timeline-widget

Do not forget to add the bundle in your AppKernel !

```php
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\TimelineBundle\VictoireWidgetTimelineBundle(),
            );

            return $bundles;
        }
    }
```

This bundle require LiipImagineBundle with the following configuration

```yml
liip_imagine:
    filter_sets:
        timeline_item_icon_1x:
            filters:
                thumbnail: {size: [100, 100], mode: inset}
        timeline_item_icon_2x:
            filters:
                thumbnail: {size: [200, 200], mode: inset}
```
