<?php

namespace HenrySalas0106\GetSiteControl;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxField;

class GetSiteControl extends DataExtension
{
    private static $db = [
        'ActiveGetSiteControl' => 'Boolean'
    ];

    public function updateCMSFields(FieldList $fields) 
    {
        // Add get site control field only if is Publish and can Publish
        if (
            (
                ($this->owner->isPublished() && $this->owner->isOnDraft()) ||
                $this->owner->canPublish()
            ) &&
            $this->owner->ClassName == "Page"
        ) 
        {
            $fields->addFieldToTab("Root.GetSiteControl", CheckboxField::create("ActiveGetSiteControl", "Activate GetSiteControl"));
        }
    }

    public function populateDefaults() 
    {
        // Limit auto enabled ActiveGetSiteControl to Pages only
        if ($this->owner->ClassName == "Page")
        {
            $this->owner->ActiveGetSiteControl = true;
        }
        
        parent::populateDefaults();
    }
}