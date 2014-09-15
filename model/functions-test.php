<?php
    include_once 'functions.php';
    $f=new db_functions();
//    echo $f->select("users", array("id","username"), 5)."<br>";
//    echo $f->select("users", array("id","username"), false,array("username","ASC"),4)."<br>";
//    $input['username']='usertest';
//    $input['password']='test';
//    echo $f->insert("users", $input)."<br>";
//    $input2['username']='usertest';
//    echo $f->insert("users", $input2)."<br>";
//    $update['username']='omar';
//    $update['password']='hamada';
//    $update['firstname']='ellol';
//    echo $f->update("users", $update, 5); 
//    $update2['firstname']='ellol';
//    echo $f->update("users", $update2, 5);
//    include_once 'users.php';
//    $users=new users();
//    $user['username']='testlol';
//    $user['password']='passtest';
//    echo $users->register($user);
    $input['username']='hamada';
    $input['password']='passtest';
    $input['OR']=array('email'=>'email@lol.com','username'=>'lol');
    $relation[]='AND';
    $relation[]='OR';
    echo $f->check("users",$input ,$relation,array("id","username","password","email"));
?>