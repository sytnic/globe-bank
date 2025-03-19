<?php

function find_all_subjects() {
    global $db;
    
    $sql = "SELECT * FROM subjects";
    $sql.= " ORDER BY position ASC";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    return $result_set;
}


?>