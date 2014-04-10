<?

class YaMapPicker extends CWidget {

	public $fieldNameLat;

	public $fieldNameLong;

	public $fieldNameZoom;

	public $model;

	public $modelLat;

	public $modelLong;

	public $modelZoom;

	public function init() {
		ob_start();
		include("YaMapPicker.js");
		$picker = ob_get_clean();

		Yii::app()->getClientScript()->registerScriptFile('http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru_RU');
		Yii::app()->getClientScript()
			->registerScript('YaMapPicker',$picker);


		echo $this->render('map',
			array(
				'fieldNameLat' => $this->fieldNameLat
				,'fieldNameLong' => $this->fieldNameLong
				,'fieldNameZoom' => $this->fieldNameZoom
				,'model' => $this->model
				,'modelLat' => $this->modelLat
				,'modelLong' => $this->modelLong
				,'modelZoom' => $this->modelZoom

			)
		);
	}




}
