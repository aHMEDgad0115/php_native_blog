<?php

require_once __DIR__."/../includes/app.php";


//$d = db_crete('users',['name'=>'ahmed','email'=>"asw@s.com"]);
//$d = db_update("users",['name'=>'ahmed','email'=>"asw@s.com"],33);

//var_dump(config("session.timeout"));


if(config('database.strict')){
  db_setting_strict();
}


if (!empty($GLOBALS['query'])) {
    mysqli_free_result($GLOBALS['query']);
}
      
//symlink(base_path('storage/files'),public_path('storage'));
//delete_folder('storage/images/new');
route_init();
 //echo session('locale');
//session("test",'testdfdf fdkkfldskl;');
//session_forget('test');
//echo session('test');
mysqli_close($GLOBALS['connect']);

ob_end_flush();