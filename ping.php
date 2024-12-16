<?php   
  include('header.php');
?>


      <div id="content" class="p-4 p-md-5 pt-5">
        
        <h1 class="mb-4">Conectividad</h1>
        <hr>        
        
        <h3 class="mb-4">Ping</h3>        
        <?php        
          $comando = 'ping -c1 127.0.0.1';

          if (isset($_REQUEST['accion'])){
            $accion = $_REQUEST['accion'];
            if ($accion == "1") $comando = 'ls';
            if ($accion == "2") $comando = 'whoami';
            if ($accion == "3") $comando = 'base64 /etc/app/instrucciones.txt';
            if ($accion == "4") $comando = 'pwd';
            if ($accion == "5") $comando = 'ls -R';
            if ($accion == "6") $comando = 'base64 ping.php';
            if ($accion == "7") $comando = '/etc/app/secret.sh ' . $_REQUEST['clave'] . " '" . $_REQUEST['nombre'] . "'";
          }
            
          $output = shell_exec($comando);
          echo "<hr>";
          echo "<div class='jumbotron bg-dark'>";            
          echo "<a class='text-white' href='dashboard.php'><span class='fa  fa-window-close-o fa-sm'></span></a>";
          echo "<h2 class='text-white'>Verificar conectividad</h2>";
          echo "<pre class='text-white'>$output</pre>";            
          echo "</div>";            
        ?>

      </div>

<?php     
  include('footer.php');
?>
