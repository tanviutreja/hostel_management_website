<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suggestion display</title>
</head>
<body>
    <h1>Suggestions and Complaints</h1>
<?php
include('connection.php');
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $sql = "UPDATE suggestion SET done = 1 WHERE sid = $id";
    if (mysqli_query($connection, $sql)) {
        echo "<script type='text/javascript'>
        alert('Suggestion marked as done');
        window.location.href='dashboard_admin.php';
        </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error: Failed to update the suggestion status!');
        window.location.href='suggestion_disp.php';
        </script>";
    }
}
$sql="SELECT * FROM suggestion";
$result=mysqli_query($connection,$sql);
if ($result->num_rows > 0){
   
    echo"<table>
        <tr>
            <th>SrNo.</th>
            <th>Topic</th>
            <th>Suggestion and Complaints</th>
            <th>Done</th>
        </tr>";
        while($row = $result->fetch_assoc()) {
            echo"
        <tr>
            <td>{$row["sid"]}</td>
            <td>{$row["topic"]}</td>
            <td>{$row["suggest"]}</td>
            <td>";
            if ($row['done']) {
                echo "&#10004;";
            } else {
                echo "<form method='post' action='suggestion_disp.php'>
                    <input type='hidden' name='id' value='{$row['sid']}'>
                    <button type='submit' name='update'>&#10008;</button>
                </form>";
            }
            echo"</td>
            </tr>";
        
        }
       
  echo"  </table>";
    }
    else {
        echo "No suggestions or complaints found.";
    }
?>
</body>
</html>