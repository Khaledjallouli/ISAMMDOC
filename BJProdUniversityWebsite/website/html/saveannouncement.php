<?php
	include "connect.php";
	session_start();


                         
               $nid = $_SESSION['m_nId'];
                            



	$target = "files/".basename($_FILES['a_attachment']['name']);
	
	$image = $_FILES['a_attachment']['name'];
	 $tmpName  = $_FILES['a_attachment']['tmp_name'];
	    $type = $_FILES['a_attachment']['type'];
        $size = $_FILES['a_attachment']['size'];

	$location = "files/$image" ;

	
	$sql="INSERT INTO announcement (a_subject,a_posternid,a_message,a_attachment,a_path,a_size,a_type,a_date,a_level,a_cat) VALUES('$_POST[a_subject]', '$nid','$_POST[a_message]','$image','$location','$size','$type', now(),'$_POST[a_level]','$_POST[a_cat]')";
	

	

	if (move_uploaded_file($_FILES['a_attachment']['tmp_name'], $target)) {
		echo "Image uploaded" ;
	}
	else { 
		echo"problem" ; 
	}
		

if(!mysqli_query($conn, $sql)){
	die("ERROR:". $sql."<br>");

}


 header('location:news.php');
 mysqli_close($conn);
 
?>

	