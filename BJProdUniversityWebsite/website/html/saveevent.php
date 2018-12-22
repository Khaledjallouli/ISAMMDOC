<?php
	include "connect.php";
	session_start();


                            $memberid = $_SESSION['m_nId'];
                             $fname = $_SESSION['m_fName'];
                             $lname = $_SESSION['m_lName'] ;



	$target = "images/".basename($_FILES['e_photo']['name']);
	$target_c = "images/".basename($_FILES['e_club_pic']['name']);
	$image = $_FILES['e_photo']['name'];
	$image_c = $_FILES['e_club_pic']['name'];
	
$sql="INSERT INTO event (e_title,e_photo,e_description,e_startdate,e_enddate,e_place,e_supervisor,m_nId,e_club_name,e_club_pic) VALUES('$_POST[e_title]','$image', '$_POST[e_description]','$_POST[e_startdate]','$_POST[e_enddate]','$_POST[e_place]','$_POST[e_supervisor]','$memberid','$_POST[e_club_name]','$image_c' )";

	

	if (move_uploaded_file($_FILES['e_photo']['tmp_name'], $target)) {
		echo "Image uploaded" ;
	}
	else { 
		echo"problem" ; 
	}
		if (move_uploaded_file($_FILES['e_club_pic']['tmp_name'], $target_c)) {
		echo "Image uploaded" ;
	}
	else { 
		echo"problem" ; 
	}
	

if(!mysqli_query($conn, $sql)){
	die("ERROR:". $sql."<br>");

}


 header('location:events.php');
 mysqli_close($conn);
 
?>

