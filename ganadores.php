<?php   
  include('header.php');
  include('db.php');
  $sql = "SELECT id, username FROM ganadores";
  $result = $conn->query($sql);
?>


      <div id="content" class="p-4 p-md-5 pt-5">
        
        <h1 class="mb-4">Ganadores</h1>
        <hr>
        
        
        <h3 class="mb-4">Listado de ganadores</h3>        
        
        <table class="table" style="width:500px">
          <tbody>
            <tr>
              <th>Posicion</th>
              <th>Nombre</th>
            <tr>
            
            <?php
              $puesto = 1;
              if ($result->num_rows > 0) {    
                while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $puesto . "</td>";
                  echo "<td>" . $row["username"] . "</td>";
                  echo "</tr>";
		  $puesto = $puesto + 1;
                }                
              } else {
                  echo "<td>0 resultados</td>";              
              }
            ?>
          </tbody>
        </table>     
      </div>


<?php   
  $conn->close();
  include('footer.php');
?>
