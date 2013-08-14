<?php
/**
 * ChPolar class file.
 * @author Stefan Meiwald <stefanmeiwald@yahoo.com>
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package chartjs.widgets
 * @since 0.0.1
 */

/**
 * ChartJs Polar Chart widget.
 * @see http://www.chartjs.org/docs/#polarAreaChart
 */ 
class Graph extends CWidget
{
    const PICTURE_STORAGE = '/files/graphs/';


    /**
     * @var configuration Graphviz Configuration as String
     */
    public $configuration = "";

    /**
     * @var Graphviz Component used for generating the graph
     */
    public $graphvizComponent = NULL;

    public $alt = "";

    public $title = "";

    public $map = false;

    public function init() {
        parent::init();
        if (!$this->graphvizComponent) {
            $this->graphvizComponent = new Graphviz();
        }
    }

    /**
     * Runs the widget.
     */
    public function run()
    {
        $hash = md5($this->configuration);
        $graphFile = Yii::app()->basePath . '/..' . static::PICTURE_STORAGE . $hash . ".png";
        $mapFile = Yii::app()->basePath . '/..' . static::PICTURE_STORAGE . $hash . ".map";

        $result = "";
        if (!file_exists($graphFile)) {
            $path = Yii::app()->basePath .  '/..' . static::PICTURE_STORAGE;
            @mkdir($path,0777,true);
            $result = $this->graphvizComponent->generateGraphvizFromString($this->configuration,$graphFile,$this->map);
        }

        if ($this->map) {
            if (!file_exists($mapFile)) {
                if (!$result) {
                    $result = $this->graphvizComponent->generateGraphvizFromString($this->configuration,$graphFile,$this->map);
                }
                file_put_contents($mapFile,$result);
            }

            $mapContents = file_get_contents($mapFile);

            echo '<map name="map'.$hash.'" id="map'.$hash.'">'.$mapContents.'</map>';
        }

        echo '<img src="'.Yii::app()->baseUrl.static::PICTURE_STORAGE.$hash.'.png" name="graph'.$hash.'" id="graph'.$hash.'" title="'.$this->title.'" alt="'.$this->alt.'" '.(($this->map)?'usemap="#map'.$hash.'"':'').' >';
    }

}
