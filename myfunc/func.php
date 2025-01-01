<?php
    function fetchData($connect,$sql){
        $result = mysqli_query($connect, $sql);
    
        
            if (mysqli_num_rows($result) > 0) {
        
                echo "<table border='1' >";
                echo "<tr>";
                
                $columns = mysqli_fetch_fields($result);
                foreach ($columns as $column) {
                
        
                    echo "<th>$column->name</th>";
                }
                echo "</tr>";
        
                
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }      
                echo "</table>";
            } else {
                echo "No result";
            }
    }
    function fetchdataB($connect,$sql){
        $result = mysqli_query($connect, $sql);
         
            
                if (mysqli_num_rows($result) > 0) {
               
                    echo "<table border='1' >";
                    echo "<tr>
                    
                    <th>ID</th>
                    <th>Title</th>
                    <th>Details</th>
                    </tr>";
              
                    while ($row = mysqli_fetch_assoc($result)) {    
                        echo "<tr>";
                        $book_id = $row['book_id'];
                        $name=$row['title'];
                        echo "<td>$book_id</td>";
                        echo "<td>$name</td>";
                        echo "<td><a href='bookDetails.php?book_id=$book_id'>Details</a></td>";
                        echo "</tr>";
                    }      
                    echo "</table>";
                } else {
                    echo "<h4>Nothing Found</h4>";
                }
    }
 

    //search books by the name
    function SearchBooks($name,$connect,$colnames){
        try {
            $sql = "SELECT ";
            for($i=0; $i<sizeof($colnames)-1; $i++){
                $sql.=$colnames[$i].",";
            }
        $sql.=$colnames[sizeof($colnames)-1]." FROM book where title like '%$name%'";
            
           fetchDataB($connect,$sql);  
              
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

   
    //using book id get book details
    function getDetails($book_id,$connect){
        try {
            $sql = "SELECT * FROM book WHERE book_id=$book_id ";
            
              
            fetchData($connect,$sql);  
              
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function bookDetails($connect){
        try {
            // SQL query to join the tables: books, book_authors, and authors
            $sql = "SELECT b.title,b.published_date, published_id,
                    FROM book as b
                    INNER JOIN book_authors as ba ON b.book_id = ba.book_id
                    INNER JOIN publishers as a ON a.author_id = ba.author_id";
            
            fetchData($connect,$sql);  
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

 
    



     
?>