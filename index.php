<?php
    session_start();

    $conn = mysqli_connect("localhost","root","","scrp");

    $username = $_SESSION['User'];
    $result = mysqli_query($conn, "SELECT * FROM accounts WHERE Username = '$username'");
?>
<html>
<head>
    <title>Fransisco Life:UCP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="atas">
    <h3> Welcome to Fransisco Life Role Play</h3>
    <div class="akun">
        <p><?php echo '' . $_SESSION['User']; ?></p><img src="images/okee.png" alt="profile">
    </div>
</div>
    <div class="keluar">
        <a href="login.php">Keluar<img src="images/logout.png" alt="logout"></a>
    </div>
<div class="konten">
    <h4>Informasi Karakter : </h4>
    <table>
    <tbody>
    <tr>
    <td> Anda belum membuat karakter, silahkan login kedalam game.!</td>
    </tr>
    </tbody>
    </table>

    <table>
    <tbody>
    <tr>
    <td> Character :</td>
    </tr>
    <tr>
    <td> Gender <p>TES</p></td>
    </tr>
    <tr>
    <td> Origin <p>TES</p></td>
    </tr>
    <tr>
    <td> Money <p>$TES</p></td>
    </tr>
    <tr>
    <td> Bank <p>$TES</p></td>
    </tr>
    <tr>
    <td> Play Time <p>(Playing Hours (h) , Minutes (m))</p></td>
    </tr>
    <tr>
    <td> Warnings <p>TES</p></td>
    </tr>
    </tbody>
    </table>
</div>
</body>
</html>