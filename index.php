<!DOCTYPE html>
<html>
    <head>
        <title>Worrking with the database</title>
        <link rel="stylesheet"type="text/css"href="style.css">
    </head>
    <body>
        <div id="frm">
            <h1>Registration Form</h1>
            <h3>Saving Data into the database</h3>
            <form action="connect.php" method="POST">
                <label>Firstname</label><br>
                <input type="text" placeholder="Enter firstname" name="firstname" required="true">
                <br>
                <label>Lastname</label><br>
                <input type="text" placeholder="Enter lastname" name="lastname" required="true">
                <br>
                <label>Email</label><br>
                <input type="email" placeholder="Enter email" name="email" required="true">
                <br>
                <label>Phone</label><br>
                <input type="phone" placeholder="Enter phone" name="phone" required="true">
                <br>
                <input type="submit"id="btn"value="login"/>
            </form>
            <br>

            //Creating a table where data from the database will be stored

            <h3>Fetching data fom database</h3>
            <table align="center" style="width:300px;">
            <tr>
                <th>id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>

            <?php
            //database connection
            $conn = new mysqli("localhost","root",'',"school");
            //checking for errors
            if($conn->connect_error) {
                die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);

            }
            $select = "SELECT * FROM `students` ORDER BY id";

            $result = $conn->query($select);

            //displaying data from MariaDB on a browser using while loop

            while($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["firstname"]; ?></td>
                    <td><?php echo $row["lastname"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>

        </div>
    </body>
</html>