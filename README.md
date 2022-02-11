## Requirements ##

 * SilverStripe Framework 4.4+

## Installation

* composer require henrysalas0106/silverstripe-getsitecontrol (pending)

## Setting up the module

Enable the GetSiteControlController extension on the page controller in app/_config/config.yml:

	Page:
	  extensions:
	    - GetSiteControlController

* Don't forget to dev/build after adding the config.yml file

## In the CMS

* Under Settings/Get Site Control you can enter here the Get site control API key. i.e. the link given by Get Site Control Dashboard is //l.getsitecontrol.com/3w0pvyd7.js, then the API Key is 3w0pvyd7 only. Copy this into the text field and save.

* A new option to add the Get site control pop up has been added to every Page. This is enabled by default.

## Security

* This will only work to Pages or extension of Pages (i.e. not 404 or 403)
* This will work on Draft/Published pages and Split mode:edit/preview in the CMS
* It needs the API Key set up on settings to work
