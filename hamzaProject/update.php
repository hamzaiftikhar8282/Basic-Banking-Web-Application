<?php
include "db.php";

if (isset($_POST['update'])) {
    $current_bal = $_POST['current_bal'];
    $user_id = $_POST['id'];

    // Retrieve the current balance from the database
    $selectSql = "SELECT current_bal FROM `user` WHERE `id`='$user_id'";
    $result = $con->query($selectSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $database_bal = $row['current_bal'];

        // Subtract the desired value
        $new_bal = $database_bal + $current_bal;

        // Update the database with the new balance
        $updateSql = "UPDATE `user` SET `current_bal`='$new_bal' WHERE `id`='$user_id'";
        $updateResult = $con->query($updateSql);

        if ($updateResult === TRUE) {
            echo 'Balance Sending successfully';
        } else {
            echo 'Error updating balance: ' . $con->error;
        }
    } else {
        echo 'No user found with the provided ID.';
    }
}

// Rest of your code...


if(isset($_GET['id'])){
    $user_id=$_GET['id'];
    $sql="SELECT *FROM `user` where `id`='$user_id'";
    $result=$con->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $name=$row['name'];
            $email=$row['email'];
            $current_bal=$row['current_bal'];
            $id=$row['id'];
        }
        ?>
        <html>
            <body>

   <h1>UPDATE FORM</h1> 
<form action="" method="post">
<fieldset>
    <label for="name">FIRST NAME</label >
    <br>
   <strong> <?php echo $name ?> </strong>
    <input type="hidden" name="id" value="<?php echo $id?>">

    <br>
    
    <label for="email">Email</label>
    <br>
    <strong><?php echo $email ?> </strong>
    <br>
    <label for="current_bal">Amount</label>
    <br>
    <input type="current_bal" name="current_bal" value="<?php echo $current_bal ?>">
    <br>
   
    <input type="submit" value="Send Money" name="update" >
    <button><a href="viewCustomer.php">View Updated Balance of Customer</a></button>
</fieldset>
</form>
</body>
</html>
<?php
    }
    else{
    header('Location:viewCustomer.php');
}
}
?>