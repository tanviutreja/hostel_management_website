<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>room_allotment</title>
</head>
<body>
    <h1>Allotment of rooms</h1>
    <h3>For Female students</h3>
    <?php
    include('connection.php');

    if (isset($_POST['allot'])) {
        $id = $_POST['id'];
        $roomno = $_POST['roomno']; 
        $sql = "UPDATE room SET roomno = '$roomno' WHERE rid = $id";
        if (mysqli_query($connection, $sql)) {
            echo "<script type='text/javascript'>
            alert('Assigned room ');
            window.location.href='dashboard_admin.php';
            </script>";
        } else {
            echo "<script type='text/javascript'>
            alert('Error: Failed to assign the room!');
            window.location.href='room_allot.php';
            </script>";
        }
    }

    function fetchRoomOptions($connection) {
        $sql = "SELECT hostelno, `block`, floor, room_number FROM room_detail where rid is null";
        $result = mysqli_query($connection, $sql);
        $options = "";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $value = "{$row['block']}-{$row['room_number']}";
                $options .= "<option value='$value'>Hostel {$row['hostelno']}, Block {$row['block']}, Floor {$row['floor']}, Room {$row['room_number']}</option>";
            }
        } else {
            $options = "<option value=''>No rooms available</option>";
        }
        return $options;
    }

    $roomOptions = fetchRoomOptions($connection);

    $sql = "SELECT room.rid, user.sname, user.enrollment, user.branch, user.year, room.cgpa, room.accomodation, room.disability, room.requirement, room.roomno 
            FROM user 
            INNER JOIN room ON user.enrollment = room.enrollment_id 
            WHERE user.gender = 'female'";
    $result = mysqli_query($connection, $sql);

    if ($result->num_rows > 0) {
        echo "<table>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Enrollment</th>
        <th>Branch</th>
        <th>Year</th>
        <th>CGPA</th>
        <th>Accommodation</th>
        <th>Disability</th>
        <th>Requirements</th>
        <th>Allotted Room</th>
        <th>Select Room</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['rid']}</td>
            <td>{$row['sname']}</td>
            <td>{$row['enrollment']}</td>
            <td>{$row['branch']}</td>
            <td>{$row['year']}</td>
            <td>{$row['cgpa']}</td>
            <td>{$row['accomodation']}</td>
            <td>{$row['disability']}</td>
            <td>{$row['requirement']}</td>
            <td>{$row['roomno']}</td>
            <td>
            <form method='post' action='room_allot.php'>
            <input type='hidden' name='id' value='{$row['rid']}'>
            <label for='roomno'>Select:</label>
            <select name='roomno' id='roomno' required>
                $roomOptions
            </select>
            <input type='submit' name='allot' value='Allot'>
            </form>
            </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No female students found.";
    }
    ?>

    <h3>For Male students</h3>
    <?php
    $sql = "SELECT room.rid, user.sname, user.enrollment, user.branch, user.year, room.cgpa, room.accomodation, room.disability, room.requirement, room.roomno 
            FROM user 
            INNER JOIN room ON user.enrollment = room.enrollment_id 
            WHERE user.gender = 'male'";
    $result = mysqli_query($connection, $sql);

    if ($result->num_rows > 0) {
        echo "<table>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Enrollment</th>
        <th>Branch</th>
        <th>Year</th>
        <th>CGPA</th>
        <th>Accommodation</th>
        <th>Disability</th>
        <th>Requirements</th>
        <th>Allotted Room</th>
        <th>Select Room</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['rid']}</td>
            <td>{$row['sname']}</td>
            <td>{$row['enrollment']}</td>
            <td>{$row['branch']}</td>
            <td>{$row['year']}</td>
            <td>{$row['cgpa']}</td>
            <td>{$row['accomodation']}</td>
            <td>{$row['disability']}</td>
            <td>{$row['requirement']}</td>
            <td>{$row['roomno']}</td>
            <td>
            <form method='post' action='room_allot.php'>
            <input type='hidden' name='id' value='{$row['rid']}'>
            <label for='roomno'>Select:</label>
            <select name='roomno' id='roomno' required>
                $roomOptions
            </select>
            <input type='submit' name='allot' value='Allot'>
            </form>
            </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No male students found.";
    }
    ?>
</body>
</html>


