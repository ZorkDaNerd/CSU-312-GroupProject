<!DOCTYPE html>
<html>

<h1> Color Coordinator </h1> 

<button id="print-btn">Print</button>
<script>
  const printBtn = document.querySelector('#print-btn');
const pageBody = document.querySelector('body');
const pageNav = document.querySelector('nav');
const ul = document.querySelector('ul');

printBtn.addEventListener('click', function() {
  pageBody.classList.add('black-white');
  pageNav.classList.add('hide-nav');
  ul.classList.add('hide-ul');
});
  
</script>


  <form action='color' method='post'>
    <p>num rows: <input type='number' name='rows' id='rows'/></p>
    <p>num color: <input type='number' name='color' id='color'/></p>
    <p><input type='submit'/></p>
    <?php
    //echo $new_post_value;

    echo Form::open(array('action' => 'index/necrocont/color',
    'method' => 'post',
    'id' => 'fuel_form'));
    // echo Form::label('myvalue', 'Enter a value:');
    // echo Form::input('myvalue');
    // echo Form::submit('submit', 'Submit');
    echo Form::close();
  ?>
  </form>

  <?php
    $num = $_POST['rows'];
    echo $num;
  ?>


  