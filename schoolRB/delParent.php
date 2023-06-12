<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
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
    <h1 style="text-align: center; color: #323232;">Rishton Primary School</h1>
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
    <h3>Delete a Parent</h3>

<form method="post" action="delParent.php">
    <label for="ParentsID">Select Parent ID:</label>
    <br>
    <select name="ParentsID" id="ParentsID">
        <?php
        $link = mysqli_connect("localhost", "root", "", "test");
        // Check connection
        if ($link === false) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = mysqli_query($link, "SELECT ParentsID, ParentName FROM Parents");
        while ($row = $sql->fetch_assoc()) {
            echo "<option value='{$row['ParentsID']}'>{$row['ParentName']}</option>";
        }
        ?>
    </select>
    <br>
    <br>
    <input type="submit" name="submit" value="Delete">
</form>

<?php
if (isset($_POST['submit'])) {

    $ParentsID = $_POST['ParentsID'];

    $sql = "DELETE FROM Parents WHERE ParentsID = '$ParentsID'";
    if (mysqli_query($link, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>
</body>
</html>