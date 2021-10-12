<?php

namespace App\Services;
use QuickChart;

class EasyGraph {
    private $chart;
    private $width = 800;
    private $height = 500;
    private $chartType = 'bar';
    private $data = "";
    private $chartLabels = NULL;
    private $chartDataLabels = NULL;

    public function config($params = []){
        isset($params["width"]) ? $this->width = $params['width'] : "Not set";
        isset($params["height"]) ? $this->height = $params['height'] : "Not set";
        isset($params["type"]) ? $this->chartType = $params['type'] : "Not set";
        return $this;
    }
    public function data($data){
        $this->data = $data;
        return $this;
    }
    public function setChartLabels($labels){
        $this->chartLabels = $labels;
        return $this;
    }
    public function setDataLabels($labels){
        $this->chartDataLabels = $labels;
        return $this;
    }

    public function generateLabels(){
        $data = isset($this->chartDataLabels) ? $this->chartDataLabels : $this->data;
        $array = array();
        foreach($data as $point){
            $array[] = $point;
        }
        return json_encode($array);
    }
    
    public function generateUrl(){
            $this->chart = new QuickChart(array(
            'width' => $this->width,
            'height' => $this->height
          ));
          $this->chart->setConfig('{
            type: "'.$this->chartType.'",
            data: {
                labels: '.$this->generateLabels().',
                datasets: [{
                  label: "'.json_encode($this->chartLabels).'",
                  data: '.json_encode($this->data).'
                }]
            }
          }');
          
        return $this->chart->getUrl();
    }
}