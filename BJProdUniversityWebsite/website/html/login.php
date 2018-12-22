<?php
    session_start();
    include "connect.php";

    //Check for national ID exisitance 

    $sql="SELECT * FROM member WHERE m_nId='$_POST[m_nId]' AND m_pass=md5('$_POST[m_pass]') LIMIT 1";
    $result=mysqli_query($conn,$sql);


    if(mysqli_num_rows($result)){
        echo "number of rows". mysqli_num_rows($result)."<br>";
        $myrow = mysqli_fetch_array($result);
        if($myrow["m_nId"]=$_POST["m_nId"] AND $myrow["m_pass"]=$_POST["m_pass"]){
            
            echo $myrow["m_nId"]." ". $myrow["m_pass"]. " First name = ". $myrow["m_fName"]. " Last name = ". $myrow["m_lName"] ." ". $myrow["phonenumber"] ."<br>";
            $_SESSION["m_nId"]=$myrow["m_nId"];
            $_SESSION["m_fName"]=$myrow["m_fName"];
            $_SESSION["m_lName"]=$myrow["m_lName"];
            $_SESSION["m_rn"]=$myrow["m_rn"];
            $_SESSION["m_email"]=$myrow["m_email"];
            $_SESSION["m_pass"]=$myrow["m_pass"];
            $_SESSION["m_role"]=$myrow["m_role"];

            $_SESSION["m_level"]=$myrow["m_level"];
            $_SESSION["m_cat"]=$myrow["m_cat"];


            echo $_SESSION["m_fName"]. " ". $_SESSION["m_lName"];
            echo "You have successfully logged in. <br><a href='index.php'> Go to Main Page </a>";
            header('location:index.php');
            exit();
        }
        else{
            $_SESSION["login"]=1;
            $_SESSION["signup"]=0;
            $_SESSION["alert"]=0;
            header('location:index.php');

        }
    }   
    else{
            $_SESSION["login"]=1;
            $_SESSION["signup"]=0;
            $_SESSION["alert"]=0;
            header('location:index.php');
    }
    mysqli_close($conn);
?>