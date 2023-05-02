<?php

$serverName = "localhost";
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
                                            FIRST_NAME LIKE '{$input}%' OR 
                                            LAST_NAME LIKE '{$input}%' OR 
                                            CONTACT_NUMBER LIKE '{$input}%' OR 
                                            EMAIL LIKE '{$input}%' OR 
                                            ADDRESS LIKE '{$input}%' OR 
                                            STATUS LIKE '{$input}%'";

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
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td class="table_data"> <?php echo $row['ID'] ?> </td>
                        <td class="table_data"> <?php echo $row['FIRST_NAME'] ?> </td>
                        <td class="table_data"> <?php echo $row['LAST_NAME'] ?> </td>
                        <td class="table_data"> <?php echo $row['CONTACT_NUMBER'] ?> </td>
                        <td class="table_data"> <?php echo $row['EMAIL'] ?> </td>
                        <td class="table_data"> <?php echo $row['ADDRESS'] ?> </td>
                        <td class="table_data"> <?php echo $row['STATUS'] ?> </td>
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