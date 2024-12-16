<?php   
  include('header.php');
?>


      <div id="content" class="p-4 p-md-5 pt-5">
        
        <h1 class="mb-4">Info</h1>
        <hr>        
        
        <h3 class="mb-4">Mi navegador</h3>        
        <?php 
          echo "<b>User-Agent: </b>" . $_SERVER['HTTP_USER_AGENT'] . "<br>";

          if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
          } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
          } else {
            $ip = $_SERVER['REMOTE_ADDR'];
          }

          echo "<b>IP: </b>" . $ip;
        ?>
      </div>

<?php     
  include('footer.php');
?>
