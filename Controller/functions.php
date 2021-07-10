<?php

//CREATE

if(isset($_POST['submit'])){

$tasktitle    = $_POST['tasktitle'];
$description  = $_POST['description'];
$duedate      = $_POST['duedate'];
$status       = $_POST['status'];
$datecreated  = date("l jS \of F Y h:i:s A");

$task->settasktitle($tasktitle);
$task->setdescription($description);
$task->setduedate($duedate);
$task->setstatus($status);
$task->setdatecreated($datecreated);



if($task->insert()){
 
   
    echo "<div class='alert alert-success' role='alert'>";
    echo "<center><h4><strong>Successfully Added</strong></h4></center>";
    echo "</div>";


}

}


// UPDATE

if(isset($_POST['update'])){
$tasktitle   = $_POST['tasktitle'];
$description = $_POST['description'];
$duedate     = $_POST['duedate'];
$status      = $_POST['status'];
$id          = $_POST['id'];

$task->settasktitle($tasktitle);
$task->setdescription($description);
$task->setduedate($duedate);
$task->setstatus($status);

if($task->update($id))
{


    echo "<div class='alert alert-info' role='alert'>";
    echo "<center><h4><strong>Successfully Updated</strong></h4></center>";
    echo "</div>";
  
  
}

}


// DELETE


if(isset($_GET['action']) && $_GET['action'] == 'delete'){
  $id = (int)$_GET['id'];

  if($task->delete($id)){

  echo  "<div class='alert alert-danger' role='alert'>";
  echo  "<div id='dltmsg'><center><h4><strong>Succesfully Deleted</strong></h4></center></div>";
  echo  "</div>";


 
  
  }
}







    




