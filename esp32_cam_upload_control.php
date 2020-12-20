
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- <meta http-equiv="refresh" content="3"> -->
    <title>He Thong Dieu Khien</title>
    <link rel = "stylesheet" type="text/css" href="style.css"/>
    
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/ajax.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>

  
</head>
<body  align="center">
 		<br />
		<header> 
       
         <h2> <span style="color:#00F">HỆ THỐNG GIÁM SÁT QUA INTERNET SỬ DỤNG ESP32-CAMERA </span><br />
         
   	 
      </h2>
      </header>
  
   <?php
  
   $jsonString = file_get_contents("test/test.json");
   $data = json_decode($jsonString, true);
	
	  $user='abcd_ef';
	if(isset($_POST['LED1_ON']))
	{
		if($user==$_POST['LED1_ON'])
		{
		$data['led1'] = "on";		
		}
	}

   
	$newJsonString = json_encode($data);
	file_put_contents("test/test.json", $newJsonString);

   ?>     
 <form action="esp32_cam_upload_control.php" method="post">       
	<table border="2" width=100% height="400px" align="center">
		<tr class="indam">
        	<td bgcolor="#FFCC00">HÌNH ẢNH</td>
            <td bgcolor="#FFCC00">TRẠNG THÁI</td>
            <td bgcolor="#FFCC00"> ĐIỀU KHIỂN</td>
            
        </tr>
        <tr>
        	
        	 <td><img id="myImage1" src="camera_upload/upload_esp32.jpg" width="500" height="400"></td>
            <td id="hh" >
             Hello!
            </td>
            <td> <p>
            <?php
			$user='abcd_ef';
             echo "   <button style='height:60px; width:60px;' type='submit'  name='LED1_ON' value='$user'>TAKE PHOTO</button> ";
             echo "   <button style='height:60px; width:60px;' type='button' onclick='myFunction_reload()'>RELOAD</button> ";
            
			?>
				</p>
                </td>
                 <td    id="ketqua" > </td>
    
        </tr>
       

    </table>
    
    
 </form>

 <?php
   $jsonString = file_get_contents("test/test.json");
	$data = json_decode($jsonString, true);
	
 
 if ($data['led1'] == 'on')
 {
	echo "	  <script>";
   	echo "  document.getElementById('hh').innerHTML = 'TAKING PHOTO' ";
   	echo "    </script> ";
 }
 
 
 
 ?>
 <script >
 
 function myFunction_reload()	
	{
	window.location.reload();
	}
 
 var t=setTimeout("auto_update_stt()",1000);
 
	function auto_update_stt()
		{
		    //	alert("Hbyeee");
    		var t=setTimeout("auto_update_stt()",1000);	
				$.ajax({
			
				url:"sync_allpages.php",
				type:"post",
				data:"val_button="+1,
				async:true,
				success:function(kq){
				    
				$("#ketqua").html(kq);
				//	alert("OK");
				}
				
			});
					
		}
	
</script>   