<?

/**
 * Class YaMapPicker
 *
 */
class YaMapPicker extends CWidget {

	public $fieldNameLat = 'lat';

	public $fieldNameLong = 'long';

	public $fieldNameZoom = 'zoom';

	// основная модель - из которой тянется инфа
	public $model;

	public $modelLat;

	public $modelLong;

	public $modelZoom;

	// ширина карты
	public $width = 500;

	// высота карты
	public $height = 350;

	// режим просмотра
	public $viewMode = false;

	public function init() {
		ob_start();
		include("YaMapPicker.js");
		$picker = ob_get_clean();

		Yii::app()->getClientScript()->registerScriptFile('http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru_RU');
		Yii::app()->getClientScript()->registerScript('yaMapViewVar', 'var yaMapViewMode = '.($this->viewMode ? 1 : 0).';',CClientScript::POS_HEAD);
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
				,'width' => $this->width
				,'height' => $this->height
			)
		);
	}




}
