<?php 
session_start(); 
include "../config.php";

if (isset($_POST['ad_name']) && isset($_POST['ad_pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$adname = validate($_POST['ad_name']);
	$adpass = validate($_POST['ad_pass']);

	if (empty($adname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($adpass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $adpass = md5($adpass);

        
		$sql = "SELECT * FROM amins WHERE ad_name='$adname' AND ad_pass='$adpass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['ad_name'] === $adname && $row['ad_pass'] === $adpass) {
            	$_SESSION['ad_name'] = $row['ad_name'];
            	$_SESSION['ad_email'] = $row['ad_email'];
                $_SESSION['ad_phone'] = $row['ad_phone'];
            	$_SESSION['ad_id'] = $row['ad_idid'];
            	header("Location:index.php");
		        exit();
            }else{
				header("Location:index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location:index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
?>