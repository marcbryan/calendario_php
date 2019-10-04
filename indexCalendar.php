<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calendario</title>
    <link rel="stylesheet" type="text/css" href="css/calendar.css">
  </head>
  <body>
    <?php
      define("MONTH_NAMES", array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"));
      $actual_month = date('m');
      //echo "<script>console.log(".$actual_month.");</script>";
      // Le restamos 1 porque el mes que devuelve es un número entre 1 y 12 (Enero es seria 1, por lo tanto, le restamos 1)
      echo "<h2>".MONTH_NAMES[$actual_month-1]."</h2>";
     ?>
    <table id='tCalendar'>
      <?php
        define("ROWS", 6);
        define("COLUMNS", 7);
        define("DAY_NAMES", array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"));
        $fdm = new DateTime('first day of this month');
        $dow = $fdm -> format('N');
        $ldm = new DateTime('last day of this month');
        $last_day = $ldm -> format('j');
        $day_number = 1;
        $print_days = FALSE;
        for ($i=0; $i < ROWS; $i++) {
          echo "<tr id='row".$i."'>";
          for ($j=0; $j < COLUMNS; $j++) {
            if ($i == 0) {
              echo "<th>".DAY_NAMES[$j]."</th>";
            } else {
              if ($i == 1 && $j == ($dow-1)) {
                $print_days = TRUE;
              } else if ($day_number > $last_day) {
                $print_days = FALSE;
              }
              if ($print_days == TRUE) {
                echo "<td>".$day_number."</td>";
                $day_number += 1;
              } else {
                echo "<td></td>";
              }
            }
          }
          echo "</tr>";
        }
       ?>
    </table>
  </body>
</html>
