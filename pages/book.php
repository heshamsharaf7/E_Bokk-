<!-- include the other php files -->
<?php

require_once ("../php/component.php");
require_once ("../php/operationBook.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!--php/operationBook.php-->
<main>
<!-- the frist seaction of the page 
                                                the input fileds and save button-->
                                                <a  class="btn btn-primary btn-lg btn-block" href="main.php">Main</a>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Info</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("text","<i class='fas fa-id-badge'></i>","disabled","ID", "book_id",$book_id); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("text","<i class='fas fa-book'></i>","required","Book Name", "book_name",$book_name); ?>
                </div>
                
           
                <!--selections for category table-->
                <div class='fas fa-dollar-sign'>
               <label for="book_cat">category</label>
               
                <select name="book_cat" id="">
                <?php
                $table="category";
                 $result=getData($table);
                while($row= mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['CatID']?>"><?php echo $row['CatName']?></option>
                <?php }?>


                </select>
                <!--selections for author table-->
                </div>
                
                   
                    <div class='fas fa-dollar-sign'>
                    <label for="book_author">author</label>
                <select name="book_author" id="">
                <?php
                $table="authors";
                 $result=getData($table);
                while($row= mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['AuthID']?>"><?php echo $row['AuthName']?></option>
                <?php }?>


                </select>
              
                   <!--selections for country table-->
                    <div class='fas fa-dollar-sign'>
                    <label for="book_country">country</label>
                <select name="book_country" id="">
                <?php
                $table="country";
                 $result=getData($table);
                while($row= mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['CountryID']?>"><?php echo $row['CountryName']?></option>
                <?php }?>


                </select>
                <!--selections for house table-->
                </div>
                        
            
                    <div class='fas fa-dollar-sign'>
                    <label for="book_house">house</label>
                <select name="book_house" id="">
                <?php
                $table="house";
                 $result=getData($table);
                while($row= mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['HID']?>"><?php echo $row['Hname']?></option>
                <?php }?>


                </select>
                </div>
                    </div>
                    </div>
                    <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("text","<i class='fas fa-dollar-sign'></i>","","Book SubCategory", "book_subcat",$book_subcat); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("date","<i class='fas fa-dollar-sign'></i>","","Book Date", "book_date",$book_date); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("text","<i class='fas fa-dollar-sign'></i>","","Book Pages", "book_pages",$book_pages); ?>
                    </div>
                    </div>
                    <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("text","<i class='fas fa-dollar-sign'></i>","","Book State", "book_state",$book_state); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("text","<i class='fas fa-dollar-sign'></i>","","Price", "book_price",$book_price); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("text","<i class='fas fa-dollar-sign'></i>","","Borrowed", "book_borrowed",$book_borrowed); ?>
                    </div>
                    </div>
                    <div class="d-flex justify-content-center">

                        <?php 
                        //buttons to add/update/read
                        if($check){
                            buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); 
                       }else{
                        buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); 

                       }?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <div class="col">
                        <?php inputElement("text","<i class='fas fa-dollar-sign'></i>","","Search", "search",$search_text); ?>
                   </div>
                </div>
            </form>
          
        </div>
          <!-- Bootstrap table  -->
          <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th> Name</th>
                        <th>category</th>
                        <th>author</th>
                        <th>country</th>
                        <th>Borrowed</th>
                        <th> SubCat</th>
                        <th>date</th>
                        <th>pages</th>
                        <th>state</th>
                        <th>price</th>
                        <th>house</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php


                  
   
                      


   if(isset($_POST['read'])){
    $row=searchData();
?>

   <tr>
       <td ><?php echo $row['BookID']; ?></td>
       <td ><?php echo $row['BookName']; ?></td>
       <td ><?php echo $row['CarID']; ?></td>
       <td ><?php echo $row['AuthID']; ?></td>
       <td ><?php echo $row['CounteryID']; ?></td>
       <td ><?php echo $row['borrowed']; ?></td>
       <td ><?php echo $row['SubCat']; ?></td>
       <td ><?php echo $row['ReleaseDate']; ?></td>
       <td ><?php echo $row['BookPages']; ?></td>
       <td ><?php echo $row['BookState']; ?></td>
       <td ><?php echo $row['BookPrice']; ?></td>
       <td ><?php echo $row['HID']; ?></td>
       
   </tr>

                   <?php
                           }

                   ?>
                </tbody>
            </table>
        </div>

       


    </div>
</main>


<
</body>
</html>