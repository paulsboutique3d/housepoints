<html>
<head>
<style>

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
tr:nth-child(even) {
    background-color: #eee;
    }
tr:nth-child(odd) {
    background-color: #fff;
    }



</style>
</head>
<body>


<?php

/*House points for seaton high school
*date: 23Feb2021
*creator: Rob Barnard
*/

include 'db.php' ;  //connect to DB
$sql = "SELECT *from white ORDER BY Week  ASC";   // pull all data for White house
$resultw = $conn->query($sql);

$sql = "SELECT *from blue ORDER BY Week  ASC";    // pull all data for Blue house
$resultb = $conn->query($sql);

$sql = "SELECT *from orange ORDER BY Week  ASC";   //pull all data for orange house
$resulto = $conn->query($sql);

$sql = "SELECT SUM(monday) as total from white";  //Monday total for white
$total = $conn->query($sql);
  
$sql = "SELECT SUM(tuesday) as total from white";  //Tuesday total for white
$totaltw = $conn->query($sql);
  
$sql = "SELECT SUM(thursday) as total from white";  //Thursday total for white
$totalthw = $conn->query($sql);

$sql = "SELECT SUM(other) as total from white";  //Other total for white
$totalow = $conn->query($sql);

$sql = "SELECT SUM(monday) as total from blue";  //Monday total for Blue
$totalmb = $conn->query($sql);
  
$sql = "SELECT SUM(tuesday) as total from blue";  //Tuesday total for Blue
$totaltb = $conn->query($sql);
  
$sql = "SELECT SUM(thursday) as total from blue";  //Thursday total for Blue
$totalthb = $conn->query($sql);

$sql = "SELECT SUM(other) as total from blue";  //Other total for Blue
$totalob = $conn->query($sql);

$sql = "SELECT SUM(monday) as total from orange";  //Monday total for Orange
$totalmo = $conn->query($sql);
  
$sql = "SELECT SUM(tuesday) as total from orange";  //Tuesday total for Oragne
$totalto = $conn->query($sql);
  
$sql = "SELECT SUM(thursday) as total from orange";  //Thursday total for orange
$totaltho = $conn->query($sql);

$sql = "SELECT SUM(other) as total from orange";  //Other total for Oragne
$totaloo = $conn->query($sql);


// Pulls the week total data blue 
$sql = "SELECT IFNULL(Monday,0) + IFNULL(Tuesday,0) + IFNULL(Thursday,0) + IFNULL(Other,0) AS weektotal from blue ORDER BY week ASC" ;
$wtb = $conn->query($sql);

// Pulls the week total data white 
$sql = "SELECT IFNULL(Monday,0) + IFNULL(Tuesday,0) + IFNULL(Thursday,0) + IFNULL(Other,0) AS weektotal from white ORDER BY week ASC" ;
$wtw = $conn->query($sql);

// Pulls the week total data orange 
$sql = "SELECT IFNULL(Monday,0) + IFNULL(Tuesday,0) + IFNULL(Thursday,0) + IFNULL(Other,0) AS weektotal from orange ORDER BY week ASC" ;
$wto = $conn->query($sql);

//Total term for blue
$sql = "SELECT SUM(IFNULL(Monday, 0) + IFNULL(Tuesday, 0) + IFNULL(Thursday, 0) + IFNULL(Other, 0)) AS termtotal from blue ";
$ttb = $conn->query($sql);

//Total term for orange
$sql = "SELECT SUM(IFNULL(Monday, 0) + IFNULL(Tuesday, 0) + IFNULL(Thursday, 0) + IFNULL(Other, 0)) AS termtotal from orange ";
$tto = $conn->query($sql);

//total term White
$sql = "SELECT SUM(IFNULL(Monday, 0) + IFNULL(Tuesday, 0) + IFNULL(Thursday, 0) + IFNULL(Other, 0)) AS termtotal from white ";
$ttw = $conn->query($sql);

//Total Year for White
$sql = "SELECT SUM(IFNULL(total, 0)) AS yeartotal from white ";
$tyw = $conn->query($sql);


//Total Year for blue
$sql = "SELECT SUM(IFNULL(total, 0)) AS yeartotal from blue ";
$tyb = $conn->query($sql);

//Total Year for orange
$sql = "SELECT SUM(IFNULL(total, 0)) AS yeartotal from orange ";
$tyo = $conn->query($sql);

    
echo '<table  style="width:33%; float: left">
    <tr>
    <th colspan="6" >White House</th>
    </tr>
    <tr>
    <th>Week</th>
    <th>Monday</th>
    <th>Tuesday</th>
    <th>Thursday</th>
    <th>Other</th>
    <th>Total</th>
  </tr>
  <tr>';
  if ($resultw->num_rows > 0) {
    // output data of each row for white
    while($row = $resultw->fetch_assoc()) {
      echo "<td style=background-color:#ebe65b>" .$row["Week"]. "</td>" ,"<td>" . $row["Monday"]. "</td>" ,"<td> " . $row["Tuesday"]. "</td>" ,"<td>" . $row["Thursday"]. "</td>" ,"<td>" . $row["Other"]. "</td>"  ,"<td>" ;
      $rowt = $wtw->fetch_assoc(); //prints week totals
      echo   $rowt["weektotal"] ;
      echo "</td>" ,"</tr>";
   }
 } ;

