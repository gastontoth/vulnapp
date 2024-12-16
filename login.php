<?php
  session_start();
  if (!isset($_SESSION["allowed_browser"])) {
    header('Location: 403.html');
  } else {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {

      include('db.php');

      $stmt = $conn->prepare("SELECT id, username FROM users WHERE username = ? and enabled = 1");
      $stmt->execute([$_POST["username"]]);            
      $result = $stmt->get_result();
      $row = $result->fetch_array();

      $existe = $result->num_rows > 0;

      if ($existe){
        $username = $row["username"];

        $ok = false;

        try {
          $query_pass = "SELECT count(id) as valido FROM users WHERE username = '" . $username . "' and md5password = md5('" . $_POST["password"] . "')";
          echo ($query_pass);        
          $resultado = $conn->query($query_pass);
          $valido = $resultado->fetch_array();
          $ok = $valido["valido"] > 0;
        } catch (Exception $e){
          echo ($e);
          exit();        
        } 
        
        if ($ok) {
          $_SESSION["username"] = $username;           
          header('Location: dashboard.php');
        } else {
          header('Location: index.php?mensaje=Clave incorrecta.');
        }        
        
      } else {
        header('Location: index.php?mensaje=Usuario no valido');
      }
      


      

      
      $stmt->close();
      $conn->close();

      /*if ($_POST["username"] == "admin1"){
        $_SESSION["username"] = "admin1";
        header('Location: dashboard.php');
      } else {
        header('Location: index.php?mensaje=Usuario o clave incorrecta.');
      }*/


    } else {
      header('Location: index.php?mensaje=Debe completar todos los campos.');
    }      
  }
  flush();
  
?>

