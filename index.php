<?php include ("db.php") ?>

    <?php include ("includes/header.php") ?>

        <div class="container p-4">
        

            <div class="row">
      
            <div class ="col-md-4">
            <?php   if(isset($_SESSION['message'])) { ?>

                    <div class="alert alert-<?= $_SESSION['message_type'];?>
                     alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
            <?php session_unset(); } ?> 
                <div class="card card-body">
           
                    <form action= "save_task.php" method="POST">

                        <div class = "form-group">

                            <input type="text" name= "title" class="form-control"
                                placeholder="Ingrese Articulo" autofocus>
                        </div>
                            <div class="form-group">
                                <textarea name="description" rows="2" class= "form-control"
                                placeholder="Descripcion del Articulo"></textarea>
                            </div>
                                 <input type="submit" class= "btn btn-primary btn-block"
                                 name="save_task" value="Guardar Articulo">
                    </form>
                </div>
                
                
                
                     </div>
                     <div class="col-md-8">
                     <table class="table table-bordered" >
                     <thead>
                        <tr> 
                            <th>Articulo</th>
                            <th>Descripción </th>
                            <th>Fecha </th>
                            <th>Acción </th>
                        </tr> 
                     </thead>
                            <tbody>
                            <?php 
                            $query = "SELECT * FROM task";
                            $result_tasks = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_tasks)) { ?>
                            <tr>
                                <td> <?php echo $row['title'] ?></td>
                                <td> <?php echo $row['description'] ?></td>
                                <td> <?php echo $row['created_at'] ?> </td>
                                <td> 
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn 
                                btn-secundary">
                                <button type="button" class="btn btn-secondary">
                                                        <svg class="bi bi-pen" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                                        <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                                        <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
                                        </svg></button>
                                </a>
                                <button type="button" class="btn btn-danger">
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-dager">
                                                                            <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg></button>
                                </a>
                                
                                </td>

                            </tr>


                            <?php }?>
                            </tbody>

                     </table>
                     
                     
                     
                     
                     
                     </div>

                </div>

            </div>

        </div>
            
<?php include ("includes/footer.php")?>