<?php
class Db_log 
{

    function __construct() 
    {
    }


    function logQueries() 
    {
        $CI = & get_instance();

        $filepath = 'logs/query_logs/query_log.txt'; 
        $handle = fopen($filepath, "a+");                        

        $times = $CI->db->query_times;
        foreach ($CI->db->queries as $key => $query) 
        { 
        	$times = $CI->db->query_times;
            $sql = $query . " \n Execution Time:" . $times[$key]; 

            fwrite($handle, $sql . "\r\n");    
        }

        fclose($handle);  
    }

}
?>