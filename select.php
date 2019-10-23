<?php
include 'php/back/db.php';

function saveData($url,$file){
    file_put_contents($url,$file);
}

$stmt = $pdo->prepare("
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
");

$stmt->execute([

    ':max' => 6000,
    ':min' => 2000,
    ':id_c' => 3,
]);

$result = $stmt->fetchAll();

saveData('c:/users/zhanz/downloads/data.txt',$result);


print_r($result);
echo "<h2 style='color: white'>The size of the data: ";
echo sizeof($result);
echo "</h2>";

?>
<h1 style="color: white">YOUR DATA IS SAVED</h1>
<h3 style="color: white">In the downloads folder</h3>
<?php
include 'foot_src.html';
?>