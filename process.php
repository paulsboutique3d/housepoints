<?php
include_once 'db.php';
if(isset($_POST['save']))
{	 
	 $Add_points_weeks = $_POST['Add_points_weeks'];
	 $Add_points_day = $_POST['Add_points_day'];
     $Add_points_house = $_POST['Add_points_house'];
     $points = $_POST['points'];
	 
	 $sql = "UPDATE $Add_points_house 
	 		SET $Add_points_day = coalesce($Add_points_day, $points) ,
			 total = coalesce(total, 0) + $points  
			
			WHERE Week = $Add_points_weeks" ;
	

	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	  
} 
if(isset($_POST['delete']))
{	 
	 $Delete_points_weeks = $_POST['Delete_points_weeks'];
	 $Delete_points_day = $_POST['Delete_points_day'];
     $Delete_points_house = $_POST['Delete_points_house'];
     $pointsdelte = $_POST['pointsdelete'];
	 
	 $sql = "UPDATE $Delete_points_house SET $Delete_points_day = '0' WHERE Week = $Delete_points_weeks " ;
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 
} 
if(isset($_POST['deleteterm']))
{	 
	 
     $Delete_points_house_term = $_POST['Delete_points_house_term'];
     $pointsdelte = $_POST['pointsdelete'];
	 
	 $sql = "UPDATE $Delete_points_house_term SET Monday = NULL, Tuesday = NULL, Thursday = NULL,  Other = NULL ";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 
} 

if(isset($_POST['deleteyear']))
{	 
	 
     $Delete_points_house_year = $_POST['Delete_points_house_year'];
     $pointsdelete = $_POST['pointsdelete'];
	 
	 $sql = "UPDATE $Delete_points_house_year SET total = NULL ";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 
} 

header("Location: points.php");
?>