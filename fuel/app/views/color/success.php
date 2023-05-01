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
          if ($i == 0) {
            echo '<input type="radio" name="color" value="' . $colors[$i] . '" checked>';
          } else {
            echo '<input type="radio" name="color" value="' . $colors[$i] . '">';
          }
          ?>
      </td>
      <td class="left-col">Color <?php echo $i+1; ?>
        <select class="colordrop" onchange="updateColor(this)" title="selectcolor">
          <?php foreach ($colors as $c) { ?>
            <option value="<?php echo $c; ?>" <?php echo ($c === $colors[$i]) ? 'selected' : ''; ?>><?php echo $c; ?></option>
          <?php } ?>
        </select>
      </td>
      <td class="right-col">
        <span class="color-box" style="background-color:<?php echo $colors[$i]; ?>;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span class="color-label"><?php echo $colors[$i]; ?></span>
      </td>
    </tr>
  <?php } ?>
</table>



<script>
  function updateColor(select) {
    var colorBox = select.parentNode.parentNode.querySelector('.color-box');
    var colorLabel = select.parentNode.parentNode.querySelector('.color-label');
    colorBox.style.backgroundColor = select.value;
    colorLabel.textContent = select.value;
  }
  
</script>  

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

// const radioButtons = document.querySelectorAll('input[type="radio"]');

// radioButtons.forEach(radioButton => {
//   radioButton.addEventListener('change', () => {
//     const selectedOption = document.querySelector('input[type="radio"]:checked').value;
//     console.log(selectedOption);
//   });
// });

  let color = ".red";
  let colorName = "red";
  let prev = "red";
  //insted of clicking the first table make it based off the radio buttons
  $(document).ready(function(){
  $("input[type='radio']").change(function(){
    let clicked = $(this).closest('td');
    let cellIn = clicked[0].cellIndex;
    let rowIn = clicked[0].parentNode.rowIndex;
    if(clicked.is(color)){
      //$(clicked).removeAttr('class');
      // color = "." + clicked.attr('class');
      // colorName = clicked.attr('class');
      color = "." + this.closest('td').querySelector('.colordrop').value;
      colorName = this.closest('td').querySelector('.colordrop').value;
    }
    else{
      //$(clicked).attr('class', colorName);
      // color = "." + clicked.attr('class');
      // colorName = clicked.attr('class');
      color = "." + this.closest('td').querySelector('.colordrop').value;
      colorName = this.closest('td').querySelector('.colordrop').value;
    }
    prev = colorName;
  });
});


  $(document).ready(function(){
  
      let row2 = 0;
      let cell2 = 0;
      const Main = document.getElementById('main').rows[row2].cells[cell2];
      let row2up = row2 + 1;
      let row2down = row2 - 1;
      $("#main td").click(function(){
          let clicked2 = $(this);
          let cellIn = this.cellIndex;
          
          if(cellIn == 0 || this.parentNode.rowIndex == 0){
            return;
          }
          else if(clicked2.is(color)){
            $(clicked2).removeAttr('class');
          }
          else{
            $(clicked2).attr('class', colorName);
          }
      });

  });
  </script>


<script>

// function checkSelection(selectElement) {
//   var colors = <?php echo json_encode($colors); ?>;
//   console.log('checkSelection called');
//   var selectedColor = selectElement.value;
//   var selectIndex = selectElement.parentNode.parentNode.rowIndex - 1;
//   var warningSpan = selectElement.parentNode.querySelector(".warning-color");
//   var isDuplicate = false;

//   // Get the right column element
//   var rightCol = document.getElementById("right-col-" + selectIndex);

//   // Check if the selected color has already been selected
//   for (var i = 0; i < colors.length; i++) {
//     if (i !== selectIndex && selectedColor === colors[i]) {
//       selectElement.style.backgroundColor = "red";
//       warningSpan.style.display = "block";
//       isDuplicate = true;
//       break;
//     }
//   }

//   if (!isDuplicate) {
//     selectElement.style.backgroundColor = "black";
//     warningSpan.style.display = "none";
//   } else {
//     // Check if the selected color is the same as the previously selected color
//     var previousColor = selectElement.getAttribute("data-previous-color");
//     if (selectedColor === previousColor) {
//       selectElement.style.backgroundColor = "black";
//       warningSpan.style.display = "none";
//       isDuplicate = false;
//     }
//   }

//   if (!isDuplicate) {
//     selectElement.setAttribute("data-previous-color", selectedColor);
//   }
//   else {
//     selectElement.removeAttribute("data-previous-color");
//   }

//   // Set the background color of the right column element
//   rightCol.style.backgroundColor = selectedColor;
// }

</script>




