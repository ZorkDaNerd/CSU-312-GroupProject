<?php 
use Fuel\Core\Form;
use Fuel\Core\Input;
use Fuel\Core\View;
  
class Controller_Necrocont extends Controller_Template {

    /**     
    * @access public 
    * @return Response 
    *
    */

    public $direct = " "; 
    public $template = "template";

public function action_index(){
    $data = array();
    $this->template->title=" Home";
    $this->template->content = View::forge ('home/index', $data);
    $this-> template->css= "style.css";

}


public function action_about(){
    $data = array();
    
    $this->template-> title ="about";
    $this->template-> content = View::forge ('about/about', $data); 
    $this-> template->css= "style.css";

}

public function action_color(){
    // $data = array();
    // $this->template-> title ="Color";
    // $this->template-> content = View:: forge ('home/color', $data); 
    // $this-> template->css= "style.css";
    
    // echo Form::open(array('method' => 'get', 'action' => 'necrocont/action_color_table'));
    // echo "Rows and Columns: " . Form::input('rowscolumns', '', array('type' => 'number')) . "<br>";
    // echo "Colors: " . Form::input('colors', '', array('type' => 'number')) . "<br>";
    // echo Form::submit('submit', 'Submit');
    // echo Form::close();
    $new_post_value = 0;
    $data = array();
    $this->template-> title ="Color";
    $this->template-> content = View:: forge ('color/color', $data); 
    $this-> template->css= "style.css";
    


}

public function post_color(){
    $rows = input::post('rows') ? Input::post('rows') : 0;
    $cols = input::post('cols') ? Input::post('cols') : 0;
    $color = input::post('color') ? Input::post('color') : 0;
    $data = array();
    $this->template-> title ="Color";
    $this->template-> content = View:: forge ('color/color', $data); 
    $this->template->css= "style.css";
    // $myvalue = input::post('myvalue');

    if($rows <= 26 && $rows >= 1 && $cols <= 26 && $cols >= 1 && $color <=10 && $color >= 1){
    $this->template-> title ="Color";
    $this->template-> content = View:: forge ('color/success', $data); 
    $this->template->css= "style.css";
    }
    else{
        $this->template-> title ="Color";
        $this->template-> content = View:: forge ('color/fail', $data); 
        $this->template->css= "style.css";
    }


    //$new_post_value = $myvalue;

}

}