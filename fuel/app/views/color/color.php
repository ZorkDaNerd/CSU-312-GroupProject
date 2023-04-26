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

  <form action='color' method='post'>
    <p>num rows: <input type='number' name='rows' id='rows'/> enter a number between 1 and 26</p>
    <p>num columns: <input type='number' name='cols' id='cols'/> enter a number between 1 and 26</p>
    <p>num color: <input type='number' name='color' id='color'/> enter a number between 1 and 10</p>
    <p><input type='submit'/></p>
    <?php

    echo Form::open(array('action' => 'index/necrocont/color',
    'method' => 'post',
    'id' => 'fuel_form'));
    echo Form::close();
  ?>
  </form>

  