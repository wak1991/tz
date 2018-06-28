<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/edit/<?php echo $data['id']; ?>" method="post">
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>">
                                <label>Добавить комментарий</label>
                                <input class="form-control" type="text" name="comment">
                            </div>
                            <div class="form-group">
                                <label>Статус</label>
                                <select name="status" id="status">
                                    <option <?php if($data['status'] == 'todo') echo "selected" ?> value="todo">TODO</option>
                                    <option <?php if($data['status'] == 'doing') echo "selected" ?> value="doing">DOING</option>
                                    <option <?php if($data['status'] == 'done') echo "selected" ?> value="done">DONE</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                            <hr>
                            <h3>Комментарии к задаче:</h3>
                            <?php if ($data_comments): ?>
                                <?php foreach ($data_comments as $comments): ?>
                                    <?= $comments['text']; ?>
                                    <hr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>Комментариев пока нет</p>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>