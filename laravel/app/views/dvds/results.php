<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>DVD Results</title>
</head>
<body>

    <table class='table table-bordered table-condensed'><th>Title</th><th>Rating</th><th>Genre</th><th>Label</th><th>Sound</th><th>Format</th><th>
            Release Date
    </th>
    <?php
        foreach ($dvds as $dvd) :
        echo "<tr><td>$dvd->title</td><td>$dvd->rating</td><td>$dvd->genre</td><td>$dvd->label</td><td>$dvd->sound</td>
        <td>$dvd->format</td><td>$dvd->release_date</td></tr>";
        endforeach;
    ?>
    </table>

</body>
</html>