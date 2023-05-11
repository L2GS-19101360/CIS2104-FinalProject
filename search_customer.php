<?php

session_start();
$serverName = "localhost:3307";
$username = "root";
$password = "";
$dbName = "cis2104_finalproject_db";

$est_conn = mysqli_connect($serverName, $username, $password, $dbName);

// if (!$est_conn){
//     echo "No";
// }
// echo "Yes";

if (isset($_POST['input'])){
    $input = $_POST['input'];

    $query = "SELECT * FROM customers WHERE 
                                            ID LIKE '{$input}%' OR 
                                            USER_FIRST_NAME LIKE '{$input}%' OR 
                                            USER_LAST_NAME LIKE '{$input}%' OR 
                                            USER_CONTACT_NUMBER LIKE '{$input}%' OR 
                                            USER_EMAIL LIKE '{$input}%' OR 
                                            USER_ADDRESS LIKE '{$input}%' OR 
                                            USER_STATUS LIKE '{$input}%'";

    $result = mysqli_query($est_conn, $query);

    if (mysqli_num_rows($result) > 0){?>
        
        <table style="margin-left: 30px;">
            <thead>
                <tr>
                    <th class="table_rows">ID</th>
                    <th class="table_rows">First Name</th>
                    <th class="table_rows">Last Name</th>
                    <th class="table_rows">Contact Number</th>
                    <th class="table_rows">Email</th>
                    <th class="table_rows">Address</th>
                    <th class="table_rows">Status</th>
                    <th class="table_rows"></th>
                    <th class="table_rows"></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td class="table_data"> <?php echo $row['ID'] ?> </td>
                        <td class="table_data"> <?php echo $row['USER_FIRST_NAME'] ?> </td>
                        <td class="table_data"> <?php echo $row['USER_LAST_NAME'] ?> </td>
                        <td class="table_data"> <?php echo $row['USER_CONTACT_NUMBER'] ?> </td>
                        <td class="table_data"> <?php echo $row['USER_EMAIL'] ?> </td>
                        <td class="table_data"> <?php echo $row['USER_ADDRESS'] ?> </td>
                        <td class="table_data"> <?php echo $row['USER_STATUS'] ?> </td>
                        <td class="table_data"><button class="statBtn" onclick="statChange(<?php echo $row['ID'] ?>)">CHANGE STATUS</button></td>
                        <td class="table_data"><button class="deleteBtn" onclick="deleteAcct(<?php echo $row['ID'] ?>)">DELETE ACCOUNT</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php
    }
    else{

        echo '<h3 style="background-color: red; padding: 10px;">No Search Result Found</h3>';

    }
}

?>