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
        <form action="b.php" method="post">
        <select name="cow_id">
            <option value = "26">Cow ID</option>
                <?php
                    $arr = array('26','86','2714');
                    foreach ($arr as $v){
                        echo "<option value = '".$v."'>".$v."</option>";
                    }
                ?>
        </select>
            <input name="cow_temp" type="text" placeholder='cow_temp'/>
            <input name="animal_activity" type="text" placeholder='animal_activity'/>
            <input type="submit" value="Predict" >
    </form>
	  </div>
   </div>
 
</body>
</html>
