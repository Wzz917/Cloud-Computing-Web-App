<?php

$serverName = "zw573sqldb.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "zw573sqldb", // update me
        "Uid" => "a7149007", // update me
        "PWD" => "Wzz917917" // update me
    );
?>


<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta cahrset="utf-8">

<title>Cow pregnancy prediction</title>
</head>
<body>
<div class="header wow fadeInUpBig" data-wow-delay="0.4s">
   <div class="container">
	  <div class="header_top">
		<h1>Cow pregnancy</h1>
        <h2>prediction</h2>
        <form action="index.php" method="post">
            <select name="cow_id">
                <option value = "">Select Cow ID</option>
                    <?php
                        $arr = array('26','86','2714');
                        foreach ($arr as $v){
                            echo "<option value = '".$v."'>".$v."</option>";
                        }
                    ?>
            </select>
            <!-- <input name="cow_temp" type="text" placeholder='cow_temp'/>
            <input name="animal_activity" type="text" placeholder='animal_activity'/> -->
            <input type="submit" value="Predict" >
        </form>
	  </div>
   </div>
 
</body>
</html>
