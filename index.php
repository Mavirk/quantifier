<?php
$db  = new SQLite3('test.sqlite');

//  $input = readline("Enter your name :");
$outputFromDb = $db->query('SELECT * from users');
// echo $input;
$users = array();
$i = 0;
while ($res = $outputFromDb->fetchArray(SQLITE3_ASSOC)) {
    $users[$i]['name'] = $res['name'];
    $i++;
}
for ($j=0; $j < count($users); $j++) { 
    echo ($users[$j]['name']);
}
?>