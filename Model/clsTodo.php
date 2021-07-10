<?php


class clsTodo{

    private $table = 'todolist';

    private $tasktitle, $description, $duedate, $status, $datecreated;

    public function settasktitle($tasktitle){
        $this->tasktitle = $tasktitle;
    }
    public function setdescription($description){
        $this->description = $description;
    }
    public function setduedate($duedate){
        $this->duedate = $duedate;
    }
    public function setstatus($status){
        $this->status = $status;
    }
    public function setdatecreated($datecreated){
        $this->datecreated = $datecreated;
    }


    public function insert(){
        $sql = "INSERT INTO $this->table(tasktitle,description,duedate,status,datecreated) VALUES(:tasktitle,:description,:duedate,:status,:datecreated)";
        $stmt = config::prepared($sql);
        $stmt->bindParam(':tasktitle', $this->tasktitle);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':duedate', $this->duedate);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':datecreated', $this->datecreated);
        return $stmt->execute();
    }




    public function readById($id){
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $stmt = config::prepared($sql);
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
        return $stmt->fetch();
    }


    public function update($id){
        $sql  = "UPDATE $this->table SET tasktitle=:tasktitle, description=:description, duedate=:duedate, status=:status WHERE id=:id";
        $stmt = config::prepared($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':tasktitle', $this->tasktitle);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':duedate', $this->duedate);
        $stmt->bindParam(':status', $this->status);
      
        return $stmt->execute();
    }

    public function readAll(){
        $sql = "SELECT * FROM $this->table";
        $stmt = config::prepared($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

         if($stmt-> rowCount() > 0){
            // echo $stmt-> rowCount();
            // echo "Yes";
            // var_dump($result);
             return $result;
         }
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $stmt = config::prepared($sql);
        $stmt -> bindParam(':id', $id);
        return $stmt->execute();
    }


}



    // public function readbytype($comboboxvalue,$comboboxtype){

    //    if ($comboboxvalue==null|| $comboboxtype==null)
    //    {
    //     $selectedValue=null;
    //     $selectedType=null;
    //    }
    //    else
    //    {
    //     $selectedValue=$comboboxvalue;
    //     $selectedType=$comboboxtype;
    //   }


       

    //     if ($selectedType==1)
    //     {
    //         $sql='select * from employees where name like "'.$selectedValue.'"';
    //     }
        
    //    else if ($selectedType==2)
    //     {
    //     $sql='select * from employees where department like "'.$selectedValue.'"';
    //     }
        
    //   else  if ($selectedType==3)
    //     {
    //     $sql='select * from employees where age like "'.$selectedValue.'"';
    //     }

    //    else if ($selectedValue==null|| $selectedType==null)
    //     {
    //         $sql='select * from employees';
    //     }



    //     // $sql = "SELECT * FROM $this->table";
    //     $stmt = config::prepared($sql);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll();

    //      if($stmt-> rowCount() > 0){
    //         // echo $stmt-> rowCount();
    //         // echo "Yes";
    //         // var_dump($result);
    //          return $result;
    //      }
    // }




    
   






