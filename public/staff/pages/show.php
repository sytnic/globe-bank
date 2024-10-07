<?php require_once('../../../private/initialize.php'); ?>

<?php

// 2 вариант - тернарный оператор
// $id = isset($_GET['id']) ? $_GET['id'] : '1';  // for PHP < 7.0

// 3 вариант - оператор нулевого слияния
$id = $_GET['id'] ?? '1';  // for PHP > 7.0
?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH.'/staff_header.php');  ?>

<div id="content">

<a class="back-link" href="<?php echo url_for('/staff/pages/index.php') ?>">&laquo; Back to List</a>
<br>

    <div class="page show">

    Page ID: <?php echo h($id); ?>

    </div>

</div>

<?php include(SHARED_PATH.'/staff_footer.php');  ?>
