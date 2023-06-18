<?php
    include "db.php";
    $sql="SELECT * FROM `user`";
$result=$con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
</head>
<body>
    <div class="class">
        <h2>Users</h2>
        
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Curren Balance</th>
                <th>Action</th>
            </tr>
</thread>
            <tbody>
                <?php
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){

            
            ?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['current_bal'];?></td>
                    <td> <a  class="btn-btn-info" href="update.php?id=<?php echo $row['id'];?>">Send Amount </a>
                    

                </tr>
<?php
                }
            }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>