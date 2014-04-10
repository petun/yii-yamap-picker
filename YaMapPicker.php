<?

class YaMapPicker extends CWidget {

	public $latId = "latitude";

	public $lonId = "longitude";

	public $zoom = "zoom";


	public function init() {
		Yii::app()->getClientScript()->registerScript('YaMapPicker');
	}




}
