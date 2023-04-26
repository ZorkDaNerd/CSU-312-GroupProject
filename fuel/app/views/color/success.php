<!DOCTYPE html>
<html>
<link rel="icon" href="https://game-icons.net/icons/000000/transparent/1x1/lorc/potion-ball.png">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<h1> Color Coordinator pass </h1> 
<style>
  .warning {
  display: none;
  color: red;
  font-size: 12px;
}
  table {
      width: 80%;
      border-collapse: collapse;
      margin: 0 auto;
  }

  td {
      border: 1px solid white;
      padding: 10px;
  }

  .left-col {
      width: 20%;
  }

  .right-col {
      width: 80%;
  }

  .colordrop{
    background-color: black;
    color: white;
  }
</style>

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rows = (int)$_POST['rows'];
    $cols = (int)$_POST['cols'];
    $color = (int)$_POST['color'];
  }
  
  $colors = array(
    'Red',
    'Green',
    'Blue',
    'Yellow',
    'Purple',
    'Orange',
    'Teal',
    'Pink',
    'Gray',
    'Brown'
  );?>

<body>
 <?php if (isset($rows) && isset($cols) && isset($color)) { ?>
<?php } else { ?>
  <p>Please enter the number of rows, columns, and colors in the form above.</p>
<?php } ?> 


 <table>
  <?php for ($i = 0; $i < $color; $i++) { ?>
    <tr>
      <td class="left-col">Color <?php echo $i+1; ?>
      <select class = "colordrop" onchange="checkSelection(this)" title = "selectcolor">
          <?php foreach ($colors as $c) { ?>
            <option value="<?php echo $c; ?>" <?php echo ($c === $colors[$i]) ? 'selected' : ''; ?>><?php echo $c; ?></option>
          <?php } ?>
        </select>
        <span class="warning">Please select a different color.</span>
          </td>
      <td class="right-col"><span style="background-color:<?php echo $colors[$i]; ?>;">&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $colors[$i]; ?></td>
    </tr>
  <?php } ?>
</table> 

<br> 
<br> 
<br> 
<?php
if (isset($rows) && isset($cols)) {
    $alphabet = range('A', 'Z');
    $size = min($rows, $cols);
//    a wild benito has appeared
    echo '<table>';

    // generate the header row with letters A to Z
    echo '<tr><td></td>';
    for ($i = 0; $i < $size; $i++) {
        echo '<td>' . $alphabet[$i] . '</td>';
    }
    echo '</tr>';

    // generate the rows with numbers and cells with empty values
    for ($i = 1; $i <= $size; $i++) {
        echo '<tr><td>' . $i . '</td>';
        for ($j = 0; $j < $size; $j++) {
            echo '<td></td>';
        }
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>Please enter the number of rows and columns in the form above.</p>';
}
?>

<script>
 function checkSelection(selectElement) {
    var selectedColor = selectElement.value;
    var siblingColor = selectElement.parentNode.nextElementSibling.querySelector("span").style.backgroundColor;
    if (selectedColor === siblingColor) {
      selectElement.value = "";
      selectElement.style.backgroundColor = "red";
      selectElement.parentNode.querySelector(".warning").style.display = "block";
    } else {
      selectElement.style.backgroundColor = "";
      selectElement.parentNode.querySelector(".warning").style.display = "none";
    }
  }
</script>

<!-- //     $rowsandcols = isset($rowsandcols) ? $rowsandcols : '';
//     $colors = isset($colors) ? $colors : '';
//     /*$data = array(
//         $rowsandcols = isset($rowsandcols) ? $rowsandcols : '',
//         $colors = isset($colors) ? $colors : ''
//     );
//     */

//     // Color Options Array
//     $coloroptions=array(
//         'red' => 'Red',
//         'orange' => 'Orange',
//         'yellow' => 'Yellow',
//         'green' => 'Green',
//         'blue' => 'Blue',
//         'purple' => 'Purple',
//         'grey' => 'Grey',
//         'brown' => 'Brown',
//         'black' => 'Black',
//         'teal' => 'Teal'
//     );


//     // Empty Array to hold selected colors
//     $selectedcolors = array();

//     // Generate Color Table
//     if($rows && $colors && $cols)
//     {
//         // Upper Table
//         echo '<table>';
//         for($i = 1; $i <= $colors; $i++)
//         {
//             echo '<tr>';
//             echo '<td style="width: 20%;">Color ' . $i . ':</td>';
//             echo '<td style="width: 80%;">';
//             echo Form::select('color' . $i, $coloroptions, isset($selectedcolors[$i]) ? $selectedcolors[i] : '');
//             echo '</td>';
//             echo '</tr>';
//         }
//         echo '</table>';

//         // Lower Table
//         echo '<table>';
//         echo '<tr>';
//         echo '<td></td>';
//         for($i = 1; $i <= $rows ; $i++)
//         {
//             // convert number to letter
//             $letter = chr($i + 64);
//             echo '<td>' . $letter . '</td>';
//         }
//         echo '</tr>';
//         // Generate the data rows
//         for ($i = 1; $i <= $rowscolumns; $i++)
//         {
//             echo '<tr>';
//             echo '<td>' . $i . '</td>';
//             for ($j = 1; $j <= $rowscolumns; $j++)
//             {
//                 echo '<td></td>';
//             }
//             echo '</tr>';
//         }
//         echo '</table>';
//     }
// ?>




  <table>
<?php for ($i = 0; $i < $color; $i++) { ?>
        <tr>
         <td class="left-col">Color <?php echo $i+1; ?></td>
        <td class="right-col">
            <table>
         <?php for ($j = 0; $j < $rows; $j++) { ?>
                <tr>
                <?php for ($k = 0; $k < $cols; $k++) { ?>
                <td><?php echo $colors[$i]; ?></td>
                
                <?php } ?>
                </tr>
            <?php } ?>
            </table>
            </td>
          </tr>
      <?php } ?>
  </table> 




