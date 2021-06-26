<?php

require_once('tpl.tpl');

$connection = mysqli_connect('localhost','test','12345','seologic_test');
if ($connection == false) {
    exit();
}

$db_create = mysqli_query($connection, "CREATE TABLE stats (
   id int(5) NOT NULL AUTO_INCREMENT,
   ip varchar(50) DEFAULT NULL,
   date varchar(50) DEFAULT NULL,
   full_time varchar(50) DEFAULT NULL,
   first_enter_url varchar(200) DEFAULT NULL,
   last_leave_url varchar(200) DEFAULT NULL,
   url_count int(5) DEFAULT 0,
   browser varchar(20) DEFAULT NULL,
   os varchar(20) DEFAULT NULL,
   PRIMARY KEY(id));");

function get_db_ip() {
    global $connection;
    $get_ip_from_table = mysqli_query($connection, "SELECT ip FROM stats; ");
    $ip_array = array();
    while (($r1 = mysqli_fetch_assoc($get_ip_from_table))){
        $ip_array[] = $r1['ip'];
    }
    return $ip_array;
}

$file1 = fopen("log1.txt", 'r') or die;
while(!feof($file1))
{
    $str = explode("|", fgets($file1));
    $date = $str[0] and $time = $str[1] and $ip = $str[2] and $url_from = $str[3] and  $url_leave = $str[4];
    $ip_array = get_db_ip();
    if (in_array($ip, $ip_array)) {
        $get_count = mysqli_fetch_assoc(mysqli_query($connection, "SELECT url_count FROM stats WHERE ip = '$ip';"));
        $get_time = mysqli_fetch_assoc(mysqli_query($connection, "SELECT full_time FROM stats WHERE ip = '$ip';"));
        $full_time = $get_time['full_time'];
        $full_time = $full_time + $time;
        $count = $get_count['url_count'];
        $count++;
        $update_table = mysqli_query($connection, "UPDATE stats
  SET date = '$date', full_time = '$full_time', last_leave_url = '$url_leave', url_count = '$count'
  WHERE ip = '$ip';");

    } else {
        $add_to_table = mysqli_query($connection, "INSERT INTO stats(ip, date, full_time, first_enter_url, last_leave_url, url_count)
 VALUES ('$ip', '$date', '$time', '$url_from', '$url_leave', 1);");
    }
}
fclose($file1);

$file2 = fopen("log2.txt", 'r') or die;
while(!feof($file2))
{
    $str = explode("|", fgets($file2));
    $ip = $str[0] and $browser = $str[1] and $os = $str[2];
    $get_ip_from_table = mysqli_query($connection, "SELECT ip FROM stats; ");
    $ip_array = get_db_ip();
    if (in_array($ip, $ip_array)) {
        $update_table = mysqli_query($connection, "UPDATE stats SET browser = '$browser', os = '$os' WHERE ip = '$ip';");

    }
}
fclose($file2);

$table_create = mysqli_query($connection, "SELECT * FROM stats; ");
echo "<table><tr>
  <th>IP пользовтеля</th>
  <th>Браузер</th>
  <th>ОС</th>
  <th>URL с которого пришел впервые</th>
  <th>URL на который зашел в последний раз</th>
  <th>Кол-во URL</th>
  <th>Время на сайте</th>
  </tr>";
while (($r1 = mysqli_fetch_assoc($table_create))){
    echo "<tr>
  <td>" . $r1['ip'] ." </td>
  <td>" . $r1['browser'] ." </td>
  <td>" . $r1['os'] ." </td>
  <td>" . $r1['first_enter_url'] ." </td>
  <td>" . $r1['last_leave_url'] ." </td>
  <td>" . $r1['url_count'] ." </td>
  <td>" . $r1['full_time'] ." </td>
 </tr>";
}
echo "</tr></table>";


$drop_table = mysqli_query($connection,"drop table stats;");
mysqli_close($connection);
?>
