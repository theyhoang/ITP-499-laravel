<!doctype html>
<html>
<head>
    <title>DVD Search</title>
</head>
<body>

<form method="get" action="/dvds">
    <h1>DVD Search</h1>
    <div>
        DVD Title:
        <input type="text" name="title" />
    </div>
    <div>
        Genre:
        <select name="genre_id">
            <option value='0'>All</option>
            <?php foreach ($genres as $genre) :
                echo "<option value='$genre->id'>$genre->genre_name</option>";
            endforeach
            ?>

        </select>
    </div>
    <div>
        Rating:
        <select name="rating_id">
            <option value='0'>All</option>
            <?php foreach ($ratings as $rating) :
                echo "<option value='$rating->id'>$rating->rating_name</option>";
            endforeach
            ?>

        </select>
    </div>
    <div>
        <input type="submit" value="Search" />
    </div>
</form>
</body>
</html>