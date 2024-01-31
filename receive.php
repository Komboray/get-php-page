<?php
//here we receive the data from the index.php as shown below ready to be sent to the next page for use that is the base.php
$id = $_GET["id"];
$email = $_GET["email"];

echo $email;
echo $id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receive the contents</title>
</head>
<body>
    <?php       
    include("connect.php");
    $sql = "SELECT *
            FROM `try`";

    $resp = mysqli_query($conn, $sql);
    if($resp){
        $num = mysqli_num_rows($resp);

        if($num >0){
            while($row = mysqli_fetch_assoc($resp)){
                echo "
                <table>
                <thead>
                   <tr>
                   <td>id</td>
                   <td>name</td>
                   <td>date</td>
                   </tr>
                </thead>
                <tbody>
                <tr>
                <td>{$row["id"]}</td>
                <td>{$row["name"]}</td>
                <td>{$row["date"]}</td>
                <a href='base.php?id={$row['id']}&email={$email}&idPat={$id}'><td></td>Send data</a>
                    
                </tr>
                </tbody>
               </table>
                ";
            }
        }
    }
    ?>
</body>
</html>