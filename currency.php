<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Welcome to currency converter</title>
    <link rel="stylesheet" type="text/css" href="./flag-icons/flag-icons.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="currency.css" />
</head>

<body>
    <div class="navbar">
      <a href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
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
      <a class="active" href="aboutme.html"><i class="fa fa-fw fa-user"></i> About</a>
    </div>
    <h1>Welcome to currency converter</h1>
    <form method="GET" action="currency.php">
        <fieldset>
            <table>
                <tr class="spaceUnder">
                    <td><label>Amount:</label></td>
                    <td><input type="text" id="amount" name="amount" value="" /></td>
                </tr>
                <tr class="spaceUnder">
                    <td class='alnright'><label>Convert From:</label></td>
                    <td>
                        <input type="radio" id="CAD" name="convert_from" value="CAD"><i class="fi fi-ca"></i><label> CAD</label>
                        <input type="radio" id="USD" name="convert_from" value="USD"><i class="fi fi-us"></i><label> USD</label>
                        <input type="radio" id="EUR" name="convert_from" value="EUR"><i class="fi fi-eu"></i><label> EUR</label>
                        <input type="radio" id="GBP" name="convert_from" value="GBP"><i class="fi fi-gb"></i><label> GBP</label>
                        <input type="radio" id="CNY" name="convert_from" value="CNY"><i class="fi fi-cn"></i><label> CNY</label>
                    </td>
                </tr>
                <tr class="spaceUnder">
                    </label></th>
                    <td class='alnright'><label>Convert To:</label></td>
                    <td>
                        <input type="radio" id="CAD" name="convert_to" value="CAD"><i class="fi fi-ca"></i><label> CAD</label>
                        <input type="radio" id="USD" name="convert_to" value="USD"><i class="fi fi-us"></i><label> USD</label>
                        <input type="radio" id="EUR" name="convert_to" value="EUR"><i class="fi fi-eu"></i><label> EUR</label>
                        <input type="radio" id="GBP" name="convert_to" value="GBP"><i class="fi fi-gb"></i><label> GBP</label>
                        <input type="radio" id="CNY" name="convert_to" value="CNY"><i class="fi fi-cn"></i><label> CNY</label>
                    </td>
                </tr>
                <tr>
                    <td class='alnright'><input type="submit" id="submit" value="Convert" /></td>
                    <td></td>
                </tr>
            </table>
        </fieldset>
    </form>
    <h3>
        <?php
        $rateTable = array("CAD" => 1, "USD" => 1.2720, "EUR" => 1.3920, "GBP" => 1.6616, "CNY" => 0.2007);

        $amount = $_GET['amount'];
        $convert_from = $_GET['convert_from'];
        $convert_to = $_GET['convert_to'];

        if (!empty($amount) && !empty($convert_from) && !empty($convert_to)) {
            $from_code = substr(strtolower($convert_from), 0, 2);
            $to_code = substr(strtolower($convert_to), 0, 2);

            if (is_numeric($amount)) {
                $converted_amount = round($rateTable[$convert_from] / $rateTable[$convert_to] * $amount, 2);
                $left = "<i class=\"fi fi-" . $from_code . "\"></i><label> " . $convert_from . "</label> " . $amount;
                $right = "<i class=\"fi fi-" . $to_code . "\"></i><label> " . $convert_to . "</label> " . $converted_amount;
                echo  $left . " = " . $right;
            } else {
                echo "Currency conversion error! Try again please.";
            }
        }
        ?>
    </h3>
</body>

</html>