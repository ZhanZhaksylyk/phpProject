<?php

include 'functions.php';
include 'db.php';
$a=$_POST['cuisines'];
if((isset($a) and $a!=='')){
    $qwer='
    SELECT
        `Restaurants`.*,
        `Cuizines`.`name` AS `cuisine-name`
    FROM
        `Restaurants`
    LEFT JOIN
        `RC`
        ON `RC`.`id_r` = `Restaurants`.`id`    
    LEFT JOIN
        `Cuizines`
        on `Cuizines`.`id` = `RC`.`id_r`    
        WHERE
            `price_max` <= :max
        AND
            `price_min` >= :min
        AND `Cuizines`.`id` = :id_c
    ';
    $qwe = $pdo->prepare($qwer);
    $qwe->execute([
        ':max' => (int)$_POST['max'],
        ':min' => (int)$_POST['min'],
        ':id_c' => (int)$_POST['cuisines'],
    ]);
    print_r(sizeof($qwe));


    $result = $qwe->fetchAll();
    $result = json_encode($result,JSON_UNESCAPED_UNICODE);

    echo $result;

    saveData('c:/users/zhanz/downloads/output.json',$result);
}
else{
    # очистка таблицы
    $stmt = $pdo->prepare("TRUNCATE TABLE `Restaurants`");
    $stmt ->execute();
    $stmt = $pdo->prepare("TRUNCATE TABLE `Cuizines`");
    $stmt ->execute();
    $stmt = $pdo->prepare("TRUNCATE TABLE `RC`");
    $stmt ->execute();

    $rests = [];
    #$pages=getMaxPage(1);
    for ($i=1, $pages=getMaxPage(1); $i<=$pages; $i++) {
        $rests = array_merge($rests, getRestsFromPage($i));
    }


    $cuisines = [];
    foreach($rests as $rest) {
        $cuisines = array_merge($cuisines, $rest['cuisine']);
    }
    $cuisines = array_unique($cuisines);
    print_r($cuisines);
    $stmt = $pdo->prepare("
        INSERT INTO
            `Cuizines` (
                `name`
            ) VALUES (
                :name
            )    ");
            $cuisinesMap = [];
    foreach ($cuisines as $cuisine) {
        $stmt->execute([
            ':name' => $cuisine
        ]);
        $cuisinesMap[$cuisine] = $pdo->lastInsertId();
    }
    print_r($cuisinesMap);
    # Подготовка
    $stmt = $pdo->prepare("
        INSERT INTO
            `Restaurants` (
                `name`,
                `link`,
                `price_min`,
                `price_max`,
                `worktime`,
                `address`
            ) VALUES (
                :name,
                :link,
                :pmin,
                :pmax,
                :worktime,
                :address
            )
    ");

    #to RC
    $stmtRC = $pdo->prepare("
        INSERT INTO
            `RC`(
                `id_r`,
                `id_c`
            ) VALUES (
                :id_rest,
                :id_cuisine
            )         
    ");

    foreach($rests as $rest){
        # Выполнение
        $stmt->execute([
        ':name' => $rest['name'],
        ':link' => $rest['link'],
        ':pmin' => $rest['price']['min'],
        ':pmax' => $rest['price']['max'],
        ':worktime' =>$rest['worktime'],
        ':address' => $rest['address'],
        ]);

        $idRestaurant = $pdo->lastInsertId();
        foreach ($rest['cuisine'] as $cuisine) {
            $stmtRC->execute([
                ':id_rest'=>$idRestaurant,
                ':id_cuisine'=>$cuisinesMap[$cuisine]
            ]);
        }
    }
    print_r("<hr>Refreshing finished");
    print_r("<hr>The size of the data: ");
    print_r(sizeof($rests));

    $rests=json_encode($rests, JSON_UNESCAPED_UNICODE );

    saveData('c:/users/zhanz/downloads/data.json',$rests);
    print_r("<hr> data saved in the downloads folder");

    echo '
    <hr>
    <h1> Select the cuisine you want </h1>
    <form method="post" action="">

    <select name="cuisines">
    ';
    $q='select distinct name from cuizines';
    $c = $pdo->prepare($q);
    $c->execute();


    foreach ($c as $res) {
        echo "<option value=\"";
        echo $res['id'];
        echo "\">";
        echo $res['name'];
        echo "</option>";
    };
    echo "</select>";
    echo '<input type="text" name="min" placeholder="minimum cost">';
    echo '<input type="text" name="max" placeholder="maximum cost">';
    echo '<input type="submit">';
    echo '</form>';
}

?>
