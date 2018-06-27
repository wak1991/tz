<section class="main-content">

    <div class="container">
        <div class="col-sm-3">
            <a class="btn btn-default" href="/add">Создать задачу</a>
        </div>
        <div class="row">
            <div class="col-sm">
                <h3>TODO</h3><hr>
                <?php foreach ($task as $k) :?>
                    <?php if ($k['status'] == 'todo'): ?>
                        <p><a href="#"><?= $k['name'];?></a> - комментарии: 5 шт</p><hr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="col-sm">
                <h3>DOING</h3><hr>
                <?php foreach ($task as $k) :?>
                    <?php if ($k['status'] == 'doing'): ?>
                        <p><a href="#"><?= $k['name'];?></a> - комментарии: 5 шт</p><hr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="col-sm">
                <h3>DONE</h3><hr>
                <?php foreach ($task as $k) :?>
                    <?php if ($k['status'] == 'done'): ?>
                        <p><a href="#"><?= $k['name'];?></a> - комментарии: 5 шт</p><hr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>