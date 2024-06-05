<nav class="dataTable-pagination">
    <ul class="dataTable-pagination-list">
        <?php foreach ($pager->links() as $link): ?>
            <?php $activeClass = $link['active'] ? 'datatable-active' : ''; ?>
            <li class="datatable-pagination-list-item <?= $activeClass ?>">
                <a href="<?= $link['uri'] ?>" class="datatable-pagination-list-item-link"><?= $link['title'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
