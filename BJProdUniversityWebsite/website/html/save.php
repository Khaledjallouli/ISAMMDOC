<?php
	include "connect.php";
	session_start();

	 $sql="SELECT m_nId FROM member WHERE m_nId='$_POST[m_nId]'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)){
		die("There is someone with this national ID number, please try different one"."<br><a href='register.php'> Go back</a>" );
	}	

$rn = $_POST['m_rn'] ;

if (!empty($_POST['m_cat'])) 
$cat = $_POST['m_cat'] ;
else 
$cat = 'NULL' ;

if (!empty($_POST['m_level'])) 
$level = $_POST['m_level'] ;


if (!empty($_POST['m_groupnb'])) 
$gnb = $_POST['m_groupnb'] ;
else 
$gnb = '' ;
	
	if ($_POST['m_role']=="Student") {

	
	$sql1="INSERT INTO member (m_fName, m_lName, m_nId,m_rn,m_role, m_gender, m_cat, m_level, m_groupnb,m_pass) VALUES('$_POST[m_fName]','$_POST[m_lName]','$_POST[m_nId]','$rn','$_POST[m_role]','$_POST[m_gender]','$cat','$level','$gnb',md5('$rn'));";
	}else{
		$sql1="INSERT INTO member (m_fName, m_lName, m_nId,m_rn,m_role, m_gender,m_pass) VALUES('$_POST[m_fName]','$_POST[m_lName]','$_POST[m_nId]','$rn','$_POST[m_role]','$_POST[m_gender]',md5('$rn'));";

	}
if(!mysqli_query($conn, $sql1)){
	die("ERROR:". $sql1."<br>" . mysqli_error($conn));

}




  // insert into member table
//$sql="INSERT INTO member (m_fName, m_lName, m_nId, m_rn, m_email, m_role,m_bdate,m_gender) VALUES('$_POST[m_fName]', '$_POST[m_lName]','$_POST[m_nId]','$_POST[m_rn]','$_POST[m_email]','$_POST[m_pass]'X,'$_POST[m_role]','$_POST[m_bdate]','$_POST[m_gender]');";


  	$sel = "SELECT c_id FROM course WHERE c_cat = '$_POST[m_cat]' and c_level ='$_POST[m_level]' " ;
		$res=mysqli_query($conn,$sel);
	if(mysqli_num_rows($res)){
		while($re=mysqli_fetch_assoc($res)){
			$id = $re['c_id'] ;
  
  $sql ="INSERT INTO grade(c_id,m_nId) VALUES( '$id','$_POST[m_nId]')";
   if(!mysqli_query($conn, $sql)){
	die("ERROR:". $sql."<br>" . mysqli_error($conn));

}


	}
	}	



			
		
			header('location:newmember.php');

			mysqli_close($conn);

		?>
                   