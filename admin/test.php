<?php

if(isset($_POST['submit'])) {
    echo "name: ",$_FILES['uploads']['name'], "<br>";
    echo "type: ",$_FILES['uploads']['type'], "<br>";
    echo "size: ",$_FILES['uploads']['size'], "<br>";
    echo "tmp_name: ",$_FILES['uploads']['tmp_name'], "<br>";
    echo "error: ",$_FILES['uploads']['error'], "<br>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>

    <form action="test.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploads">
        <input type="submit" value="submit" name="submit">
    </form>
    
</body>
</html>