<?php

if(isset($_POST["val_button"]))
{		
echo"";		
} // end if isset
	
// ################## Đọc file json để cập nhật stt ##################################	
 $jsonString = file_get_contents("test/test.json");
	$data = json_decode($jsonString, true);
	
// chương trình cho hiển thị trạng thái bóng đèn
  // echo "";
	 //################################# LED ON OK CHUA ###############################	

	 //###############################LED ON#################################
		 if ($data['led1'] == 'on')
	 {
			echo "	  <script>";
   	        echo "  document.getElementById('hh').innerHTML = 'LOADING NEW' ";
   	        echo "    </script> ";
	 }
	  

	 //################################# LED OFF ###############################
	 if ($data['led1'] == 'off')
	 {
		echo "	  <script>";
	    echo "  document.getElementById('hh').innerHTML = 'DONE!' ";
		echo "    </script> ";
	 }
	  
	  

	
?>
									
	
	

	


