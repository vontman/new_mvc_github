<?php
echo $_SERVER['DOCUMENT_ROOT'];
    include_once '../model/tasks.php';
    $tasks=new tasks();
    $user_id=$_SESSION['userid'];
    if(isset($_POST['add_task'])){
        if(!empty($_POST['task_name'])&&!empty($_POST['task_body'])){
            $addtask['user_id']=$user_id;
            $addtask['name']=$_POST['task_name'];
            $addtask['body']=$_POST['task_body'];
//            $addtask['to']=$_POST['task_to_date'];
//            $addtask['to_time']=$_POST['task_to_time'];
//            $addtask['from']=$_POST['task_from_date'];
//            $addtask['from_time']=$_POST['task_from_time'];
//            $addtask['category']=$_POST['task_category'];
            $addtask['created']=  date("Y-m-d,H-m-s");
            $task_new_id=$tasks->add_task($addtask);
        }
    }
?>
<div class="sub">
    <h2>Task </h2>
    <div class="tasks_form">
        <ul class="tasks_ul">
            <?php
                $sql=$tasks->view_tasks($user_id);
                while($rows_tasks=  mysqli_fetch_array($sql)){
                    echo "<li style='background:red;'>".$rows_tasks['name']."</li>";
                }
            ?>  
        </ul>
        <form action='' method='post'>
            <input type='text' name='task_name' placeholder='Title'/><br>
            <textarea name='task_body' placeholder='Task'></textarea><br>
            <font>From </font><input type='date' name='task_from_date' /><input type='time' name='task_from_time'><br>
            <font>To </font><input type='date' name='task_to_date' /><input type='time' name='task_to_time'><br>
            <select>
                <?php
                    $sql=$tasks->categories();
                    while($rows=  mysqli_fetch_array($sql)){
                        echo "<option style='background:".$rows['color'].";' value='".$rows['id']."'>".$rows['name']."</option>";
                    }
                ?>
            </select>
            <input type='submit' name='add_task' value='Add task'/>
        </form>
    </div>
</div>