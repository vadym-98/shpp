<div class="container">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand text-success">Библиотека++</a>
        <form class="form-inline" action="/admin/logout" method="Post">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Выход</button>
        </form>
    </nav>
    <div class="row content">
        <div class="col-md-7">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Название книги</th>
                    <th scope="col">Авторы</th>
                    <th scope="col">Год</th>
                    <th scope="col">Действия</th>
                    <th scope="col">Кликов</th>
                </tr>
                </thead>
                <tbody>
                <?php unset($vars['icons']);
                foreach($vars as $var) {
                    $img = $var["img"];
                    unset($var["img"]);
                    $clicks = $var['clicks'];
                    unset($var['clicks']);
                    unset($var['deleted']);?>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <img src="/public/images/books/<?=$img?>.jpg" alt="image"
                                                     style="height: 50px; width: auto; margin-right: 5px; display: block">
                                <p><?php echo $var['book_name']; unset($var['book_name']);?></p>
                            </div>
                        </td>
                    <?php foreach ($var as $value) {?>
                        <td><?=$value?></td>
                    <?php } ?>
                        <td>
                            <form action="/admin/delete" method="post">
                                <button class="btn btn-danger" name="del" value="<?=$img?>">Удалить</button>
                            </form>
                        </td>
                        <td><?=$clicks?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <div class="offset-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?=$icons?>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-5">
            <form action="/admin/add" method="post">
                <div class="jumbotron">
                    <h2 class="text-success">Add Book</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="titleOfTheBook" placeholder="название книги" name="book_name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="Year" placeholder="год издания" name="year">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">картинку</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="автор1" name="author1">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="автор2" name="author2">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="автор3" name="author3">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="автор4" name="author4">
                            </div>
                            <div class="input-group">
                                <textarea class="form-control" aria-label="With textarea" placeholder="описание книги" name="description">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="addButton">Добавить &gt</button>
                </div>
            </form>
        </div>
    </div>
</div>