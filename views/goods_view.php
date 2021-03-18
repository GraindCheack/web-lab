<section class="main-content">
    <div >
        <form class="sort-filter" action="http://localhost/goods/index" method="post">
            <div class="input-group mb-3">
                <div class="input-group-text">Сортировать по</div>
                <div class="input-group-text"><input class="form-check-input" type="checkbox" name="sortCheck"></div>
                <select class="form-select" name="sortSelect">
                    <option value="name">Модель</option>
                    <option value="number">Номер</option>
                    <option value="cost">Цена</option>
                </select>
                <div class="input-group-text">Фильтровать по</div>
                <select class="form-select" name="filterSelect">
                    <option value="name">Модель</option>
                    <option value="number">Номер</option>
                    <option value="cost">Цена</option>
                </select>
                <div class="input-group-text">Ключевое слово</div>
                <input class="form-control" type="text" name="filterCheck">
                <input type="submit" class="btn btn-outline-success" value="Применить">
            </div>
        </form>
    </div>

    <div class="product_list">
        <?php
        foreach ($data as $row) {
            print "
                <div class='card good'>
                    <img class='card-img-top h-75' src=" . $row[6] . " alt='ARTEM'/>
                    <form class='card-body' id='form1' name='form1' method='post' action='http://localhost/goods/index'>
                        <h5>Модель: " . $row[1] . "</h5>
                        <h5>Код товара: " . $row[2] . "</h5>
                        <h5>Цена: " . $row[3] . "</h5>
                        <input type='hidden' name='product_id' value='" . $row[0] . "'>
                        <input type='hidden' name='cost' value='" . $row[3] . "'>
                        <button type='submit' class='btn btn-primary'>В корзину</a>
                    </form>
                </div>";
        }
        ?>
    </div>
</section>