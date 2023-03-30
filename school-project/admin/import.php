<?php
include("../includes/conn.php");
if(isset($_POST["Import"])){
		

		//echo $filename=$_FILES["file"]["tmp_name"];
		$file_tmp=$_FILES["file"]["tmp_name"];
		 $filename=rand() . '-' .$_FILES["file"]["name"];
		 move_uploaded_file($file_tmp,"./csv_files/".$filename);
		 
		 
//  		echo $filename;
// 		$nfile = fopen('./csv_files/' . $filename, 'r');
// 		print_r(fgetcsv($nfile));
// 		fclose($nfile);
// exit;
		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen('./csv_files/' . $filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
				//  print '<pre>';
	            //  print_r($emapData);
	            //  echo '<br>';
				// // echo $emapData[12];
	            // // echo "dddddddd". date('Y-m-d',$emapData[12]);


				//  $date2 = strtotime($emapData[12]);
				// echo "hi". $date_ins2 =  date("d-m-Y", $date2);

	            //  exit();
	    
	          //It wiil insert a row to our subject table from our csv file`
	          // $sql = "INSERT into subject (`SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`,COURSE_ID, `AY`, `SEMESTER`)values('$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";


			  $sql = "INSERT INTO `peters_student` (`student_first_name`, `student_last_name`, `student_fathers_name`, `student_mothers_name`,`student_email_address`, `student_phone_no`, `student_address`, `student_class`, `student_section`, `student_roll_no`, `student_username`, `student_password`, `student_create_date`, `student_status`, `login_type`) values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]')";
            //   echo '<pre>';
            //   echo $sql;
            //   exit();

			 //echo $sql;
			//  exit;


	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysqli_query( $conn, $sql );

			  if($result)
			  {
				echo "<script type=\"text/javascript\">
				alert(\"CSV File has been successfully Imported.\");
				window.location = \"view_student.php\"
				</script>";
			  } else {
				echo "<script type=\"text/javascript\">
				alert(\"Invalid File: Unable to import data.\");
				window.location = \"import_to_excel.php\"
				</script>";
			  }

			/*	if(!$result)
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File: Unable to import data.\");
						window.location = \"import_to_excel.php\"
						</script>";
				
				}*/

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	       /*  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"view_student.php\"
					</script>";
	        
			 

			 //close of connection
			mysqli_close($conn); */
				
		 	
			
		 }
	}	 
?>		 