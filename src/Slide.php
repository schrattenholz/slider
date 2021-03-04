<?php

namespace Schrattenholz\Slider;

use SilverStripe\Assets\Image;
use Silverstripe\ORM\DataObject;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\SiteConfig\SiteConfig;
use Silverstripe\Forms\TextField;
use Silverstripe\Forms\TreeDropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Security\Permission;
class Slide extends DataObject{
	private static $singular_name="Slide";
	private static $plural_name="Slides";
	private static $table_name="Slide";
	private static $default_sort=['SortID'];
	private static $db = array (
		'Title'=>'Varchar(255)',
		'SecondRow'=>'Text',
		'ThirdRow'=>'Text',
		'ActionText'=>'Text',
		'SortID'=>'Int'
	);
	private static $has_one=[
		'BackgroundImage'=>Image::class,
		'Image'=>Image::class,
		'ActionLink'=>SiteTree::class,
		'Page'=>SiteTree::class,
		
	];
	
	private static $summary_fields = [
		'Title' => 'Titel'
    ];
 	public function getCMSFields()
	{
		$fields=parent::getCMSFields();
		$fields->removeByName('SortID');
		$fields->removeByName('PageID');
		$fields->addFieldToTab("Root.Main",new TextField("SecondRow","Zeile über der Hauptzeile"));
		$fields->addFieldToTab("Root.Main",new TextField("Title","Hauptzeile"));
		$fields->addFieldToTab("Root.Main",new TextField("ThirdRow","Zeile unter der Hauptzeile"));
		$fields->addFieldToTab("Root.Main",new TextField("ActionText","Text auf dem Button"));
		$fields->addFieldToTab("Root.Main",new TreeDropdownField('ActionLinkID','Zielseite des Button',SiteTree::class));
		$fields->addFieldToTab("Root.Main",new UploadField('BackgroundImage','Hintergrundbild'));
		$fields->addFieldToTab("Root.Main",new UploadField('Image','Teaserbild (967x500px)  '));
		return $fields;
	}	
	private static $owns=[
		'BackgroundImage',
		'Image'
	];
	public function TeaserImage(){
		if($this->ImageID){
			
			return $this->Image();
		}else{
			$config =SiteConfig::current_site_config(); 
			return $config->Slider_TeaserDefaultImage();
		}
	}
	 public function canView($member = null) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canEdit($member = null) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canDelete($member = null) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canCreate($member = null, $context = []) 
    {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }
}
?>