echo '<tr>
        <th>Total</th>'; //output total for white columns
        if ($total->num_rows > 0) {
            while($row = $total->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
        if ($total->num_rows > 0) {
            while($row = $totaltw->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
        if ($total->num_rows > 0) {
            while($row = $totalthw->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
        if ($total->num_rows > 0) {
            while($row = $totalow->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;

        echo' </tr>
        <tr>
          <td>&nbsp </td>
          <td>&nbsp </td>
          <td>&nbsp</td>
          <td> &nbsp</td>
          <td> &nbsp</td>
        </tr>
          <tr>
          <th colspan="2">Current Term Total White</th>
            <td>&nbsp </td>
            <td>&nbsp </td>
            <td>&nbsp</td>
           <th style="background-color:#15e623">'; if ($ttw->num_rows > 0) { //prints term total for white
                      while($row = $ttw->fetch_assoc()) {
                          echo  $row["termtotal"]; 
                      }
                  }; 
      echo '</thd></tr>
      <tr>
      <th colspan="2">Yearly Total White</th>
        <td>&nbsp </td>
        <td>&nbsp </td>
        <td>&nbsp</td>
        <th style="background-color:#15e623">'; if ($tyw->num_rows > 0) { //prints tyear total for white
                  while($row = $tyw->fetch_assoc()) {
                      echo  $row["yeartotal"]; 
                  }
              }; 
  echo '</thd></tr>
     </table>';

echo '<table style="width:33%; float: left">
  <tr>
  <th colspan="6" style="background-color:#0b03fc">Blue House</th>
  </tr>
  <tr>
  <th>Week</th>
  <th>Monday</th>
  <th>Tuesday</th>
  <th>Thursday</th>
  <th>Other</th>
  <th>Total</th>
</tr>
<tr>';
  if ($resultb->num_rows > 0) {
    // output data of each row for blue
    while($row = $resultb->fetch_assoc()) {
      echo "<td style=background-color:#ebe65b>" .$row["Week"]. "</td>" ,"<td>" . $row["Monday"]. "</td>" ,"<td> " . $row["Tuesday"]. "</td>" ,"<td>" . $row["THursday"]. "</td>" ,"<td>" . $row["Other"]. "</td>"  ,"<td>" ;
      $rowt = $wtb->fetch_assoc(); //prints week totals
      echo   $rowt["weektotal"] ;
      echo "</td>" ,"</tr>";
   }
 } ;

  echo ' <tr>
         <th>Total</th>'; //output total for blue columns
        if ($total->num_rows > 0) {
            while($row = $totalmb->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
        if ($total->num_rows > 0) {
            while($row = $totaltb->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
        if ($total->num_rows > 0) {
            while($row = $totalthb->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
        if ($total->num_rows > 0) {
            while($row = $totalob->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;

        echo' </tr>
        <tr>
          <td>&nbsp </td>
          <td>&nbsp </td>
          <td>&nbsp</td>
          <td> &nbsp</td>
          <td> &nbsp</td>
        </tr>
          <tr>
         
        <th colspan="2">Current Term Total Blue</th>
            <td>&nbsp </td>
            <td>&nbsp </td>
            <td>&nbsp</td>
            <th style="background-color:#15e623">'; if ($ttb->num_rows > 0) { //prints term total for blue
              while($row = $ttb->fetch_assoc()) {
                  echo  $row["termtotal"]; 
              }
          }; 
echo '</th></tr>
<tr>
        <th colspan="2">Yearly Total Blue</th>
          <td>&nbsp </td>
          <td>&nbsp </td>
          <td>&nbsp</td>
          <th style="background-color:#15e623">'; if ($tyb->num_rows > 0) { //prints year total form blue
            while($row = $tyb->fetch_assoc()) {
                echo  $row["yeartotal"]; 
              }
            }; 

 echo '</thd>
      </tr>

</table>';


  echo '<table style="width:33%; float: left">
  <tr>
  <th colspan="6" style="background-color:#ebb15b">Orange House</th>
  </tr>
  <tr>
  <th>Week</th>
  <th>Monday</th>
  <th>Tuesday</th>
  <th>Thursday</th>
  <th>Other</th>
  <th>Total</th>
</tr>
<tr>';
  
  if ($resulto->num_rows > 0) {
    // output data of each row for Orange
    while($row = $resulto->fetch_assoc()) {
      echo "<td style=background-color:#ebe65b>" .$row["Week"]. "</td>" ,"<td>" . $row["Monday"]. "</td>" ,"<td> " . $row["Tuesday"]. "</td>" ,"<td>" . $row["Thursday"]. "</td>" ,"<td>" . $row["Other"]. "</td>"  ,"<td>" ;
      $rowt = $wto->fetch_assoc(); //prints week totals
      echo   $rowt["weektotal"] ;
      echo "</td>" ,"</tr>";
   }
 } ;

  echo '<tr>  
        <th>Total</th>'; //output total for orange columns
        if ($total->num_rows > 0) {
            while($row = $totalmo->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
        if ($total->num_rows > 0) {
            while($row = $totalto->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
        if ($total->num_rows > 0) {
            while($row = $totaltho->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
        if ($total->num_rows > 0) {
            while($row = $totaloo->fetch_assoc()) {
                echo  "<th>" .$row["total"]. "</th>";
            }
        } ;
 
echo' </tr>
      <tr>
        <td>&nbsp </td>
        <td>&nbsp </td>
        <td>&nbsp</td>
        <td> &nbsp</td>
        <td> &nbsp</td>
      </tr>
        <tr>
        
      <th colspan="2">Current Term Total Orange</th>
            <td>&nbsp </td>
            <td>&nbsp </td>
            <td>&nbsp</td>
            <th style="background-color:#15e623">'; if ($tto->num_rows > 0) {  //prints term total for orange
              while($row = $tto->fetch_assoc()) {
                  echo  $row["termtotal"]; 
              }
          }; 

// input boxes......below       
echo '</th></tr>
        <tr>
        <th colspan="2">Yearly Total orange</th>
          <td>&nbsp </td>
          <td>&nbsp </td>
          <td>&nbsp</td>
          <th style="background-color:#15e623">'; if ($tyo->num_rows > 0) { //prints year total for orange
            while($row = $tyo->fetch_assoc()) {
                echo  $row["yeartotal"];     
                
              }
            }; 
 echo '</thd>
      </tr>

</table>

<table>
  <tr>
    <td>
       &nbsp;
    </td>
  </tr>
  <tr>
    <td>
       &nbsp;
    </td>
  </tr>
  <tr>
    <th>
      Kenny Loggins area .....
    </th>
  </tr>
  <tr>
    <td>
      &nbsp;
    </td>
  </tr>
  <tr>
    <td>&nbsp;
<form method="post" action="process.php">

<label for="Add_Points">Add points:</label>

<select name="Add_points_weeks" id="Add_points_weeks">
  <option value="1">Week 1</option>
  <option value="2">Week 2</option>
  <option value="3">Week 3</option>
  <option value="4">Week 4</option>
  <option value="5">Week 5</option>
  <option value="6">Week 6</option>
  <option value="7">Week 7</option>
  <option value="8">Week 8</option>
  <option value="9">Week 9</option>
  <option value="10">Week 10</option>
  <option value="11">Week 11</option>
</select>

<select name="Add_points_day" id="Add_points_day">
  <option value="Monday">Monday</option>
  <option value="Tuesday">Tuesday</option>
  <option value="Thursday">Thursday</option>
  <option value="Other">Other</option>
</select>

<select name="Add_points_house" id="Add_points_house">
  <option value="white">White</option>
  <option value="blue">Blue</option>
  <option value="orange">Orange</option>
</select>

<input type="text" id="points" name="points" >
<input type="submit" name="save">
</form>

<form method="post" action="process.php">

<label for="Delete_points">Delete points:</label>

<select name="Delete_points_weeks" id="Delete_points_weeks">
  <option value="1">Week 1</option>
  <option value="2">Week 2</option>
  <option value="3">Week 3</option>
  <option value="4">Week 4</option>
  <option value="5">Week 5</option>
  <option value="6">Week 6</option>
  <option value="7">Week 7</option>
  <option value="8">Week 8</option>
  <option value="9">Week 9</option>
  <option value="10">Week 10</option>
  <option value="11">Week 11</option>
</select>

<select name="Delete_points_day" id="Delete_points_day">
  <option value="Monday">Monday</option>
  <option value="Tuesday">Tuesday</option>
  <option value="Thursday">Thursday</option>
  <option value="Other">Other</option>
</select>

<select name="Delete_points_house" id="Delete_points_house">
  <option value="white">White</option>
  <option value="blue">Blue</option>
  <option value="orange">Orange</option>
</select>

<input type="submit" name="delete">
</form>

<form method="post" action="process.php">

<label for="Delete_term_data">Delete term data:</label>
<select name="Delete_points_house_term" id="Delete_points_house_term">
  <option value="white">White</option>
  <option value="blue">Blue</option>
  <option value="orange">Orange</option>
</select>

<input type="submit" name="deleteterm">
</form>

<form method="post" action="process.php">

<label for="Delete_term_data">Delete year total:</label>
<select name="Delete_points_house_year" id="Delete_points_house_year">
  <option value="white">White</option>
  <option value="blue">Blue</option>
  <option value="orange">Orange</option>
</select>

<input type="submit" name="deleteyear">
</form>
            </td>
            </tr>
            </table>


';
$conn->close();
?>
</body>
</html>


