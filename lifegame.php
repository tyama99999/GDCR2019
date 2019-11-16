<?php

class world{

public $cells = [];    
public $size = 40;

    function init(){
        for($i=0; $this->size > $i; $i++){
            for ($j=0; $this->size > $j; $j++){
                $this->cells[$i][$j] = mt_rand(0,1);
            }
        }
        //print_r($this->cells); 
    }


    function next (){
        $nextworld = [];
        for($i=0; $this->size > $i; $i++){
            for ($j=0; $this->size > $j; $j++){
                $cellcheck = $this->check($i, $j);

                if($this->cells[$i][$j] === 0 && $cellcheck === 3){
                    $nextworld[$i][$j] = 1;             
                }else if($this->cells[$i][$j] === 1 && ($cellcheck === 2 || $cellcheck===3)) {
                    $nextworld[$i][$j] = 1;   
                }else if($this->cells[$i][$j] === 1 && $cellcheck<=1 || $cellcheck>=4){
                    $nextworld[$i][$j] = 0;  
                }else{
                    $nextworld[$i][$j] = 0;                      
                }
            }
        }
        $this->cells=$nextworld;
    }

    function check ($x, $y){
        //$this->cells[$i][$j]
        $cnt = 0;
        for($i=-1;$i<2;$i++){
            for($j=-1;$j<2;$j++){
                
                if($i==0 && $j==0){
                    continue;
                }else if(isset($this->cells[$x+$i][$y+$j]) && $this->cells[$x+$i][$y+$j]==1){
                    $cnt++;
                }
            }
        }
        return $cnt;     
    }

    function disp(){
        system("clear");
        for($i=0; $this->size > $i; $i++){
            for ($j=0; $this->size > $j; $j++){
                if($this->cells[$i][$j]==1){
                    echo "*" ;
                }else{
                    echo " ";
                }
            }
            echo "\n";
        }
    }


}

$test = new world();
$test->init();
$test ->disp();
while(1){
    usleep(5*100*1000);
    $test ->next();    
    $test ->disp();
}



?>