<?php

namespace HenrySalas0106\GetSiteControl;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\View\Requirements;
use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;

class GetSiteControlController extends DataExtension
{
    private $api_key = null;

    public function contentcontrollerInit() 
    {
        // Check that GetSiteControlAPI exists and is not empty
        // Check if is a Page class only, avoid other type of elements (403,404,logins,etc)
        // Check if checkbox for get site control is active for this page
        if (
            isset(SiteConfig::current_site_config()->GetSiteControlAPI) &&
            SiteConfig::current_site_config()->GetSiteControlAPI != "" &&
            $this->IsPage() &&
            $this->IsGetSiteControl()
            )
        {
            $this->api_key = SiteConfig::current_site_config()->GetSiteControlAPI;
            Requirements::javascript(
                "//l.getsitecontrol.com/".$this->api_key.".js",
                [
                    "async" => true
                ]
            );
        }
        
    }

    /**
     * Get class name of owner object
     */

    private function IsPage()
    {
        if ($this->getOwner()->ClassName == "Page")
        {
            return true;
        }
        return false;
    }

    /**
     * Get if checkbox to activate GetSiteControl functionality is active in this Page
     */
    private function IsGetSiteControl()
    {
        
        if ($this->getOwner()->ActiveGetSiteControl == 1)
        {
            return true;
        }
        return false;
    }

}
