<?php
print_r($_FILES);


?>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
 
    <body>
<html lang="en">

  <meta charset="utf-8">
  <title>serialize demo</title>
  <style>
  body, select {
    font-size: 12px;
  }
  form {
    margin: 5px;
  }
  p {
    color: red;
    margin: 5px;
    font-size: 14px;
  }
  b {
    color: blue;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>

 
<form>
  <select name="single">
    <option>Single</option>
    <option>Single2</option>
  </select>
 
  <br>
  <input type="button" values="envia">
   
 
  <br>
  <input type="file" name="check" value="check1" id="ch1">
  <label for="ch1">check1</label>
  
 
</form>
 
<p><tt id="results"></tt></p>
 
<script type="text/javascript">
  function showValues() {
    var str = '<?php $_FILES["archivo"]["name"]; ?>';
    
    alert(str);
    $( "#results" ).text( str );
  }
  $( "input[type='file']" ).on( "click", showValues );
  $( "input[type='button']" ).on( "change", showValues );
  showValues();
</script>
 <?php
 echo '--';
    ?>
</body>
</html>