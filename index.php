<?php
//here we start the presentation of the first data that will be sent to the receive.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Style for the popup div */
        #popupDiv {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }
    </style>
    <title>Popup Example</title>
    
</head>
<body>

        <div class="details">

            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Administer Medicine</h2>
                    
                </div>
                <?php
                include("connect.php");
                $sql =  "SELECT * 
                        FROM `users`";
                $response = mysqli_query($conn, $sql);
                    if($response){
                        $num = mysqli_num_rows($response);
                        if($num>0){
                            while($row = mysqli_fetch_assoc($response)){
                                echo"
                                <table>
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>email</td>
                                        
                                       
                                    </tr>
                                </thead>
                    
                                <tbody>
                                    <tr>
                                        <td>{$row["id"]}</td>
                                        <td>{$row["email"]}</td>
                                        <a href='receive.php?id={$row['id']}&email={$row['email']}'><td></td>Send data</a>
                                        
                                    </tr>
                    
                                    
                                </tbody>
                            </table>
                            

                            
                                ";


                            }
                            
                        }else{
                            echo "<h1 style = 'color:red;'>There is no medicine to be administered!</h1>";
                    }
                    }
                ?>

<!-- Button to trigger the popup -->
<button onclick="togglePopup()">Show Popup</button>

<!-- Hidden popup div -->
<div id="popupDiv">
    <p>This is a popup content.</p>
    <!-- Input field to display the email -->
    <label for="emailInput">Email:</label>
    <input type="text" id="emailInput" readonly>
    <button onclick="closePopup()">Close</button>
</div>

<script>
    
    // Function to show/hide the popup
    // Function to show/hide the popup and populate the input field
    function togglePopup() {
        var popupDiv = document.getElementById('popupDiv');
        var emailInput = document.getElementById('emailInput');

        // Get the email from the PHP variable (replace this with actual PHP value)
        var emailFromPHP = "<?=$row['email']?>";

        // Set the value of the input field
        emailInput.value = emailFromPHP;

        // Display the popup
        popupDiv.style.display = 'block';
    }

    // Function to close the popup
    function closePopup() {
        var popupDiv = document.getElementById('popupDiv');
        popupDiv.style.display = 'none';
    }
</script>

</body>
</html>
