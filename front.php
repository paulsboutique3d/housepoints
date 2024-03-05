<html>
<head>
<meta http-equiv="refresh" content="10">
<style>
table, th, td {
   
  border-collapse: collapse;
  border: 0px solid black;
}
p {
    font-size:30px;
}

h1{
    font-size:20px;
}

h2{
    font-size:120px;
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


//Total term for blue Marungayu
$sql = "SELECT SUM(IFNULL(Monday, 0) + IFNULL(Tuesday, 0) + IFNULL(Thursday, 0) + IFNULL(Other, 0)) AS termtotal from blue ";
$ttb = $conn->query($sql);

//Total term for orange Tarnta
$sql = "SELECT SUM(IFNULL(Monday, 0) + IFNULL(Tuesday, 0) + IFNULL(Thursday, 0) + IFNULL(Other, 0)) AS termtotal from orange ";
$tto = $conn->query($sql);

//total term White Wirltu
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



echo '
<table style="height: 600" width="auto">
<tbody>
<tr style="height: 15%; background-color: #6699cc;">
<td style="width: 33%; height: 15%;"><h1 style="text-align: center;"><span style="color: #ffffff;"><strong>2024 HOUSE SHIELD POINTS</strong></span></h1></td>
<td style="width: 33%; height: 15%;">&nbsp;</td>
<td style="width: 33%; height: 15%;"><h1 style="text-align: center;"><span style="color: #ffffff;"><strong>LEADER BOARD</strong></h1></td>
</tr>
<tr >
<td style="width: 33%; background-color: orange; height: 25%;"><p style="text-align: center;"><span style="color: #ffffff;"><strong>TARNTA</strong</p></td>
<td style="width: 33%; height: 25%;"><p style="text-align: center;"><strong>WIRLTU</strong></p></td>
<td style="width: 33%; height: 25%; background-color: #003366;"><p style="text-align: center;"><span style="color: #ffffff;"><strong>MARUNGAYU</strong</p></td>
</tr>
<tr >
<td style="width: 33%; background-color: orange; height: 45%;"><h2 style="text-align: center;"><span style="color: #ffffff;"><strong>';
if ($tto->num_rows > 0) {  //prints term total for orange
    while($row = $tyo->fetch_assoc()) {
        echo  $row["yeartotal"]; 
    }
}; 
echo '</strong></h2></td>
<td style="width: 33%; height: 45%;"><h2 style="text-align: center; "><span style="color: #000000;"><strong>';
if ($ttb->num_rows > 0) { //prints term total for white
    while($row = $tyw->fetch_assoc()) {
        echo  $row["yeartotal"]; 
    }
}; 
echo '</strong></h2></td>
<td style="width: 33%; height: 45%; background-color: #003366;"><h2 style="text-align: center;"><span style="color: #ffffff;"><strong>'; 
if ($ttb->num_rows > 0) { //prints term total for blue
    while($row = $tyb->fetch_assoc()) {
        echo  $row["yeartotal"]; 
    }
}; 
echo '</strong></h2></td>
</tr>
</tbody>
</table>
';

?>

</body>
</html>

