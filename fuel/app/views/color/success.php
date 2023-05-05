<!DOCTYPE html>
<html>
<link rel="icon" href="https://game-icons.net/icons/000000/transparent/1x1/lorc/potion-ball.png">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<h1> Color Coordinator Coloring Page </h1> 
<style>
  .warning {
  display: none;
  color: red;
  font-size: 12px;
}
.colordrop[style*="background-color: red;"] {
  border: 1px solid red;
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
  
    

  #main{
      border: 1px solid gray;
  }

  .red{
    background-color: red;
  }

  .green{
    background-color: green;
  }

  .blue{
    background-color: blue;
  }

  .yellow{
    background-color: yellow;
  }

  .purple{
    background-color: purple;
  }

  .orange{
    background-color: orange;
  }

  .teal{
    background-color: teal;
  }

  .pink{
    background-color: pink;
  }

  .gray{
    background-color: gray;
  }

  .brown{
    background-color: brown;
  }

</style>

<button id="print-btn">Print</button>
<script>
  // this is everything to do with the print button
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

<!-- 
  <table>
  <?php for ($i = 0; $i < $color; $i++) { 
    ?>
    <tr>
      <td class="left-col">Color <?php echo $i+1; ?>
      <select class = "colordrop" onchange="checkSelection(this)" title = "selectcolor">
          <?php foreach ($colors as $c) { ?>
            <option value="<?php echo $c; ?>" <?php echo ($c === $colors[$i]) ? 'selected' : ''; ?>><?php echo $c; ?></option>
          <?php } ?>
        </select>
        
          </td>
      <td class="right-col"><span style="background-color:<?php echo $colors[$i]; ?>;">&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php echo $colors[$i]; ?></td>
    </tr>
  <?php } ?>
</table>    -->



<!-- this is where the color dropdowns are made that now changes the color of teh right side when a new one is picked  -->


  <table id = "firsttable">
  <?php for ($i = 0; $i < $color; $i++) { ?>
    <tr>
      <td>
        <?php
        // make the first radio button cheched
          if ($i == 0) {
            echo '<input type="radio" name="color" value="' . $colors[$i] . '" checked>';
          } else {
            echo '<input type="radio" name="color" value="' . $colors[$i] . '">';
          }
          ?>
      </td>
      <td class="left-col">Color <?php echo $i+1; ?>
      <!-- this is where we change the dropdown -->
        <select class="colordrop" onchange="updateColor(this)" title="selectcolor">
          <?php foreach ($colors as $c) { ?>
            <option value="<?php echo $c; ?>" <?php echo ($c === $colors[$i]) ? 'selected' : ''; ?>><?php echo $c; ?></option>
          <?php } ?>
        </select>
      </td>
      <td class="right-col">
            <!-- this is where we show the current color -->
        <span class="color-box" style="background-color:<?php echo $colors[$i]; ?>;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span class="color-label"><?php echo $colors[$i]; ?></span>  
      </td>
      <td>

      </td>
    </tr>
  <?php } ?>
</table>



<script>
   function updateColor(select) {
 
    var colorBox = $(select).closest('tr').find('.color-box');
    var colorLabel = $(select).closest('tr').find('.color-label');
    colorBox.css('background-color', select.value);
    colorLabel.text(select.value);

  //   var colorBox = $(select).closest('tr').find('.color-box');
  // var colorLabel = $(select).closest('tr').find('.color-label');
  // var coordsLabel = $(select).closest('tr').find('.coords-label');
  // colorBox.css('background-color', select.value);
  // colorLabel.text(select.value);
  // coordsLabel.text('');
  
  var colorBox = $(select).closest('tr').find('.color-box');
  var colorLabel = $(select).closest('tr').find('.color-label');
  colorBox.css('background-color', select.value);
  colorLabel.text(select.value);
  
  var rowIn = $(select).closest('tr')[0].rowIndex;
  var cellIn = $(select).closest('td')[0].cellIndex;
  var coordsLabel = $(select).closest('tr').find('.coords-label');
  coordsLabel.text('(' + rowIn + ', ' + cellIn + ')');
    
   }
  
 
 

</script>

<br> 
<br> 
<br> 
<!-- This is where the big table with the colors is made -->


<?php
if (isset($rows) && isset($cols)) {
    $alphabet = range('A', 'Z');
    $size = min($rows, $cols);
    echo '<table id = main>';

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

  

<!--Below is the script for changing colors in the table-->

<script>
  // default settings
  $(document).ready(function() {
  let color = ".red";
  let colorName = "red";
  let prev = "red";

    // radio buttons
  $("input[type='radio']").change(function() {
    const selectedColor = $(this).closest('tr').find('.colordrop').val();
    color = "." + selectedColor;
    colorName = selectedColor;
    prev = colorName;
  });

  // color drop down
  $(".colordrop").change(function() {
  const selectedColor = $(this).val();
  if ($(".colordrop").filter(function() {
    return this.value === selectedColor;
  }).length > 1) {
    $(this).val("");
    // throws error if numbers arent in spec
    const message = selectedColor + " is already selected. Please choose a different color.";
    const errorElement = $("<div>").addClass("error-message").text(message);
    $(this).closest("td").append(errorElement);
    setTimeout(function() {
      errorElement.fadeOut(400, function() {
        $(this).remove();
      });
    }, 2000);
  } else {
    color = "." + selectedColor;
    colorName = selectedColor;
    prev = colorName;
  }
});

 //this is where we change and update the cell colors
 // we also make it so you cant color the upper and left most coomns 
  $("#main td").click(function() {
    const cell = $(this);
    const rowIn = this.parentNode.rowIndex;
    const cellIn = this.cellIndex;
    const isHeaderRow = rowIn === 0 || cellIn === 0;
    if (!isHeaderRow) {
      if (cell.hasClass(colorName)) {
        cell.removeClass(colorName);
      } else {
        cell.removeClass(prev);
        cell.addClass(colorName);
      }
      prev = colorName;
      const colorBox = cell.find('.color-box');
      const colorLabel = cell.find('.color-label');
      colorBox.css('background-color', colorName);
      colorLabel.text(colorName);
      const coordsLabel = $(color).closest('tr').find('.coords-label');
      coordsLabel.text('(' + rowIn + ', ' + cellIn + ')');
    }
  });
});
  </script>