<div>
    <h2>News</h2>
    <?php foreach ($news as $id => $value): ?>
        <div style="border: 1px black solid">
            <h3><a href="<?=route('news.show', [$category, $id])?>"><?=$value['title']?></a></h3>
            <strong>Author: <?=$value['author']?></strong>
            <p><?=$value['text']?></p>
            <em>Date: <?=$value['created_at']?></em>
        </div>
        <br>
        <hr>
    <?php endforeach ?>
</div>
