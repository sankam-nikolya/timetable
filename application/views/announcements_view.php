<div class="container">
    <?php foreach ($ads as $ad): ?>
        <div class="bs-callout-info">
            <h3><?= $ad['title'] ?></h3>
            <?= $ad['text'] ?>
        </div>
    <?php endforeach ?>
</div>
