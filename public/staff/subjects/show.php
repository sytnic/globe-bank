<?php require_once('../../../private/initialize.php'); ?>
<?php

// классический вариант проверки наличия значения
/*
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '1';
}
*/

// 2 вариант - тернарный оператор
// $id = isset($_GET['id']) ? $_GET['id'] : '1';  // for PHP < 7.0

// 3 вариант - оператор нулевого слияния
$id = $_GET['id'] ?? '1';  // for PHP > 7.0

echo h($id);

?>

<a href="show.php?name=<?php echo u('John Doe'); ?>">Link</a><br />
<a href="show.php?company=<?php echo u('Widgets&More'); ?>">Link</a><br />
<a href="show.php?query=<?php echo u('!#*?'); ?>">Link</a><br />