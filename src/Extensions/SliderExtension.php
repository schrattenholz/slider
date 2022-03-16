<?php 	

namespace Schrattenholz\Slider;

use Silverstripe\ORM\DataExtension;
use Silverstripe\Forms\FieldList;
	use SilverStripe\Forms\GridField\GridField;
	use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
	use SilverStripe\Forms\GridField\GridFieldConfig;
	use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
	use SilverStripe\Forms\GridField\GridFieldButtonRow;
	use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
	use SilverStripe\Forms\GridField\GridFieldDeleteAction;
	use SilverStripe\Forms\GridField\GridFieldDataColumns;
	use SilverStripe\Forms\GridField\GridFieldEditButton;
	use SilverStripe\Forms\GridField\GridFieldDetailForm;
	use SilverStripe\Forms\GridField\GridFieldSortableHeader;
	use SilverStripe\Forms\GridField\GridFieldPaginator;
	use SilverStripe\Forms\GridField\GridFieldFilterHeader;
	
	use Symbiote\GridFieldExtensions\GridFieldEditableColumns;
	use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
	use Symbiote\GridFieldExtensions\GridFieldAddNewMultiClass;
class SliderExtension extends DataExtension {
	private static $has_many=[
		"Slides"=>Slide::class
	];
	public function updateCMSFields(FieldList $fields) {
			// RevoSlider Tab
			$gridFieldConfig = GridFieldConfig_RelationEditor::create()->addComponents(
				new GridFieldDeleteAction(),
				new GridFieldOrderableRows('SortID')
			);
			
			//$gridFieldConfig->setFolderName($this->Link());
			$dataColumns=$gridFieldConfig->getComponentByType(GridFieldDataColumns::class);
			  $dataColumns->setDisplayFields(array(
				   'Title'=>'Bezeichnung',
				   'getThumbnail'=>'Thumbnail'
			));
			$sliderImages = new GridField("Slides", "Slider-Bilder", $this->owner->Slides()->sort('SortID'), $gridFieldConfig);
			$fields->addFieldToTab('Root.Slider', $sliderImages);

	}
}
