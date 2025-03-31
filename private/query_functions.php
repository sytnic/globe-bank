<?php

function find_all_subjects() {
    global $db;
    
    $sql = "SELECT * FROM subjects";
    $sql.= " ORDER BY position ASC";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    return $result_set;
}

function find_subject_by_id($id) {
    global $db;

    $sql = "SELECT * FROM subjects";
    $sql.= " WHERE id='".$id."'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $subject; // return an assoc. array
}

function insert_subject($menu_name, $position, $visible) {
    global $db;

    $sql = "INSERT INTO subjects";
    $sql.= " (menu_name, position, visible)";
    $sql.= " VALUES (";
    $sql.= "'".$menu_name."',";
    $sql.= "'".$position."',";
    $sql.= "'".$visible."'";
    $sql.= ")";

    $result = mysqli_query($db, $sql);
    // For INSERT, $result is true/false.
    // Для всех запросов, кроме SELECT, возвращается true/false.
    // Для SELECT - результирующий набор.
    if($result) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

/**
 * Обновит запись в БД
 *
 * @param array $subject
 * @return true|error 
 */
function update_subject($subject) {
    global $db;

    $sql = "UPDATE subjects SET";
    $sql.= " menu_name='".$subject['menu_name'] ."',";
    $sql.= " position='".$subject['position'] ."',";
    $sql.= " visible='".$subject['visible'] ."'";
    $sql.= " WHERE id='".$subject['id']."' ";
    $sql.= " LIMIT 1";
  
    $result = mysqli_query($db, $sql);
    // For UPDATE $result is true/false
    if($result) {
      // redirect_to(url_for('/staff/subjects/show.php?id='.$id));
      // вместо редиректа вернём true
      return true;
    } else {
      // Update failed
      echo mysqli_error($db);
      db_dissonnect($db);
      exit;
    }
}

function find_all_pages() {
    global $db;
    
    $sql = "SELECT * FROM pages";
    $sql.= " ORDER BY subject_id ASC, position ASC";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    return $result_set;
}


?>