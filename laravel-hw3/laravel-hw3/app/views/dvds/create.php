<?php if(Session::has('success')){ ?>
<div class="alert-box success" style="background-color:green;color:red">
    <h2><?php echo Session::get('success'); ?></h2>
</div>
<?php } ?>

<?php var_dump($errors->all()) ?>

<?php if ($errors->has('title')) : ?>
    <p>
        <?php echo $errors->first('title') ?>
    </p>
<?php endif ?>

<?php if ($errors->has('label')) : ?>
    <p>
        <?php echo $errors->first('label') ?>
    </p>
<?php endif ?>

<?php if ($errors->has('genre')) : ?>
    <p>
        <?php echo $errors->first('genre') ?>
    </p>
<?php endif ?>

<?php if ($errors->has('format')) : ?>
    <p>
        <?php echo $errors->first('format') ?>
    </p>
<?php endif ?>

<?php if ($errors->has('rating')) : ?>
    <p>
        <?php echo $errors->first('rating') ?>
    </p>
<?php endif ?>

<?php if ($errors->has('sound')) : ?>
    <p>
        <?php echo $errors->first('sound') ?>
    </p>
<?php endif ?>

<form action="<?php echo url('dvds') ?>" method="post">

    Title: <input type="text" name="title" value="<?php echo Input::old('title') ?>">

<br />

Label:
<select name="label" value="<?php echo Input::old('label') ?>">
	<?php foreach ($labels as $label) : ?>
    <option value="<?php echo $label->id ?>">
        <?php echo $label->label_name ?>
    </option>
<?php endforeach; ?>
</select>

<br />

Genre:
<select name="genre" value="<?php echo Input::old('genre') ?>">
    <?php foreach ($genres as $genre) : ?>
        <option value="<?php echo $genre->id ?>">
            <?php echo $genre->genre_name ?>
        </option>
    <?php endforeach ?>
</select>

<br>

Format:
<select name="format" value="<?php echo Input::old('format') ?>">
    <?php foreach ($formats as $format) : ?>
        <option value="<?php echo $format->id ?>">
            <?php echo $format->format_name ?>
        </option>
    <?php endforeach ?>
</select>

<br>

Rating:
<select name="rating" value="<?php echo Input::old('rating') ?>">
    <?php foreach ($ratings as $rating) : ?>
    <option value="<?php echo $rating->id ?>">
        <?php echo $rating->rating_name ?>
    </option>
    <?php endforeach ?>
</select>

    <br>

    Sound:
    <select name="sound" value="<?php echo Input::old('sound') ?>">
        <?php foreach ($sounds as $sound) : ?>
            <option value="<?php echo $sound->id ?>">
                <?php echo $sound->sound_name ?>
            </option>
        <?php endforeach ?>
    </select>

<input type="submit" value="Create DVD">
</form>