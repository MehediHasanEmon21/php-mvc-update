<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Welcome <?php echo htmlspecialchars($name) ?></h2>
    <p>Here is index php file</p>

    <ul>
        <?php foreach($colors as $color): ?>
            <li><?php echo $color ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>