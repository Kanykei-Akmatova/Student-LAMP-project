<!DOCTYPE html>
<html lang="en">

<body>

    <?php
    $servername = "localhost";
    $username = "myuser";
    $password = "mypass";
    $dbname = "assignment8";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
        echo "<br />";
    } else {

        echo "Connected to : " . $servername;
        echo "<br />";
    }

    // Create database
    $dropDBSql = "DROP DATABASE IF EXISTS " . $dbname;

    if ($conn->query($dropDBSql) === TRUE) {
        echo "Database drop successfully";
        echo "<br />";
    } else {

        echo "Error droping database: " . $conn->error;
        echo "<br />";
    }

    // Create database
    $createDBSql = "CREATE DATABASE " . $dbname;

    if ($conn->query($createDBSql) === TRUE) {
        echo "Database created successfully";
        echo "<br />";
    } else {

        echo "Error creating database: " . $conn->error;
        echo "<br />";
    }

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
        echo "<br />";
    } else {

        echo "Connected to : " . $servername . "@" . $dbname;
        echo "<br />";
    }

    // sql to create table called “Items” in the “assignment8” database
    $createTableSql = "CREATE TABLE Items (
        ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(40) NOT NULL,
        Type VARCHAR(40) NOT NULL,
        Make VARCHAR(40) NOT NULL,
        Model VARCHAR(40) NOT NULL,
        Brand VARCHAR(40) NOT NULL   
    )";

    // Create table
    if ($conn->query($createTableSql) === TRUE) {
        echo "Table created successfully";
        echo "<br />";
    } else {
        echo "Error creating table: " . $conn->error;
        echo "<br />";
    }

    $insertDataSql = "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('Service One', 'Service', '', '', 'Programming Consultation');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('Service Two', 'Service', '', '', 'Programming Consultation');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('ProgCalc', 'Product', 'Casio', '2020', '');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('ProgBook', 'Book', '', '', 'O''Reilly');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('Service Three', 'Service', '', '', 'Programming Consultation');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand)
    VALUES ('MacBook', 'Product', 'Apple', '2019', '');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('Iphone11Pro', 'Product', 'Apple', '2020', '');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('Service Four', 'Service', '', '', 'Programming Consultation');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('Service Five', 'Service', '', '', 'Programming Consultation');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('ThinkBook', 'Product', 'Lenovo', '2021', '');";
    $insertDataSql .= "INSERT INTO Items (Name, Type, Make, Model, Brand) 
    VALUES ('Learn Programming', 'Book', '', '2018', 'CreateSpace Independent')";

    // Insert data into table
    if ($conn->multi_query($insertDataSql) === TRUE) {
        echo "Data inserted successfully";
        echo "<br />";
    } else {
        echo "Error inserting data: " . $conn->error;
        echo "<br />";
    }

    $conn->close();

    ?>
</body>

</html>