<?php
namespace Schrattenholz\Slider;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;

class Slider_SiteConfigExtension extends DataExtension 
{
	private static $has_one=[
		'Slider_TeaserDefaultImage'=>Image::class,

	];
    public function updateCMSFields(FieldList $fields) 
    {
        $fields->addFieldsToTab("Root.Main", [
		new UploadField('Slider_TeaserDefaultImage','Slider-Defaultteaserbild (967x500px transparentes PNG)  '),
			new TextField("Test","Test"),
           
			]
        );
    }
	private static $owns=[
		'Slider_TeaserDefaultImage'
	];
}
?>