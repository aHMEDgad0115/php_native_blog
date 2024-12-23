<?php

if (!function_exists('db_create')) {
    function db_crete($table,array $data):array {
        $sql="INSERT INTO ".$table;
        $col="";
        $values="";
        foreach($data as $key=>$value){
            $col .=$key.",";
            $values .="'".$value."',";
        }
        $col= rtrim($col,",");
        $values =rtrim($values,",");
        $sql .=" (".$col.") VALUES (".$values.")";
        //echo $sql;
        mysqli_query($GLOBALS['connect'],$sql);
        $id = mysqli_insert_id($GLOBALS['connect']);
        $first = mysqli_query($GLOBALS['connect'],"select * from {$table} where id={$id}");
        
        $GLOBALS['query']=$first;
        return mysqli_fetch_assoc($first);
    }
}


if(!function_exists('db_update')){
    function db_update(string $table, array $data, int $id){
        $sql = "update {$table} set ";
        $column_value="";
        foreach($data as $key=>$value){
            $column_value.="{$key}='{$value}', ";
        }
        $column_value = rtrim($column_value,", ");
        $sql .= $column_value." where id=".$id;
        mysqli_query($GLOBALS['connect'],$sql);
        $first=mysqli_query($GLOBALS['connect'],"select * from {$table} where id={$id}");
        $data= mysqli_fetch_assoc($first);
        $GLOBALS['query']=$first;
        return $data;
    }
}

if(!function_exists('db_delete')){
    function db_delete(string $table, int $id):mixed {
    
        $query = mysqli_query($GLOBALS['connect'],"delete from {$table}  where id={$id}");
        $GLOBALS['query']=$query;
        return $query;
    }
}



if(!function_exists('db_find')){
    function db_find(string $table, int $id):mixed {
    
        $query = mysqli_query($GLOBALS['connect'],"select * from {$table}  where id={$id}");
        $result = mysqli_fetch_assoc($query);
        $GLOBALS['query']=$query;
        return $result;
    }
}



if(!function_exists('db_first')){
    function db_first(string $table, string $query_str,string $select ='*'):mixed {
    
        $query = mysqli_query($GLOBALS['connect'],"select {$select} from {$table}  {$query_str}");
        $result = mysqli_fetch_assoc($query);
        $GLOBALS['query']=$query;
        return $result;
    }
}


if(!function_exists('db_get')){
    function db_get(string $table, string $query_str):mixed {
    
        $query = mysqli_query($GLOBALS['connect'],"select * from {$table}  {$query_str}");
        $num = mysqli_num_rows($query);
        // $result = mysqli_fetch_assoc($query);
        $GLOBALS['query']=$query;
        return [
            'query'=>$query,
            'num'=>$num,
        ];
    }
}


/**
 * search for multiple and pagination row Data from datebase
 * @param string table 
 * @param string query_str
 * @param int id
 * @param int limit
 * @return array
 */

  
if(!function_exists("render_paginate")){
    function render_paginate(int $total_pages, $appends):string{
        $request_page_str='';
        if(!empty($appends)&&count($appends)>0){
            foreach($appends as $key=>$value){
                $request_page_str .= $key.'='.$value.'&';
            }
        }
        $request_page_str .='page=';

        $p_disabled =empty(request('page'))||request('page')<=1?'disabled':'';
        $p_number = !empty(request('page'))&&is_numeric(request('page'))
        &&request('page')<=$total_pages
        &&request('page')>0
        ?request('page')-1:1;
        if(request('page')>$total_pages){
            $p_number=$total_pages;
        }
        $html ="<ul class='pagination justify-content-center' dir='ltr'>";
        $html.=' 
             <li class="page-item">
                 <a class="page-link '.$p_disabled.'" href="?'.$request_page_str.$p_number.'"
                                                      aria-label="Previous">
                     <span aria-hidden="true">&laquo;</span>
                     <span class="sr-only">Previous</span>
                 </a>
             </li>
             ';

        for ($i=1; $i <= $total_pages ; $i++) { 
            $active =(!empty(request('page'))&&request('page')==$i)||
                     ($i==1 && empty(request('page')))?'active':'';
            $html.="<li class='page-item {$active}'><a class='page-link' 
                                href='?{$request_page_str}{$i}'>{$i}</a></li>";
        }

        $n_disabled =!empty(request('page'))&&request('page')>=$total_pages?'disabled':'';
        $n_number = !empty(request('page'))&&is_numeric(request('page'))
        &&request('page')<$total_pages
        &&request('page')>0
        ?request('page')+1:1;
        
        $html.='
            <li class="page-item">
             <a class="page-link '.$n_disabled.'" href="?'.$request_page_str.$n_number.'" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
             </a>
            </li>
        </ul>';

        return $total_pages>0?$html:'';
    }
}


if(!function_exists('db_paginate')){
    function db_paginate(string $table, string $query_str,string $orderby='asc',
                         int $limit=15,string $select='*',array $appends =null):mixed {

        if (isset($_GET['page'])&& is_numeric($_GET['page'])&& $_GET['page']>0) {
           $curent_page = $_GET['page']-1;
        }else {
            $curent_page = 0;
        }
        $query_count = mysqli_query($GLOBALS['connect'],"select COUNT({$table}.id)
         from {$table}  {$query_str}");
        $count = mysqli_fetch_row($query_count);
        $total_records = $count[0];
        
        $start = $curent_page * $limit;
        $total_pages = ceil($total_records / $limit);
        if ($curent_page>= $total_pages) {
            $start =$total_records +1;
        //if i want to go to the last page not to null page used  $start =($total_pages -1)*$limit;
        }
        //var_dump($total_pages,$start);

        $query = mysqli_query($GLOBALS['connect'],"select {$select} from {$table} 
                {$query_str} order by {$table}.id {$orderby} LIMIT {$start},{$limit}");
        $num = mysqli_num_rows($query);
        $GLOBALS['query']=$query;
        return [
            'query'=>$query,
            'num'=>$num,
            'total_pages'=>$total_pages,
            'render'=>render_paginate($total_pages,$appends),
            'curent_page'=>$curent_page,
            'limit'=>$limit,

        ];
    }
}
/*
$users=db_paginate("users",'',"asc",3);
while ($raw = mysqli_fetch_assoc($users['query'])) {
    echo $raw['email']."<br>";
}
echo $users['render'];
*/


if(!function_exists('db_setting_strict')){
    function db_setting_strict(){
        mysqli_query($GLOBALS['connect'],
        'set GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,"ONLY_FULL_GROUP_BY",""))');
    }
}