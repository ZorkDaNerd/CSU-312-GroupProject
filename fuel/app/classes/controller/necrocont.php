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
    $data = array();
    $this->template-> title ="Color";
    $this->template-> content = View:: forge ('home/color', $data); 
    $this-> template->css= "style.css";
    


}

public function action_color_table(){
    // $data = array();
    // $this->template-> title ="contact";
    // $this->template-> content ="View:: forge ('color/contact', $data)"; 
    // $this-> template->css= "pro.css";
    
    // Check if form has been submitted
    if(Input::method() == 'GET')
    {
        // Create Rows/Columns and Colors variables
        $rowsandcols = Input::get('rowscolumns');
        $colors = Input::get('colors');

        // Validate User Input
        if(!is_numeric($rowsandcols) || !is_numeric($colors))
        {
            echo "Error: Please return a valid number of columns and rows.";
            return;
        }
        if($rowsandcols > 26)
        {
            echo "Error: Please enter no more than 26 rows and columns in total.";
            return;
        }
        if($colors > 10)
        {
            echo "Error: Please enter no more than 10 colors in total.";
            return;
        }
        if($rowsandcols < 1 || $colors < 1)
        {
            echo "Error: Please make sure you are entering integers greater than or equal to one.";
            return;
        }
        $data = array(
            'rowscolumns' => $rowsandcols,
            'colors' => $colors
        );
        // view file path however we end up doing it, passing in array instead of object for view
        $color_table = View::forge('home/color', $data);

        // Display Color Table
        $this->template->title = "Color Table";
        $this->template->content = $color_table;
        $this->template->css = "style.css";
    }
}
}