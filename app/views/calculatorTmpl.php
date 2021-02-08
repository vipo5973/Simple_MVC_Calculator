<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <base href="<?php echo URL_ROOT;?>">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo URL_ROOT;?>public/css/styles.css">
    <script>
      function send(operation) {
        let number1 = document.getElementById("number1").value;
        let number2 = document.getElementById("number2").value;
        let root = document.location.hostname;
        switch (operation) {
          case '+':
            operation = 'plus'; break;
          case '-':
            operation = 'minus'; break;
          case 'x':
            operation = 'times'; break;
          case '/':
            operation = 'divided'; break;
        }
        if(number1!="" && number2!="") {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("result").value = this.responseText;
            }
          };
          //the root directory will need to change according to installation
          xmlhttp.open("GET", "http://" + root + "/Calculator/calculator/" + operation + "/" + number1 + "/" +  number2 + "/" + 1, true); // +
          xmlhttp.send();
        } else {
          return
        }
      }
      </script>
      <script>
        function clear_fields() {
          document.getElementById("number1").value = "";
          document.getElementById("number2").value = "";
          document.getElementById("result").value = "";
        }
    </script>
  </head>
  <body>
    <div class="flex">
      <h1>Calculator</h1>
    </div>
    <div class="">
      <form class="calculator" action="CalculatorController.php" method="get">
        <input class="number" id="number1" type="number" step="any" name="number1" value="<?php echo $number1;?>" placeholder="number 1">
        <input class="number" id="number2" type="number" step="any" name="number2" value="<?php echo $number2;?>" placeholder="number 2">
        <input class="op_btn" type="submit" name="operation" value="+" onClick="event.preventDefault();send(this.value)">
        <input class="op_btn" type="submit" name="operation" value="-" onClick="event.preventDefault();send(this.value)">
        <input class="op_btn" type="submit" name="operation" value="x" onClick="event.preventDefault();send(this.value)">
        <input class="op_btn" type="submit" name="operation" value="/" onClick="event.preventDefault();send(this.value)">
        <input class="result" id="result" type="text" name="result" value="<?php echo $result;?>" readonly>
        <input class="res_btn" type="submit" name="reset" value="X" onClick="event.preventDefault();clear_fields()">
      </form>
    </div>
    <div class="flex">
      <a class="btn" href="history/show">Show history</a>
    </div>

  </body>
</html>
