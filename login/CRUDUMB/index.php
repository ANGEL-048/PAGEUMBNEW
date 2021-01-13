<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="GET">
   
         <div class="form-group">
            <input type="text" name="ID" class="form-control" placeholder="ID" autofocus>
          </div>


          <div class="form-group">
            <input type="text" name="NOMBRE" class="form-control" placeholder="NOMBRE" autofocus>
          </div>
          <div class="form-group">
            <textarea name="MENSAJE" rows="2" class="form-control" placeholder="COMENTARIO"></textarea>
          </div>
          <input type="submit" name="SEARCH" class="btn btn-success btn-block" value="SEARCH">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>FOTO</th>
            <th>NOMBRE</th>
            <th>MENSAJE</th>
            <th>ID</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM cajacomentarios";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><img  height = "99px" src="data:image/jpg;base64,<?php echo base64_encode($row['foto'])?>" alt=""></td>
            <!-- <td><?php echo $row['foto']; ?></td>  -->
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['mensaje']; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
