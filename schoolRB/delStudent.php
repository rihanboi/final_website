<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primary School Database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #45ff54;
            margin: 0;
            padding: 0;
        }

        .navbar {
            overflow: hidden;
            background-color: #323232;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: #323232;
            font-family: inherit;
            margin: 0;
        }

        .navbar a:hover,
        .dropdown:hover .dropbtn {
            background-color: lightslategray;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #323232;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        h1, h3 {
            text-align: center;
            color: #323232;
        }

        form {
            margin: auto;
            max-width: 300px;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 6px 0;
            border: none;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #323232;
        }

        select {
            width: 100%;
            padding: 12px;
            margin: 6px 0;
            border: none;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Rishton Primary School</h1>
    <hr>
    <div class="navbar">
        <a href="index.html">Home</a>
        <div class="dropdown">
            <button class="dropbtn">View
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="ViewStudent.php">Pupils</a>
                <a href="ViewParent.php">Parent</a>
                <a href="ViewTeacher.php">Teacher</a>
                <a href="ViewClass.php">Class</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Add
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="AddStudent.php">Pupils</a>
                <a href="AddParent.php">Parent</a>
                <a href="AddTeacher.php">Teacher</a>
                <a href="AddClass.php">Class</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Delete
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="delStudent.php">Pupils</a>
                <a href="delParent.php">Parent</a>
                <a href="delTeacher.php">Teacher</a>
                <a href="delClass.php">Class</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Update
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="Updatestudent.php">Pupils</a>
                <a href="UpdateParent.php">Parent</a>
                <a href="UpdateTeacher.php">Teacher</a>
                <a href="UpdateClass.php">Class</a>
            </div>
        </div>
    </div>
    <hr>

    <h3>Delete a Student</h3>

    <form method="post" action="delStudent.php">
        <label for="PupilsID">Select Student:</label>
        <br>
        <select name="PupilsID" id="PupilsID">
            <?php
            $link = mysqli_connect("localhost", "root", "", "test");
            // Check connection
            if ($link === false) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT PupilsID, StudentName FROM Pupils";
            $result = mysqli_query($link, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['PupilsID'] . "'>" . $row['StudentName'] . "</option>";
                }
            } else {
                echo "<option value=''>No students found</option>";
            }
            mysqli_close($link);
            ?>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Delete">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $link = mysqli_connect("localhost", "root", "", "test");
        // Check connection
        if ($link === false) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $PupilsID = $_POST['PupilsID'];

        $sql = "DELETE FROM Pupils WHERE PupilsID = '$PupilsID'";
        if (mysqli_query($link, $sql)) {
            echo "<p style='text-align: center;'>Record deleted successfully</p>";
        } else {
            echo "<p style='text-align: center;'>Error deleting record: " . mysqli_error($link) . "</p>";
        }

        mysqli_close($link);
    }
    ?>

    <hr>
</body>
</html>
