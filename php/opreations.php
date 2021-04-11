<?php
 include 'db.php';


 $book_name='';
 $book_cat='';
 $book_author='';
 $book_country='';
 $book_house='';
 $book_subcat='';
 $book_date='';
 $book_pages=0;
 $book_state='';
 $book_price=0;
 $book_borrowed='';
    function setID(){
        // $sql = "SELECT max(BookID) FROM book"; //$connect
       //  $result = mysqli_query($connecttable,$sql); 
       //result
       mysqli_query($connect,"delete FROM book") ; 
       
      // $row = mysqli_fetch_assoc($maxid);
      // return ($maxid + 1);
     }
 


?>