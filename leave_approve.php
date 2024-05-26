<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Approval</title>
</head>
<body>
    <h1>Attend to Outpass Request</h1>
<?php
include('connection.php');
if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    $sql = "UPDATE `leave` SET approve = 1 WHERE lid = $id";
    if (mysqli_query($connection, $sql)) {
        echo "<script type='text/javascript'>
        alert('Outpass approved');
        window.location.href='dashboard_admin.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error: Failed to approve the outpass status!');
        window.location.href='leave_approve.php';
        </script>";
    }
}
$sql="SELECT `leave`.lid,user.sname,user.enrollment,user.branch,user.year,`leave`.permission,`leave`.pcontact,`leave`.reason,`leave`.depart,`leave`.arrive,`leave`.address_to,`leave`.approve From user inner join `leave` on user.enrollment=`leave`.enrollment_id ";
$result=mysqli_query($connection,$sql);
if ($result->num_rows > 0){
   
    echo"<table>
        <tr>
        <th>Leave ID</th>
        <th>Name</th>
        <th>Enrollment</th>
        <th>Branch</th>
        <th>Year</th>
        <th>Permission</th>
        <th>Parent Contact</th>
        <th>Reason</th>
        <th>Departure</th>
        <th>Arrival</th>
        <th>Address To</th>
        <th>Approval Status</th>
        </tr>";
        while($row = $result->fetch_assoc()) {
            echo"
        <tr>
        <td>{$row['lid']}</td>
        <td>{$row['sname']}</td>
        <td>{$row['enrollment']}</td>
        <td>{$row['branch']}</td>
        <td>{$row['year']}</td>
        <td>{$row['permission']}</td>
        <td>{$row['pcontact']}</td>
        <td>{$row['reason']}</td>
        <td>{$row['depart']}</td>
        <td>{$row['arrive']}</td>
        <td>{$row['address_to']}</td>
        <td>";
            if ($row['approve']) {
                echo "&#10004;";
            } else {
                echo "<form method='post' action='leave_approve.php'>
                    <input type='hidden' name='id' value='{$row['lid']}'>
                    <button type='submit' name='approve'>&#10008;</button>
                </form>";
            }
            echo"</td>
            </tr>";
        
        }
       
  echo"  </table>";
    }
    else {
        echo "No Outpass Request Found.";
    }
?>
</body>
</html>