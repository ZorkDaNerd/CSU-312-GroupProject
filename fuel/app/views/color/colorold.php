<!DOCTYPE html>
<html>

<h1> Color Coordinator </h1> 

<button id="print-btn">Print</button>
<script>
    

  const printBtn = document.querySelector('#print-btn');
  const pageBody = document.querySelector('body');
  const pageNav = document.querySelector('nav');
  const ul = document.querySelector('ul');
  const button = document.querySelector('button');

  printBtn.addEventListener('click', function() {
    pageBody.classList.add('black-white');
    pageNav.classList.add('hide-nav');
    ul.classList.add('hide-ul');
    button.classList.add('hide-btn');
    
  });
  </script>



<?php
use Fuel\Core\Form;


    $rowsandcols = isset($rowsandcols) ? $rowsandcols : '';
    $colors = isset($colors) ? $colors : '';
    /*$data = array(
        $rowsandcols = isset($rowsandcols) ? $rowsandcols : '',
        $colors = isset($colors) ? $colors : ''
    );
    */

    // Color Options Array
    $coloroptions=array(
        'red' => 'Red',
        'orange' => 'Orange',
        'yellow' => 'Yellow',
        'green' => 'Green',
        'blue' => 'Blue',
        'purple' => 'Purple',
        'grey' => 'Grey',
        'brown' => 'Brown',
        'black' => 'Black',
        'teal' => 'Teal'
    );

    // Empty Array to hold selected colors
    $selectedcolors = array();

    // Generate Color Table
    if($rowsandcols && $colors)
    {
        // Upper Table
        echo '<table>';
        for($i = 1; $i <= $colors; $i++)
        {
            echo '<tr>';
            echo '<td style="width: 20%;">Color ' . $i . ':</td>';
            echo '<td style="width: 80%;">';
            echo Form::select('color' . $i, $coloroptions, isset($selectedcolors[$i]) ? $selectedcolors[i] : '');
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';

        // Lower Table
        echo '<table>';
        echo '<tr>';
        echo '<td></td>';
        for($i = 1; $i <= $rowsandcols; $i++)
        {
            // convert number to letter
            $letter = chr($i + 64);
            echo '<td>' . $letter . '</td>';
        }
        echo '</tr>';
        // Generate the data rows
        for ($i = 1; $i <= $rowscolumns; $i++)
        {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            for ($j = 1; $j <= $rowscolumns; $j++)
            {
                echo '<td></td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
?>

