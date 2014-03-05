<h1>Search Results:</h1>
<?php foreach ($results as $result) : ?>

      <p>
            <a href="<?php echo $result->permalink_url;?>">
                <?php echo $result->title ?>
            </a>
      </p>
<?php endforeach; ?>