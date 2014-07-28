<?php
namespace Craft;

class BlueprintPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Blueprint');
    }

    function getVersion()
    {
        return '0.5';
    }

    function getDeveloper()
    {
        return 'Boris Jerenec';
    }

    function getDeveloperUrl()
    {
        return 'http://studiotandem.si/en';
    }

    public function hasCpSection()
    {
        return true;
    }

    public function registerCpRoutes()
    {
        return array(
            'blueprint' => array(
                'action' => 'blueprint/blueprintIndex'
            )
        );
    }

}
