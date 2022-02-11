<?php

namespace HenrySalas0106\GetSiteControl;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\LiteralField;

class GetSiteControlExtension extends DataExtension 
{
    private static $db = [
        'GetSiteControlAPI' => 'Varchar(255)'
    ];

    public function updateCMSFields(FieldList $fields) 
    {
        $fields->addFieldToTab("Root.GetSiteControl", TextField::create("GetSiteControlAPI", "Get Site Control API Key")
        ->setDescription("Add just the key at the end of the link //l.getsitecontrol.com/3w0pvyd7.js, API Key is 3w0pvyd7"));

        $fields->addFieldToTab("Root.GetSiteControl", LiteralField::create('Help', "Link to Get site control Dashboard: <a target='_blank' href='https://dash.getsitecontrol.com/'>Click here</a>"));

    }
}