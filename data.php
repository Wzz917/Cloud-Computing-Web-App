<?php
    include("includes/init.php");
    // phpinfo();
    // displaying current directory 
    $serverName = "zw573sqlserver.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "zw573sqldb", // update me
        "Uid" => "a7149007", // update me
        "PWD" => "Wzz917917" // update me
    );
    $connectionOptions2 = array(
        "Database" => "zw573sqldb2", // update me
        "Uid" => "a7149007", // update me
        "PWD" => "Wzz917917" // update me
    );
    $connectionOptions3 = array(
        "Database" => "zw573sqldb3", // update me
        "Uid" => "a7149007", // update me
        "PWD" => "Wzz917917" // update me
    );


    $cow_id = $_GET['cow_id'];
    // echo $cow_id;
    //Establishes the connection
    
    if (!empty($cow_id) && isset($cow_id)) {
        if ($cow_id == 26) {
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            $sql= "SELECT * FROM [dbo].[Cows] ";
        }
        else if ($cow_id == 2714) {
            $conn = sqlsrv_connect($serverName, $connectionOptions2);
            $sql= "SELECT * FROM [dbo].[Cows] ";
        }
        else if ($cow_id == 86) {
            $conn = sqlsrv_connect($serverName, $connectionOptions3);
            $sql= "SELECT * FROM [dbo].[Cows] ";
        }
    }
    if($conn) { 
        // echo $sql;  
        $getResults= sqlsrv_query($conn, $sql);
        // echo ("Reading data from table" . PHP_EOL);
        if ($getResults == FALSE)
            echo (sqlsrv_errors());
    }     
?>


<?php
function print_record($record) { ?>
  <tr>
    <td class = "table_val2"><?php echo htmlspecialchars($record["device_id"]); ?></td>
  </tr>
<?php
}
?>



<!DOCTYPE html>
<html>
<head>
    <link href="css/site.css" rel='stylesheet' type='text/css' />
    <meta cahrset="utf-8">
    <title>Cow pregnancy prediction</title>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <div class="container">
        <!-- <div class="row">
            <h1>Select Cow</h1>
        </div> -->
        <div class="row">
        <form action="data.php" method="get">
            <select name="cow_id">
                <!-- <option value = "">Select Cow ID</option> -->
                    <?php
                        $arr = array('26','86','2714');
                        foreach ($arr as $v){
                            echo "<option value = '".$v."'>".$v."</option>";
                        }
                    ?>
            </select>
            <!-- <input name="cow_temp" type="text" placeholder='cow_temp'/>
            <input name="animal_activity" type="text" placeholder='animal_activity'/> -->
            <!-- <input class = "button" type="submit" value="Search" > -->
            <button type="submit" class = "button" name="search"><img class = "img_setting" src="images/search.png">Search</button>
        </form>
        <a href="data.php" class="button"><img class = "img_setting" src="images/refresh.png">Refresh</a>
        </div>
    </div>
    <div class ="container">
        <div class = "table_format">
            <table>
                <tr>
                <th class = "table_val">CowID</th>
                <th class = "table_val">Day 1 %</th>
                <th class = "table_val">Day 2 %</th>
                <th class = "table_val">Day 3 %</th>
                <th class = "table_val">Day 4 %</th>
                <th class = "table_val">Day 5 %</th>
                <th class = "table_val">Day 6 %</th>
                <th class = "table_val">Day 7 %</th>
                </tr>
            <!-- </div> -->
            <?php 
                while ($record = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
                    print_record($record);
                }
            ?>

            </table>
        </div>
    </div>

</body>
</html>
