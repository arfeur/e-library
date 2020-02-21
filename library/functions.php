<?php
/*
   functions.php
   Author: Arthur Dherbomez
   Create the: 20/02
   Description: Differents functions we need in books.php
*/
function generateForm(){
    /*
       Generate the form for research and insert function in books.php
    */
    echo "<form method='post' action='books.php'>
        <div>
            <label for='author'>Author :</label>
            <input type='text' name='author'>
        </div>
        <div>
            <label for='title'>Title :</label>
            <input type='text' name='title'>
        </div>
        <div>
            <label for='publisher'>Publisher :</label>
            <input type='text' name='publisher'>
        </div>
        <div>
            <label for='year'>Year :</label>
            <input type='text' name='year'>
        </div>
            <input type='submit' name='button' value='Enter'>
        </div>
  </form>";
}

function generateTable($array_index,$data){
    /*
        Automise the generation for columns of a table with data entry
    */
    foreach ($array_index as $index) {
      echo "<td>".$data[$index]."</td>";
    }
}
 ?>
