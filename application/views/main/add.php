<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header"><?php echo $title; ?></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/add" method="post">
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label>Статус</label>
                                <select name="status" id="status">
                                    <option value="todo">TODO</option>
                                    <option value="doing">DOING</option>
                                    <option value="done">DONE</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>