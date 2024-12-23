<?php
if (!function_exists('storage')) {
    /*function storage($path){
        if (file_exists($path)) {
            header('Content-Description: file from server');
            header('Content-Type: attachment; filename='.basename($path));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: '.filesize($path));
            readfile($path);
        }
        
        exit();



    }*/

    function storage($path) {
        // Validate file path to prevent directory traversal attacks
        $realPath = realpath($path);
        
        if (!$realPath || strpos($realPath, $_SERVER['DOCUMENT_ROOT']) !== 0) {
            http_response_code(403);
            exit('Access denied.');
        }
    
        // Check if file exists
        if (file_exists($realPath)) {
            // Get MIME type
            $mimeType = mime_content_type($realPath);
            $fileName = basename($realPath);
    
            // Set headers for download
            header('Content-Description: File Transfer');
            header('Content-Type: ' . $mimeType);
            header('Content-Disposition: attachment; filename=' . $fileName);
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($realPath));
    
            // Read and output the file
            readfile($realPath);
            exit();
        } else {
            http_response_code(404);
            exit('File not found.');
        }
    }
    
}

if (!function_exists('store_file')) {
    function store_file(array $from, string $to):bool|string{
        if(isset($from['tmp_name'])){
            $to_path='/'.ltrim($to,'/');
            $path =config('files.storage_file_path'). $to_path;
            $ex_path=explode('/',$path);
            $endf=end($ex_path);
            $check_path=str_replace($endf,'',$path);

            if(!empty($check_path)&&!file_exists($check_path)){
                mkdir($check_path,0777,true);
            }
            move_uploaded_file($from['tmp_name'],$path);
            return $to;
        }
        return false;
    }
}



if (!function_exists('file_ext')) {
    function file_ext(array $file_name):array{
        if(!empty($file_name['name'])){
            $fext=explode('.',$file_name['name']);
            $file_ext=end($fext);
            $hash_name=md5(10).rand(000,999).'.'.$file_ext;
            return[
                'name'=>$file_name['name'],
                'hash_name'=>$hash_name,
                'ext'=>$file_ext,
            ];
        }else{
            return[
                'name'=>'',
                'hash_name'=>'',
                'ext'=>'',
            ];
        }
        
    }
}



if (!function_exists('storage_url')) {
    function storage_url(string $path=null):string{
        return !empty($path)? url("storage/{$path}"):"";
    }
}



if (!function_exists('delete_file')) {
    function delete_file($to_path){

        $path =rtrim(config('files.storage_file_path'),'/').'/'.ltrim($to_path,'/');
        if(file_exists($path)){
             unlink($path);
             return true;
        }
        return false;
    }
}



if (!function_exists('delete_folder')) {
    function delete_folder($path){
        if(is_dir($path)){
           return  rmdir($path);
        }
        return false;
    }
}

