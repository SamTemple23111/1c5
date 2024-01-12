    <?php  if (count($errors) > 0) : ?>
    <div class="error">
    <?php foreach ($errors as $error) : // Telegram @fletchen?>
    <p><?php echo $error ?></p>
    <?php endforeach ?>
    </div>
    <?php  endif ?>