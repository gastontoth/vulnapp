<?php   

  include('db.php');
  $sql = "SELECT id, username, enabled FROM users";
  $result = $conn->query($sql);
?>


      <div id="content" class="p-4 p-md-5 pt-5">
        
        <h1 class="mb-4">Usuarios</h1>
        <hr>
        
        
        <h3 class="mb-4">Listado de usuarios</h3>        
        
        <table class="table" style="width:500px">
          <tbody>
            <tr>
              <th>Id</th>
              <th>Username</th>
              <th>Password</th>
              <th>Enabled</th>
            <tr>
            
            <?php
              if ($result->num_rows > 0) {    
                while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["username"] . "</td>";
                  echo "<td>[ -- Oculto-- ]</td>";
                  echo "<td>" . $row["enabled"] . "</td>";
                  echo "</tr>";               
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
