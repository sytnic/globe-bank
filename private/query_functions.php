<?php

function find_all_subjects() {
    global $db;
    
    $sql = "SELECT * FROM subjects";
    $sql.= " ORDER BY position ASC";
    $result_set = mysqli_query($db, $sql);
    return $result_set;
}


?>