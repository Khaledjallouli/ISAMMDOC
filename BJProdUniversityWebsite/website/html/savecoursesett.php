 <?php
 include "connect.php";
    session_start();

                            if (isset($_POST['language']) ) 
                            {
                                $var =  $_POST['language'];
                                $sess= $_SESSION['m_nId'] ;
                                    $grp= $_POST['grp'] ;
                                
                                    foreach ($grp as $grp) 
                                    {
                                        $sql = 'INSERT INTO member_course (m_nId,c_id,group_nb)VALUES ('. $sess .','. $var .',"'.$grp .'"    ) ';
                                        unset($_POST);
                                        if(!mysqli_query($conn, $sql))
                                        {
                                            die("ERROR:". $sql."<br>");
                                        }

                                    }
                                   
                                    

                                }
                          
                        ?>

                       