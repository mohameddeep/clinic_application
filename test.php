<!-- file for test only -->

<?php 

//INSERT INTO `major` (`id`, `name`, `image`, `created_at`) VALUES (NULL, 'heart', '', current_timestamp());
$array=[1,2,3,4,"ali"];
$str=implode(",",$array);
echo $str;
$col=[1,2,3,4];

$cols = array_map(function ($e) {
    return "`" . $e . "`";
}, $col);

var_dump($cols);
// $columns = implode(",", $cols);
// $info = array_map(function ($e) {
//     return "'" . $e . "'";
// }, $data);
// $data = implode(",", $info);

$query= "12345 and ";
echo strlen($query)."<br>";
$query = substr($query, 3, 5);
echo $query;
echo "<br>";



$x= __DIR__ . "/public/";

echo substr($x,16,strlen($x)- 1);
echo "<br>";

$arr=explode("\\",$x);
$arr2=implode("\\",$arr);
// var_dump($arr);
echo "<pre>";
//print_r($_SERVER);

$x= $_SERVER['HTTP_REFERER'];
strlen($x);
echo "</pre>";
$y=substr($x,0,strlen($x)- 8);
?>

<a href="<?php echo $y  ?>">ddd</a>




