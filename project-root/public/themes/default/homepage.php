
<div class="row">
    <div class="col">
        <?php foreach($articles as $article): ?>

            <h2><a href="<?= $article['pageUri']; ?>"><?= $article['pageName']; ?></a></h2>
        <p><?= substr($article['article'], 0, 250) . '...'; ?></p>
        <hr>

        <?php endforeach; ?>

        <?php
//        dmp($articles);
        ?>
    </div>
</div>
