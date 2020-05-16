<html>
<head>
<title>3D</title>
<meta http-equiv="Content-Language" content="tr">

  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">

  <meta http-equiv="Pragma" content="no-cache">

  <meta http-equiv="Expires" content="now">
  
  

</head>

<body>

<h1>3D �deme Sayfasi</h1>
    
    
<h3>3D D�nen Parametreler</h3>
    <table border="1">
        <tr>
            <td><b>Parametre Ismi</b></td>
            <td><b>Parametre Degeri</b></td>
        </tr>
<?php

	$odemeparametreleri = array("AuthCode","Response","HostRefNum","ProcReturnCode","TransId","ErrMsg"); 
	foreach($request as $key => $value)
	{
		$check=1;
		for($i=0;$i<6;$i++)
		{
			if($key == $odemeparametreleri[$i])
			{
				$check=0;
				break;
			}	
		}
		if($check == 1)
		{
			echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
		}
	}

?>

</table>
<br>
<br>
<?php
	 
	 /* Yollanan hash ve gelen parametrelerle yeni olusturulan hash kontrol ediliyor */	


	 $hashparams = $request["HASHPARAMS"];
    	 $hashparamsval = $request["HASHPARAMSVAL"];
	 $hashparam = $request["HASH"];
         $storekey="DumluPinar@20";
         $paramsval="";
         $index1=0;
	 $index2=0;

	 while($index1 < strlen($hashparams))
	 {
   		$index2 = strpos($hashparams,":",$index1);
		$vl = $request[substr($hashparams,$index1,$index2- $index1)];
		if($vl == null)
		$vl = "";
 		$paramsval = $paramsval . $vl; 
		$index1 = $index2 + 1;
	}
	$storekey = "DumluPinar@20";
	$hashval = $paramsval.$storekey;


	

	$hash = base64_encode(pack('H*',sha1($hashval)));
	
	if($paramsval != $hashparamsval || $hashparam != $hash) 	
		echo "<h4>G�venlik Uyarisi. Sayisal Imza Ge�erli Degil</h4>";

	$mdStatus = $request["mdStatus"];
	$ErrMsg = $request["ErrMsg"];
	if($mdStatus == 1 || $mdStatus == 2 || $mdStatus == 3 || $mdStatus == 4)
	{
		echo "<h5>3D Islemi basarili</h5><br/>";

?>

		<h3> �deme Sonucu</h3>
                <table border="1">
                    <tr>
                        <td><b>Parametre Ismi</b></td>
                        <td><b>Parameter Degeri</b></td>
                    </tr>
<?php
		
		for($i=0;$i<6;$i++)
		{
			$param = $odemeparametreleri[$i];
			echo "<tr><td>".$param."</td><td>".$request[$param]."</td></tr>";

		}
?>
	</table>




<?php
		$response = $request["Response"];
		if($response == "Approved")
		{
			echo "�deme Islemi Basarili";
		}
		else
		{
			echo "�deme Islemi Basarisiz. Hata = ".$ErrMsg;
		}
		
	}
	else
	{
		echo "<h5>3D Islemi basarisiz</h5>";
	}



?>

</body>
</html>