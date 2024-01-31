<?php
//here we receive the data from the index.php & the receive.php and show it here on the 3rd page
$idPat = $_GET["idPat"];
$email = $_GET["email"];
$id = $_GET["id"];

echo $email;
echo $id;
echo $idPat;

//this is the json encoded data sent from the javascript
$phpVariable = "Hello from PHP!";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP to JavaScript</title>
</head>
<body>

<script>
    // Convert PHP variable to JavaScript
    var jsVariable = <?php echo json_encode($phpVariable); ?>;
    
    // Now you can use jsVariable in your JavaScript code
    console.log(jsVariable);
</script>

</body>
</html>