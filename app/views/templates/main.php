<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>

    <div class="container">

        <div class="nav">
            <ul class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/contacts">Contacts</a></li>
            </ul>
        </div>
        <div class="content">
            <?= $content; ?>
        </div>
    </div>

</body>
</html>