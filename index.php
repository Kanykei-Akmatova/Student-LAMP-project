<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale =1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="./flag-icons/flag-icons.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="index.css" />
    <script>
        function dataSearch() {
            var input, filter, tbl, trs, tds, i, txtValue, dataFound;

            input = document.getElementById("myInput");
            tbl = document.getElementById("myTable");
            trs = tbl.getElementsByTagName("tr");
            tds = null;
            dataFound = false;
            filter = input.value.toUpperCase();

            for (var i = 0; i < trs.length; i++) {
                tds = trs[i].getElementsByTagName("td");
                for (var n = 0; n < tds.length; n++) {
                    txtValue = tds[n].textContent || tds[n].innerText;

                    if (
                        filter.length > 0 &&
                        txtValue.toUpperCase().indexOf(filter) > -1
                    ) {
                        trs[i].style.display = "";
                        dataFound = true;
                        break;
                    } else {
                        trs[i].style.display = "none";
                    }
                }
            }

            if (dataFound) {
                tbl.style.display = "";
            } else {
                tbl.style.display = "none";
            }

            getGreetingMessage();
        }

        function getGreetingMessage() {
            const h = new Date().getHours();

            if (h >= 24 && h < 6) {
                document.getElementById("greetingText").innerHTML =
                    "Good morning, you must be an early bird!";
            }

            if (h >= 6 && h < 12) {
                document.getElementById("greetingText").innerHTML = "Good morning!";
            }

            if (h >= 12 && h < 18) {
                document.getElementById("greetingText").innerHTML =
                    " Good afternoon!";
            }

            if (h >= 18 && h < 24) {
                document.getElementById("greetingText").innerHTML = "Good evening!";
            }
        }
    </script>
</head>

<body>
    <div class="navbar">
        <a class="active" href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
        <div class="dropdown">
            <button class="dropbtn">
                Products
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="currency.php">Currency exchange</a>
                <a href="">Service 2</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn" onclick="location.href='contact.html';">
                Contact Us
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href=""><i class="fi fi-fr"></i>Contactez-nous</a>
                <a href=""><i class="fi fi-gb"></i>Contact us</a>
                <a href=""><i class="fi fi-kg"></i>Байланыштар</a>
            </div>
        </div>
        <a href="aboutme.html"><i class="fa fa-fw fa-user"></i> About</a>
    </div>
    <div id="myTime">
        <p id="greetingText">Good evening</p>
    </div>
    <h2>My Phonebook</h2>

    <input type="text" id="myInput" onkeyup="dataSearch()" placeholder="Search for names.." title="Type in a name" />

    <?php

    class Item
    {
        public $id = 0;
        public $name = "name";
        public $type = "type";
        public $make = "Make";
        public $model = "model";
        public $brand = "brand";

        public function __construct($id = 0, $name = "", string $type = "", string $make = "",string $model = "", string $brand = "")
        {
            $this->id = $id;
            $this->name = $name;
            $this->type = $type;
            $this->make = $make;
            $this->model = $model;
            $this->brand = $brand;
        }
    }

    echo "\n<table id=\"myTable\" style=\"display: none;\">\n";
    echo "<tr><th>ID</th><th>Name</th><th>Type</th><th>Make</th><th>Model</th><th>Brand</th></tr>\n";

    $servername = "localhost";
    $username = "myuser";
    $password = "mypass";
    $dbname = "assignment8";

    /// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT ID, Name, Type, Make, Model, Brand FROM Items";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
            $item = new Item($row["ID"], $row["Name"], $row["Type"], $row["Make"], $row["Model"], $row["Brand"]);
            // Use echo to print to the screen the appropriate <tr> and <td> elements
            echo "<tr><td>" . $item->id . "</td><td>" . $item->name . "</td><td>" . $item->type . "</td><td>" . $item->make . "</td><td>" . $item->model . "</td><td>" . $item->brand . "</td></tr>\n";            
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    
    // Use echo to print to the screen the html and table end tags
    echo "\n</table>";

    ?>
</body>

</html>