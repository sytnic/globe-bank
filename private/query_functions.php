<?php

// Subjects

/**
 * Получает набор всех тем из таблицы subjects БД 
 * 
 * @return mysqli_result|bool
 */
function find_all_subjects() {
    global $db;
    
    $sql = "SELECT * FROM subjects";
    $sql.= " ORDER BY position ASC";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    return $result_set;
}

/**
 * Получает ассоциативный массив одной записи
 * темы из БД по её id
 *
 * @param string $id
 * @return array
 */
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

/**
 * Вставит запись темы в БД
 *
 * @param array $subject
 * @return true|error 
 */
function insert_subject($subject) {
    global $db;

    $sql = "INSERT INTO subjects";
    $sql.= " (menu_name, position, visible)";
    $sql.= " VALUES (";
    $sql.= "'".$subject['menu_name']."',";
    $sql.= "'".$subject['position']."',";
    $sql.= "'".$subject['visible']."'";
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
 * Обновит запись темы в БД
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

/**
 * Удалит запись темы в БД
 *
 * @param string $id
 * @return true|error 
 */
function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects";
    $sql.= " WHERE id='".$id."'";
    $sql.= " LIMIT 1";

    $result = mysqli_query($db, $sql);

    // For DELETE $result is true/false
    if($result) {
        // redirect_to(url_for('/staff/subjects/index.php'));
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


// Pages

/**
 * Получает набор всех записей из таблицы pages БД 
 * 
 * @return mysqli_result|bool
 */
function find_all_pages() {
    global $db;
    
    $sql = "SELECT * FROM pages";
    $sql.= " ORDER BY subject_id ASC, position ASC";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    return $result_set;
}


/**
 * Получает ассоциативный массив одной записи 
 * страницы из БД по её id
 *
 * @param string $id
 * @return array 
 */
function find_page_by_id($id) {
    global $db;

    $sql = "SELECT * FROM pages";
    $sql.= " WHERE id='".$id."'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page; // returns an assoc. array
}

/**
 * Вставляет в БД запись о новой странице
 *
 * @param array $page
 * @return true|error  
 */
function insert_page($page) {
    global $db;

    $sql = "INSERT INTO pages";
    $sql.= " (subject_id, menu_name, position, visible, content)";
    $sql.= " VALUES (";
    $sql.= "'".$page['subject_id']."', ";
    $sql.= "'".$page['menu_name']."', ";
    $sql.= "'".$page['position']."', ";
    $sql.= "'".$page['visible']."', ";
    $sql.= "'".$page['content']."'";
    $sql.= ")";

    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
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
 * Обновляет запись о странице в БД
 *
 * @param array $page 
 * @return true|error  
 */
function update_page($page) {
    global $db;

    $sql = "UPDATE pages SET";
    $sql.= " subject_id='".$page['subject_id']."', ";
    $sql.= " menu_name='".$page['menu_name']."', ";
    $sql.= " position='".$page['position']."', ";
    $sql.= " visible='".$page['visible']."', ";
    $sql.= " content='".$page['content']."' ";
    $sql.= " WHERE id='".$page['id']."' ";
    $sql.= " LIMIT 1";    

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

/**
 * Удаляет запись о странице в БД
 *
 * @param string $id 
 * @return true|error  
 */
function delete_page($id) {
    global $db;

    $sql = "DELETE FROM pages ";
    $sql.= " WHERE id='".$id."'";
    $sql.= " LIMIT 1";
    
    $result = mysqli_query($db, $sql);
    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}


?>