<?php
session_start();
include "db_conn.php";
/*$count = 0;
$query= "SELECT name FROM emploey Where name = 'sayed helika'";
$result=$conn->query($query);
while($row=$result->fetch_assoc()){
    $count++;
            
}
echo $count;*/

function checkItem($select, $from, $value){
    global $conn;
    $count = 0;
$query= "SELECT $select FROM $from Where $select = '$value'";
$result=$conn->query($query);
while($row=$result->fetch_assoc()){
    $count++;
            
}
return $count;
}
$c =checkItem("name", "emploey", "sayed helika");
echo $c;
















function latest($select, $from, $order , $value){
    global $conn;
$query= "SELECT $select FROM $from ORDER BY $order DESC LIMIT $value";
$result=$conn->query($query);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
return $row;
}
$n =latest("*", "emploey", "id", 3);

foreach($n as $m){
    echo $m['name'];
}








