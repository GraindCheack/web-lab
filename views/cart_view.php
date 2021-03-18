<section>
    <h2>Товары</h2>
    <?php
    if ($data != null) {
        print "<div class='product_list'>";
        foreach ($data as $row1) {
            foreach ($row1 as $row) {
                print "
                <div class='card good'>
                    <img class='card-img-top h-75' src=" . $row[6] . " alt='ARTEM'/>
                    <form class='card-body' id='form1' name='form1' method='post' action='http://localhost/cart/index'>
                        <h5>Модель: " . $row[1] . "</h5>
                        <h5>Код товара: " . $row[2] . "</h5>
                        <h5>Цена: " . $row[3] . "</h5>
                        <input type='hidden' name='product_id' value='" . $row[0] . "'>
                        <input type='hidden' name='cost' value='" . $row[3] . "'>
                        <button type='submit' class='btn btn-primary'>Удалить</a>
                    </form>
                </div>";
            }
        }
        print "</div>";
    } else {
        print "<span>В Вашей корзине еще ничего нет</span>";
    }
    ?>
    <form action='http://localhost/cart/index' method='POST'>
        <div class="input-group mb-3">
            <span class=" input-group-text">Имя</span>
            <input class="form-control" type='text' name='first_name'>
            <span class=" input-group-text">Фамилия</span>
            <input class="form-control" type='text' name='second_name'>
            <span class=" input-group-text">Отчество</span>
            <input class="form-control" type='text' name='middle_name'>
            <span class=" input-group-text">Адрес</span>
            <input class="form-control" type='text' name='address'>
            <button type="submit" class="btn btn-outline-primary">Оформить</button>
        </div>


    </form>
</section>