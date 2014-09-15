<?php
    $searchtxt=@$_POST["searchtxt"];
    $select=@$_POST['select'];
    if(isset($_POST["submit"])){
        if($select=='categories'){
            $sql=  search($searchtxt);
                while ($rows = mysqli_fetch_array($sql)) {
                    echo $rows['name'].'<br>'.$rows['body'];
                } 
        }
 else { 
     $sql=  search($searchtxt,$select);
     while ($rows = mysqli_fetch_array($sql)) {
                    echo $rows['name'].'<br>'.$rows['body'];
                } 
 }
    }
    ?>