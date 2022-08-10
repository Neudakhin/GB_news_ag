<div>
    <h2>Categories</h2>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li>
                <a href="<?=route('news',[$category])?>">
                    <?=$category?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</div>
