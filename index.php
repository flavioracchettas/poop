<html>
    <head>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <p><input name="nome" type="text" value=""><input name="cognome" type="text" value=""></p>
        <p><input type="submit"></p>
        </form>
    </head>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    }
    
    $conn = new mysqli("localhost", "root", "", "test");
    if ($conn->connect_error)
    {
        die("Connection Failed : " . $conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into registration(nome, cognome) values(?, ?)");
        $stmt->bind_param("ss", $nome, $cognome);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
?>
    <body>
    </body>
</html>