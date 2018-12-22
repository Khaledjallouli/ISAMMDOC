<?php
	include "connect.php";
	session_start();
	$output='';

	if (isset($_POST['searchVal'])) {
		$searchq = $_POST['searchVal'];
		$searchq = preg_replace("#[^0-9a-z]#i","", $searchq) ;

		$quer ="SELECT * FROM member where m_fName LIKE '%$searchq%' OR m_lName LIKE '%$searchq%'" ;
		$query=mysqli_query($conn,$quer);

		$count = mysqli_num_rows($query);
		if ($count == 0) {
			$output = 'There was no search result';

		} 
		else {
			while ($row = mysqli_fetch_array($query)) {
				$fname = $row['m_fName'];
				$lname= $row['m_lName'];
				$mnid = $row['m_nId'];

				 $fn = $row["m_fName"];
                      $ln = $row["m_lName"];
                      $nd = $row["m_nId"];
                      $rn = $row["m_rn"];
                      $em = $row["m_email"];
                      $fph = $row["m_phNumber"];
                      $pic = $row["m_Pic"];

				$output .= "<tr>
				                <td  class='latest-reply'>". $fn  ."</td>
				                <td  class='latest-reply'>". $nd  ."</td>
				                <td  class='latest-reply'>". $rn  ."</td>
				                <td  class='latest-reply'>". $em  ."</td>
				                <td  class='latest-reply'>". $fph ."</td>
				                <td  class='latest-reply'>". $fph ."</td>
            				</tr>"  ;


 							





				
				
			}
		}
	}
	echo ($output);
	?>