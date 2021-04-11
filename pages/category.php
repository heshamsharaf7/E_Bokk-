<!-- include the other php files -->
<?php session_start(); ?>
<?php

require_once ("../php/component.php");
require_once ("../php/operationCategory.php");
require_once ("../php/loginOpreation.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="alert alert-primary" role="alert">
  <?php
  global $message;
  echo $message ?>
   
</div>

<main>
<!-- the frist seaction of the page 
                                                the input fileds and save button-->
                                                <a  class="btn btn-primary btn-lg btn-block" href="main.php">Main</a>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Category Info</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("text","<i class='fas fa-id-badge'></i> ","disabled","ID", "cat_id",$catid); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("text","<i class='fas fa-book'></i> *","","Category Name", "cat_name",$cat_name); ?>
                </div>
                
           
            
                </div>
                    </div>
                    </div>
                 
                    <div class="d-flex justify-content-center">

                        <?php 
                        //buttons to add/update/read
                        if($check){
                            
                           
                            buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); 
                        }else{
                        buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); 
                        }
                       ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                      
                </div>
            </form>
         
        </div>
          <!-- Bootstrap table  -->
          <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php
$table="category";
$result=getData($table);
                  
   while($row=$result->fetch_assoc()){
                      


  
?>

   <tr>
       <td ><?php echo $row['CatID']; ?></td>
       <td ><?php echo $row['CatName']; ?></td>
       <td>
   <a class="btn btn-outline-primary" href="../pages/category.php?edit= <?php echo $row['CatID'] ?> ">edit</a>
   <a class="btn btn-danger btn-sm" href="../php/operationCategory.php?delete= <?php echo $row['CatID'] ?>">delete</a>
   </td>
       
       
   </tr>

                   <?php
                           }

                   ?>
                </tbody>
            </table>
        </div>

       


    </div>
</main>



</body>
</html>