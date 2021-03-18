<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styleAd.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <header class="header">
        <h1 class="header__title">Admin</h1>
    </header>
    <main class="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Закрыть сделку</h5>
                <?php
                print "<form action='http://localhost/admin/show.php' method='post'>
                            <div class='input-group'>
                                <input type='text' class='form-control w-25' name = 'closeDeal' placeholder='Введите id сделки'>
                                <button type='submit' class='btn btn-primary'>Закрыть сделку</button>
                            </div>
                        </form>";
                ?>
            </div>
        </div>
        <?php
        ini_set('display_errors', 0);
        include 'connection.php';
        if (isset($_POST['closeDeal'])) {
            $id_client = $link->query("select id_client from _order where id_order = " . $_POST['closeDeal'])->fetch();
            $link->query("delete from list_good where id_order = " . $_POST['closeDeal'])->fetch();
            $link->query("delete from _order where id_order = " . $_POST['closeDeal'])->fetch();
            $link->query("delete from client where id_client = " . $id_client[0])->fetch();
        }
        function drawSortFilter($head)
        {
            $heads = explode(' ', $head);
            print "<div class='sortFilter'>
        <form action='http://localhost/admin/show.php' method='post'>
            <span>Сортировать по</span>
            <select name='sortSelect'>";
            foreach ($heads as $oneHead) {
                print "<option value=" . $oneHead . ">" . $oneHead . "</option>";
            }
            print "</select>
            <span>Фильтровать по</span>
            <select name='filterSelect'>";
            foreach ($heads as $oneHead) {
                print "<option value=" . $oneHead . ">" . $oneHead . "</option>";
            }
            print "</select><br><br>
            <span>Ключевое слово</span>
            <input type='text' name='filterCheck'>
        <input type='submit' value='Применить'>
        </form>
        </div>";
        }
        function drawTable($sql)
        {
            global $link;
            $filterSelect = isset($_POST['filterSelect']) ? $_POST['filterSelect'] : '';
            $filterCheck = isset($_POST['filterCheck']) ? $_POST['filterCheck'] : '';
            $sortSelect = isset($_POST['sortSelect']) ? $_POST['sortSelect'] : '';
            $newsql = $filterSelect || $filterCheck || $sortSelect ? $sql . " where " . $filterSelect . " like '%" . $filterCheck . "%' order by " . $sortSelect . ";" : $sql . ';';
            if ($link->query($newsql) == null)
                $newsql = $sql;
            print "<tbody>";
            foreach ($link->query($newsql) as $row) {
                print "<tr>";
                for ($i = 0; $i < 6; $i++) {
                    print "<td>" . $row[$i] . "</td>";
                }
                print '</tr>';
            }
            print "</tbody>";
            print '</table>';
            print "</div>";
        }
        function drawHead($head)
        {
            print "<div class='tableC'>";
            print "<table class = 'table'>";
            drawSortFilter($head);
            $heads = explode(' ', $head);
            print "<thead class='thead-dark'>";
            print "<tr>";
            foreach ($heads as $oneHead) {
                print "<td>" . $oneHead . "</td>";
            }
            print "</tr>";
            print "</thead>";
        }
        print "<section class='accordion mt-4' id='accordionExample'>
                    <div class='accordion-item'>
                        <h5 class='accordion-header' id='headingOne'>
                        <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                            Клиенты
                        </button>
                        </h5>
                        <div id='collapseOne' class='accordion-collapse collapse show' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
                            <div class='accordion-body'>";
        drawHead("id_client second_name first_name middle_name address");
        drawTable("select * from client");
        print "
            </div></div>
            <div class='accordion-item'>
                <h5 class='accordion-header' id='headingTwo'>
                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
                        Товары
                    </button>
                </h5>
                <div id='collapseTwo' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
                    <div class='accordion-body'>
        ";
        drawHead("id_good name number cost type_good count");
        drawTable("select * from good");
        print "
            </div></div>
            <div class='accordion-item'>
                <h5 class='accordion-header' id='headingThree'>
                    <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
                        Продажи
                    </button>
                </h5>
                <div id='collapseThree' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>
                    <div class='accordion-body'>
        ";
        // drawTable("select good.name from _order left join list_good on list_good.id_list_good = _order.id_order right join good on list_good.id_good=good.id_good;");
        drawHead("id_order good_name id_client");
        drawTable("SELECT list_good.id_order, good.name, _order.id_client FROM list_good, good, _order where list_good.id_good=good.id_good and list_good.id_order=_order.id_order order by list_good.id_order;");
        print "</div></div></section>";
        ?>
    </main>
</body>
<script src="index.js"></script>

</html>