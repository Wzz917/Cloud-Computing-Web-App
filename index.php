<?php
    include("includes/init.php");
    // phpinfo();
    // displaying current directory 
    $serverName = "zw573sqlserver.database.windows.net"; // update me
        $connectionOptions = array(
            "Database" => "taylor1", // update me
            "Uid" => "a7149007", // update me
            "PWD" => "Wzz917917" // update me
        );


    $cow_id = $_GET['cow_id'];
    // echo $cow_id;
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    $sql= "SELECT *
         FROM [dbo].[result] ";
    if (!empty($cow_id) && isset($cow_id)) {
        $cow_id = strval($cow_id);
        $sql .= "WHERE [dbo].[result].cow_id = ".$cow_id;
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
function print_record($record) { 
    $res_str = $record['res'];
    // echo $res_str;
    $days = explode(',', $res_str);
    // echo $days[0];
    ?>
  <tr>
    <td class = "table_val2"><?php echo htmlspecialchars($record["cow_id"]); ?></td>
    <td class = "table_val2"><?php echo htmlspecialchars($days[6]); ?></td>
    <td class = "table_val2"><?php echo htmlspecialchars($days[5]); ?></td>
    <td class = "table_val2"><?php echo htmlspecialchars($days[4]); ?></td>
    <td class = "table_val2"><?php echo htmlspecialchars($days[3]); ?></td>
    <td class = "table_val2"><?php echo htmlspecialchars($days[2]); ?></td>
    <td class = "table_val2"><?php echo htmlspecialchars($days[1]); ?></td>
    <td class = "table_val2"><?php echo htmlspecialchars($days[0]); ?></td>
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
        <form action="index.php" method="get">
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
            <!-- <input class = "button" type="submit" value="Search" > -->
            <button type="submit" class = "button" name="search"><img class = "img_setting" src="images/search.png">Search</button>
        </form>
        <a href="index.php" class="button"><img class = "img_setting" src="images/refresh.jpg">Refresh</a>
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
