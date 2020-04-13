<?php

function CreateModalExcel($data,$Excelname){
    $list = $data;
    $kkk = 100;
    ob_start();
    include '../addons/fm_jiaoyu/public/example/'.$Excelname;
    $wordpic = ob_get_contents();
    ob_end_clean(); //清除缓冲区的内容，并将缓冲区关闭，但不会输出内容
    
    $zifile_name = IA_ROOT.'/attachment/down/充值记录'.time().'.xls';
    file_put_contents($zifile_name,$wordpic);
    $fp=fopen($zifile_name,"r"); 
    $file_size=filesize($zifile_name); 
    //下载文件需要用到的头 
    $fileName = basename($zifile_name);
    /*header("Content-Type: application/zip");     
    header("Content-Transfer-Encoding: Binary");      
    header("Content-Length: " . filesize($zip_name));     
    header("Content-Disposition: attachment; filename=\"" . basename($zip_name) . "\"");      
    readfile($zip_name);  */
    Header("Content-type: application/octet-stream"); 
    Header("Accept-Ranges: bytes"); 
    Header("Accept-Length:".$file_size); 
    Header("Content-Disposition: attachment; filename=".$fileName); 
    $buffer=1024;  //设置一次读取的字节数，每读取一次，就输出数据（即返回给浏览器）
    $file_count=0; //读取的总字节数
    //向浏览器返回数据 
    while(!feof($fp) && $file_count<$file_size){ 
        $file_con=fread($fp,$buffer); 
        $file_count+=$buffer; 
        echo $file_con; 
    } 
    fclose($fp);
    if($file_count >= $file_size)
    {
        unlink($zifile_name);
    }
}