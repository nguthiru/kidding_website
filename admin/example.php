<?php
$myarray = array(array("Ankit","Ram","Shyam"),array("Unnao","Trichy","Kanpur"));
echo "<pre>";
print_r($myarray);

echo "</pre>";
$data = [
    "Game of Thrones" => ["Jamie Lannister","Catelyn Stark","Cersei Lannister"],
    "Black Mirror" => ['Nannete Cole','Selma Telse','Karin Parle']
];
echo "<pre>";
print_r($data);
echo "</pre>";
echo '<h1> Famous TV Series and Actors</h1>';
foreach($data as $series=>$actors){
    echo "<h2> $series </h2>";
    foreach($actors as $actor){
        echo "<p>$actor</p>";
    }
}
?>
