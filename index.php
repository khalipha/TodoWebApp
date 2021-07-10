<?php

include "View/header.php";

spl_autoload_register(function($className){
  include 'Model/'.$className.'.php';
});

$task = new clsTodo();


?>


<center><h3><b>My Todo List</b><img src="View/icons/todo.png" alt="todoicon" width="80px" height="80px"/></h3> </center>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="row">
<div class="col-md-1"></div>


<div class="col-md-11">

<div><button class="btn btn-success" onclick="AddShadow()">Create</button></div>





<br><br>
  
<?php
include "Controller/functions.php";
?>
 

<div class="row"> 
  <div class="col-md-4">
    <div id="dvCreate" class="shadow-lg p-3 mb-5 bg-white rounded">

                          <?php

                          //EDIT
                          if(isset($_GET['action']) && $_GET['action']=='update') {
                            $id = (int)$_GET['id'];
                            $result = $task->readById($id);
                            ?>
                                   

                                 
                                    <form action="" method="post">

                                    <input type="hidden" name="id" value="<?php echo $result['id']; ?>" />

                                      <div class="form-group">
                                          <label for="fortasktitle"><b>Task Title</b></label>
                                          <input type="text" class="form-control" id="fortasktitle" required autocomplete="off"  value="<?php echo $result['tasktitle']; ?>" name="tasktitle" required="1" placeholder="Task Title"/>         
                                      </div>
                                              

                                      <div class="form-group">
                                          <label for="fordescription"><b>Description</b></label>
                                          <textarea type="text" class="form-control" id="fordescription"  required autocomplete="off" value="<?php echo $result['description']; ?>" name="description" required="1" placeholder="Description"><?php echo $result['description']; ?></textarea>  
                                      </div>


                                      <div class="form-group">
                                        <label for="forduedate"><b>Due Date</b></label>
                                        <input class="form-control" type="date" value="<?php echo $result['duedate']; ?>" id="forduedate" name="duedate"/>
                                    </div>
                                   

                                      <div class="form-group">
                                          <label for="forstatus">Status: <?php echo("<b>" . $result['status'] . "</b>");  ?></label> </br>

                                          <select name="status"  class="form-control">
                                          <option value="Completed">Completed</option> 
                                            <option value="HalfWay">HalfWay</option> 
                                            <option value="Todo">Todo</option> 
                                          </select>
                                      </div>

                                      </br>


                                  <label  for="fordatecreated">Created:</br> <?php echo("<b>" . $result['datecreated'] . "</b>");  ?></label> </br>

                                  

                                    <div class="form-group" style="display:flex">
                                        <div><input type="submit" class="btn btn-primary" name="update" value="Update"/></div>
                                        <div style="width:20px;"></div>                                   
                                        <div><a href="index.php?action=update&id=-0"><img src="View/icons/clean.png" alt="deleteicon" width="40px" height="40px"/></a></div>


                                  </div>

                                    </form>
                         
                                  
                          <?php


                        } else{
                          ?>

                                    <form action="" method="post">

                                    <div class="form-group">
                                        <label for="fortasktitle"><b>Task Title</b></label>
                                        <input type="text" class="form-control" id="efortasktitle" required autocomplete="off" name="tasktitle" required="1" placeholder="Task Title"/>         
                                    </div>


                                    <div class="form-group">
                                          <label for="fordescription"><b>Description</b></label>
                                          <textarea type="text" class="form-control" id="fordescription"  required autocomplete="off"  name="description" required="1" placeholder="Description"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="forduedate"><b>Due Date</b></label>
                                        <input class="form-control" type="date" id="forduedate" name="duedate"/>
                                    </div>

                                    <div class="form-group">
                                          <label for="forstatus"><b>Status:</b></label> </br>

                                          <select name="status" class="form-control">
                                            <option value="Completed">Completed</option> 
                                            <option value="HalfWay">HalfWay</option> 
                                            <option value="Todo">Todo</option> 
                                          </select>                                                   
                                    </div>

                                    <div class="form-group" style="display:flex">
                                      <div><input type="submit" class="btn btn-primary" name="submit" value="Submit"/></div>
                                      <div style="width:10px;"></div>
                                      <div><input type="reset"  class="btn btn-primary"  onclick="Clear()" value="Clear"/></div>
                                     
                                     





                                      


                                    </div>

                                </form>
                       

                        <?php
                        }

                        ?>

 </div>                  
</div>



<div class="col-md-7">

<div class="shadow-lg p-3 mb-5 bg-white rounded">

            <table class="table">
            <thead>
              <tr>
                <th  scope="col" style="display:none;">#</th>
                <th scope="col">Task Title</th>
                <th width="100px;" scope="col">Description </th>
                <th scope="col">Due Date </th>
                <th scope="col">Status </th>
                <th scope="col" style="display:none;">DC </th>
                <th scope="col">Action</th>
              </tr> 
          </thead>

              <?php
              $i= 0;
              if(is_array($task->readAll()) || is_object($task->readAll())){
                foreach($task->readAll() as $value){
                  $i++;
                  ?>
              <tbody>
                  <tr>
                    <td style="display:none;"><?php echo $i; ?></td>
                    <td><?php echo $value['tasktitle'];  ?></td>
                    <td width="100px;"><?php echo $value['description'];  ?></td>
                    <td><?php echo $value['duedate'];  ?></td>
                    <td><?php echo $value['status'];  ?></td>
                    <td style="display:none;"><?php echo $value['datecreated'];  ?></td>
                      <td>
                      <a href="index.php?action=update&id=<?php echo $value['id']; ?>"><img src="View/icons/edit.png" alt="editicon" width="40px" height="40px"/></a> 
                     
                      <a href="index.php?action=delete&id=<?php echo $value['id']; ?>"><img src="View/icons/delete.png" alt="deleteicon" width="40px" height="40px"/></a>
                      </td>
                  </tr>
              </tbody>
                  <?php
                }
              } else {
                 echo "<div class='alert alert-danger' role='alert>";
                 echo "No Records";
                 echo "</div>";
              }
              ?>

            </table>
</div>
</div>
</div>


</div>

<!-- <div class="col-md-1"></div> -->
</div>
</body>
</html>























   