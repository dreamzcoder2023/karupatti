<?php
/* *******************************************************************
        Common Helper : To get common function in Atchayapathra
* *******************************************************************/
function common_date_format()
{
  $ci=& get_instance();
  $ci->load->database();
  $ci->db->select('*');
  $ci->db->from('general_settings');
  $result = $ci->db->get()->row();
  save_query_in_log();
  if(!empty($result))
  {
    $date_format = $result->date_format;
  }else{
    $date_format = 'd-m-Y';
  }
  return $date_format;

}
function save_query_in_log() {
  $ci=& get_instance();
  $ip = $_SERVER['REMOTE_ADDR'];
  $query = $ci->db->last_query();
  $times = $ci->db->query_times; 
  $time = number_format($times[0],5);

  $txt = "[".date('Y-m-d H:i:s')."] => ".$ip."  => ".$ci->session->userdata('user_id')."  =>  ".$query."  =>  ".$time;

  $mostRecentFilePath = "";
  $mostRecentFileMTime = 0;

  $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("logs/query_logs"), RecursiveIteratorIterator::CHILD_FIRST);
  foreach ($iterator as $fileinfo) {
      if ($fileinfo->isFile()) {
          if ($fileinfo->getMTime() > $mostRecentFileMTime) {
              $mostRecentFileMTime = $fileinfo->getMTime();
              $mostRecentFilePath = $fileinfo->getPathname();
          }
      }
  }

  $fsize = filesize($mostRecentFilePath);
  if($fsize>1000000)
    $myfile = file_put_contents('logs/query_logs/query_log-'.date("Y-m-d").'.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
  else
    $myfile = file_put_contents($mostRecentFilePath, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

  //$this->CI->db->query('INSERT INTO queryLog_tbl(`query`, `executedTime`, `timeTaken`, `executedBy`) '. 'VALUES ("'.$query.'", "'.date('Y-m-d h:i:s').'", "'.$time.'","'.$this->CI->session->userdata('UserID').'")');
}

// To get general settings details
function general_setting_details()
{
  $ci=& get_instance();
  $ci->load->database();

  $ci->db->select('*');
  $ci->db->from('general_settings');
  $result = $ci->db->get()->row();
  save_query_in_log();
  return $result;
}


// To get company list
function company_list()
{
  $ci=& get_instance();
  $ci->load->database();

  $ci->db->select('*');
  $ci->db->from('company');
  $result = $ci->db->get()->result_array();
  save_query_in_log();
  return $result;
}

// GET COMPANY INFO BY ID PASS LIKE //->> $company_info = company_info('003');
function company_info($id)
{
  $ci=& get_instance();
  $ci->load->database();

  $ci->db->select('*');
  $ci->db->where('COMPANYCODE',$id);
  $ci->db->from('COMPANY');
  $result = $ci->db->get()->row();

  $image = $result->COMPANY_LOGO;
  if ($image!='') {
    $image_url =  base_url().'assets/images/company_logo/'.$image; 
    $image_div = '<img src="'.$image_url.'" id="company_image_info" width="100" height="100" style="float:left;padding-top: 0px;">';
  }else{
    $image_url =  base_url().'assets/images/aks_logo.png'; 
    $image_div = '<img src="'.$image_url.'" id="company_image_info" width="100" height="100" style="float:left;padding-top: 0px;">';
  }
  $data  = (object)[
                    'COMPANYCODE'   => $result->COMPANYCODE,
                    'COMPANYNAME'   => $result->COMPANYNAME,
                    'ADDRESS1'      => $result->ADDRESS1,
                    'ADDRESS2'      => $result->ADDRESS2,
                    'CITY'          => $result->CITY,
                    'PINCODE'       => $result->PINCODE,
                    'STATE'         => $result->STATE,
                    'PHONE'         => $result->PHONE,
                    'EMAIL'         => $result->EMAIL,
                    'PAN_NO'        => $result->PAN_NO,
                    'GST_NO'        => $result->GST_NO,
                    'REGNO'         => $result->REGNO,
                    'COMPANYNAME2'  => $result->COMPANYNAME2,
                    'ADDRESSLINE'   => $result->ADDRESSLINE,
                    'LOGINCODE'     => $result->LOGINCODE,
                    'BUSINESS_TYPE' => $result->BUSINESS_TYPE,
                    'ACTIVE'        => $result->ACTIVE,
                    'COMPANY_LOGO'  => $image_div,
                    'COMPANY_TYPE'  => $result->COMPANY_TYPE
                  ];

  save_query_in_log();
  return $data;
}


function company_by_id($id)
{
  $ci=& get_instance();
  $ci->load->database();

  $ci->db->select('*');
  $ci->db->where('COMPANYCODE',$id);
  $ci->db->from('company');
  $result = $ci->db->get()->row();
  save_query_in_log();

  // print_r( $result    );
  return $result->COMPANYNAME;
}

//Gowtham19-02-2024
function item_type($id)
{
  
  if(intval($id) > 0){
  
    $cit= & get_instance();
    $cit->load->database();
  
    $cit->db->select('*');
    $cit->db->where('jewel_type_id',$id);
    $cit->db->from('jewel_type');
    $result_type = $cit->db->get()->row();

    return $result_type?$result_type->jewel_type:$id;
   

  }else{
    return $id;
  }
 
  
  save_query_in_log();
}

function item_name($id)
{
  
  if(intval($id) > 0){

    
    $cin=& get_instance();
    $cin->load->database();
  
    $cin->db->select('*');
    $cin->db->where('SNO',$id);
    $cin->db->from('ITEMS');
    $result_item = $cin->db->get()->row();

    return $result_item?$result_item->ITEMNAME:$id;
   
  

  }else{
    return $id;
  }
 
  
  save_query_in_log();
}
function sub_item_name($id)
{

  if(intval($id) > 0){

    
    $cib=& get_instance();
    $cib->load->database();
  
    $cib->db->select('*');
    $cib->db->where('item_id',$id);
    $cib->db->from('SUBITEM_LIST');
    $result_sub_item = $cib->db->get()->row();

    return $result_sub_item?$result_sub_item->SUBITEM_NAME:$id;
   
  
  }else{
    return $id;
  }
 
 
  save_query_in_log();
}
//19-02-2024




function switch_db_dynamic($name_db)
{
    // $config_app['active_group'] = 'other_db';  \sqlexpress2016
    $config_app['hostname'] = 'localhost\SQL2022';
    $config_app['username'] = '';
    $config_app['password'] = '';
    $config_app['database'] = $name_db;
    $config_app['dbdriver'] = 'sqlsrv';
    $config_app['dbprefix'] = '';
    $config_app['pconnect'] = FALSE;
    // $config_app['db_debug'] = TRUE;
    return $config_app;
}

function login_user_details($id)
{
  $ci=& get_instance();
  $ci->load->database();

  $ci->db->select('*');
  $ci->db->where('EMPCODE',$id);
  $ci->db->from('t_emp_mstr');
  $result = $ci->db->get()->row();
  save_query_in_log();
  return $result;
}
// To encrypt the  password
/*function aes128Encrypt($key, $data) 
{
  if(16 !== strlen($key)) $key = hash('MD5', $key, true);
  $padding = 16 - (strlen($data) % 16);
  $data .= str_repeat(chr($padding), $padding);
  return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16)));
}*/
/*function encryptthis($data, $key) {
$encryption_key = base64_decode($key);
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
$encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
return base64_encode($encrypted . '::' . $iv);
}*/
/*function encryptthis($data, $key) {
  $secret_iv = 'secretivcode';
  $iv = substr(hash('sha256', $secret_iv), 0, 16);
  $encryption_key = base64_decode($key);
  $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
  return base64_encode($encrypted);
}*/
// To decrypt the password
/*function aes128Decrypt($key, $data){

    $data = base64_decode($data);
    if(16 !== strlen($key)) $key = hash('MD5', $key, true);
    $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, str_repeat("\0", 16));
    $padding = ord($data[strlen($data) - 1]); 
    return substr($data, 0, -$padding); 
  }*/   
  /*function decryptthis($data, $key) {
$encryption_key = base64_decode($key);
list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}*/
/*function decryptthis($data, $key) {
  $secret_iv = 'secretivcode';
  $iv = substr(hash('sha256', $secret_iv), 0, 16);
  $encryption_key = base64_decode($key);
  return openssl_decrypt(base64_decode($data), 'aes-256-cbc', $encryption_key, 0, $iv);
}*/

function encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
    $secret_iv = '5fgf5HJ5g27'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}


function reqmailfn($subject,$message,$to_id)
{
  $ci=& get_instance();
  $ci->load->database();

  $ci->db->select('*');
  $ci->db->from('email_settings');
  $result = $ci->db->get()->row();
  $smtpcode=decryptthis($result->password,'iron_mountain');
  //require_once "/opt/bitnami/apache2/htdocs/application/third_party/PHPMailer/PHPMailerAutoload.php";
  include_once(APPPATH."third_party/PHPMailer/PHPMailerAutoload.php");
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 465;//587
  $mail->SMTPSecure = 'ssl';
  $mail->SMTPAuth = true;
  /*$mail->Username = 'hiperlytics@gmail.com';
  $mail->Password = 'Assessment@123';
  $mail->setFrom('hiperlytics@gmail.com', 'Hi-Perlytics');*/
  $mail->Username = $result->email_id;
  $mail->Password = $smtpcode;
  $mail->setFrom($result->email_id, $result->email_user_name);
  $mail->addAddress($to_id);
  $mail->Subject = $subject;
  $mail->msgHTML($message);
  if (!$mail->send()) {
  $error = "Mailer Error: " . $mail->ErrorInfo;
  //echo '<p id="para">'.$error.'</p>';
  }
  else {
  echo '<p id="para">Message sent!</p>';
  }

}

 // To show date format
  function show_date($date)
  {
    return date('d-m-Y', strtotime($date));
  }

  function explode_date($date)
  {
    $exploded_date = explode('/', $date);
    $date = $exploded_date[2].'-'.$exploded_date[0].'-'.$exploded_date[1];
    return $date;
  }


// To check date is in two different dates
 function check_date_between_two_dates($ac_start_date, $ac_end_date, $t_date)
 {

    $ac_start_date = date('Y-m-d', strtotime($ac_start_date));
    $ac_end_date   = date('Y-m-d', strtotime($ac_end_date));
    $t_date   = date('Y-m-d', strtotime($t_date));

    if (($t_date >= $ac_start_date) && ($t_date < $ac_end_date))
    {
      return 1;
    }else{
        return 0;  
    }

 }

 function convertNumberToWords($number){
    //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
    $words = array(
    '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
    '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
    '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
    '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
    '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
    '80' => 'eighty','90' => 'ninty');
    
    //First find the length of the number
    $number_length = strlen($number);
    //Initialize an empty array
    $number_array = array(0,0,0,0,0,0,0,0,0);        
    $received_number_array = array();
    
    //Store all received numbers into an array
    for($i=0;$i<$number_length;$i++){    
      $received_number_array[$i] = substr($number,$i,1);    
    }

    //Populate the empty array with the numbers received - most critical operation
    for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ 
        $number_array[$i] = $received_number_array[$j]; 
    }

    $number_to_words_string = "";
    //Finding out whether it is teen ? and then multiply by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
    for($i=0,$j=1;$i<9;$i++,$j++){
        //"01,23,45,6,78"
        //"00,10,06,7,42"
        //"00,01,90,0,00"
        if($i==0 || $i==2 || $i==4 || $i==7){
            if($number_array[$j]==0 || $number_array[$i] == "1"){
                $number_array[$j] = intval($number_array[$i])*10+$number_array[$j];
                $number_array[$i] = 0;
            }
               
        }
    }

    $value = "";
    for($i=0;$i<9;$i++){
        if($i==0 || $i==2 || $i==4 || $i==7){    
            $value = $number_array[$i]*10; 
        }
        else{ 
            $value = $number_array[$i];    
        }            
        if($value!=0)         {    $number_to_words_string.= $words["$value"]." "; }
        if($i==1 && $value!=0){    $number_to_words_string.= "Crores "; }
        if($i==3 && $value!=0){    $number_to_words_string.= "Lakhs ";    }
        if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
        if($i==6 && $value!=0){    $number_to_words_string.= "Hundred &amp; "; }            

    }
    if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
    return ucwords(strtolower("Rupees ".$number_to_words_string)." Only.");
}
function IND_money_format($number){
  $decimal = (string)($number - floor($number));
  $money = floor($number);
  $length = strlen($money);
  $delimiter = '';
  $money = strrev($money);

  for($i=0;$i<$length;$i++){
      if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
          $delimiter .=',';
      }
      $delimiter .=$money[$i];
  }

  $result = strrev($delimiter);
  $decimal = preg_replace("/0\./i", ".", $decimal);
  $decimal = substr($decimal, 0, 3);

  if( $decimal != '0'){
      $result = $result.$decimal;
  }

  return $result;
}

//  function barcode( $filepath, $text, $size, $orientation, $code_type, $print, $SizeFactor )
// {
//   $code_string = "";
//   // Translate the $text into barcode the correct $code_type
//   if ( in_array(strtolower($code_type), array("code128", "code128b")) ) 
//   {
//     $chksum = 104;
//     // Must not change order of array elements as the checksum depends on the array's key to validate final code
//     $code_array = array(" "=>"212222","!"=>"222122","\""=>"222221","#"=>"121223","$"=>"121322","%"=>"131222","&"=>"122213","'"=>"122312","("=>"132212",")"=>"221213","*"=>"221312","+"=>"231212",","=>"112232","-"=>"122132","."=>"122231","/"=>"113222","0"=>"123122","1"=>"123221","2"=>"223211","3"=>"221132","4"=>"221231","5"=>"213212","6"=>"223112","7"=>"312131","8"=>"311222","9"=>"321122",":"=>"321221",";"=>"312212","<"=>"322112","="=>"322211",">"=>"212123","?"=>"212321","@"=>"232121","A"=>"111323","B"=>"131123","C"=>"131321","D"=>"112313","E"=>"132113","F"=>"132311","G"=>"211313","H"=>"231113","I"=>"231311","J"=>"112133","K"=>"112331","L"=>"132131","M"=>"113123","N"=>"113321","O"=>"133121","P"=>"313121","Q"=>"211331","R"=>"231131","S"=>"213113","T"=>"213311","U"=>"213131","V"=>"311123","W"=>"311321","X"=>"331121","Y"=>"312113","Z"=>"312311","["=>"332111","\\"=>"314111","]"=>"221411","^"=>"431111","_"=>"111224","\`"=>"111422","a"=>"121124","b"=>"121421","c"=>"141122","d"=>"141221","e"=>"112214","f"=>"112412","g"=>"122114","h"=>"122411","i"=>"142112","j"=>"142211","k"=>"241211","l"=>"221114","m"=>"413111","n"=>"241112","o"=>"134111","p"=>"111242","q"=>"121142","r"=>"121241","s"=>"114212","t"=>"124112","u"=>"124211","v"=>"411212","w"=>"421112","x"=>"421211","y"=>"212141","z"=>"214121","{"=>"412121","|"=>"111143","}"=>"111341","~"=>"131141","DEL"=>"114113","FNC 3"=>"114311","FNC 2"=>"411113","SHIFT"=>"411311","CODE C"=>"113141","FNC 4"=>"114131","CODE A"=>"311141","FNC 1"=>"411131","Start A"=>"211412","Start B"=>"211214","Start C"=>"211232","Stop"=>"2331112");
//     $code_keys = array_keys($code_array);
//     $code_values = array_flip($code_keys);
//     for ( $X = 1; $X <= strlen($text); $X++ ) {
//       $activeKey = substr( $text, ($X-1), 1);
//       $code_string .= $code_array[$activeKey];
//       $chksum=($chksum + ($code_values[$activeKey] * $X));
//     }
//     $code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

//     $code_string = "211214" . $code_string . "2331112";
//   } 
  
//   // Pad the edges of the barcode
//   $code_length = 20;
//   if ($print) {
//     $text_height = 30;
//   } else {
//     $text_height = 0;
//   }
  
//   for ( $i=1; $i <= strlen($code_string); $i++ ){
//     $code_length = $code_length + (integer)(substr($code_string,($i-1),1));
//         }

//   if ( strtolower($orientation) == "horizontal" ) {
//     $img_width = $code_length*$SizeFactor;
//     $img_height = $size;
//   } else {
//     $img_width = $size;
//     $img_height = $code_length*$SizeFactor;
//   }

//   $image = imagecreate($img_width, $img_height + $text_height);
//   $black = imagecolorallocate ($image, 0, 0, 0);
//   $white = imagecolorallocate ($image, 255, 255, 255);

//   imagefill( $image, 0, 0, $white );
//   if ( $print ) {
//     imagestring($image, 5, 31, $img_height, $text, $black );
//   }

//   $location = 10;
//   for ( $position = 1 ; $position <= strlen($code_string); $position++ ) {
//     $cur_size = $location + ( substr($code_string, ($position-1), 1) );
//     if ( strtolower($orientation) == "horizontal" )
//       imagefilledrectangle( $image, $location*$SizeFactor, 0, $cur_size*$SizeFactor, $img_height, ($position % 2 == 0 ? $white : $black) );
//     else
//       imagefilledrectangle( $image, 0, $location*$SizeFactor, $img_width, $cur_size*$SizeFactor, ($position % 2 == 0 ? $white : $black) );
//     $location = $cur_size;
//   }
  
//   // Draw barcode to the screen or save in a file
//   if ( $filepath=="" ) {
//     header ('Content-type: image/png');
//     return imagepng($image);
//     // imagedestroy($image);
//   } else {
//     imagepng($image,$filepath);
//     imagedestroy($image);   
//   }
//   // print_r($image);
//   // exit();
//   // return $image;
// }

  function set_customer_rating($rating,$pid,$process,$billno)
  {
   
    $ci=& get_instance();
    $ci->load->database();
    $ci->db->set('RATING', $rating, FALSE);
    $ci->db->where('PID', $pid);
    $ci->db->update('PARTIES');
    // $res=$this->db->query("UPDATE PARTIES SET RATING=".$rating. " WHERE PID='".$pid."'");
    save_query_in_log();
    $array = array(
        'PID' => $pid,
        'LOG_DATE' => date('Y-m-d'),
        'PROCESS' => $process,
        'RATING' => $rating,
        'BILLNO' => $billno,
        'CREATED_BY' => $_SESSION['username'],
        'CREATED_ON' => date('Y-m-d H:i:s')
      );

$ci->db->set($array);
$ci->db->insert('CUSTOMER_RATING_HISTORY');
    // $rating_history=$this->db->query("INSERT INTO CUSTOMER_RATING_HISTORY (PID, LOG_DATE, PROCESS, RATING, BILLNO, CREATED_BY, CREATED_ON) VALUES('".$pid."','".date('Y-m-d')."','".$process."','".$rating."','".$billno."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
    save_query_in_log();
    return TRUE;

  }

  function add_member_points($m_points_ad,$pid)
  {

    $ci=& get_instance();
  $ci->load->database();

   $ci->db->set('MEMBERSHIP_POINTS', 'MEMBERSHIP_POINTS+'.$m_points_ad, FALSE);
 $ci->db->where('PID', $pid);
 $ci->db->update('PARTIES');
   save_query_in_log();
   $ci->db->set('POINTS', 'POINTS+'.$m_points_ad, FALSE);
 $ci->db->where('PID', $pid);
 $ci->db->update('MEMBERSHIP_CARD');
      // $cust_add_m_point_party=$ci->db->query("UPDATE PARTIES SET MEMBERSHIP_POINTS=MEMBERSHIP_POINTS+".$m_points_ad." WHERE PID='".$pid."'");
      // save_query_in_log();
      // $card_add_m_point=$ci->db->query("UPDATE MEMBERSHIP_CARD SET POINTS=POINTS+".$m_points_ad." WHERE PID='".$pid."'");
      save_query_in_log();
  }

  function add_member_card_history($mem_no,$pid,$process,$m_points_ad)
  {
    // save_query_in_log();
      $array = array(
        'MEMBERSHIP_NO' => $mem_no,
        'PID' => $pid,
        'LOG_DATE' => date('Y-m-d'),
        'PROCESS' => $process,
        'POINTS_EARNED' => $m_points_ad,
        'CREATED_BY' => $_SESSION['username'],
        'CREATED_ON' => date('Y-m-d H:i:s')
      );
      $ci=& get_instance();
      $ci->load->database();

      $ci->db->set($array);
      $ci->db->insert('MEMBERSHIP_HISTORY');
       // $card_history=$ci->db->query("INSERT INTO MEMBERSHIP_HISTORY (MEMBERSHIP_NO, PID, LOG_DATE, PROCESS, POINTS_EARNED, CREATED_BY, CREATED_ON) VALUES('".$mem_no."','".$pid."','".date('Y-m-d')."','".$process."','".$m_points_ad."','".$_SESSION['username']."','".date('Y-m-d H:i:s')."')");
       save_query_in_log();
  }
  // vasanth  status
function add_notification($ndate, $ccode, $process, $header, $message, $otp, $rec_uid, $rec_vr_status, $billno)
{
    // save_query_in_log();
    // $array = array(
    //     'notification_date' => $ndate,
    //     'company_code' => $ccode,
    //     'process' => $process,
    //     'message' => 'N' . $message, // Removed utf8_encode() as it may not be necessary
    //     'otp_for_user' => $otp,
    //     'receiver_user_id' => $rec_uid,
    //     'receiver_view_read_status' => $rec_vr_status,
    //     'bill_no' => $billno,
    //     'header' => $header,
    //     'created_by' => $_SESSION['username'],
    //     'created_on' => date('Y-m-d H:i:s'),
    //     'status' => 1
    // );

    $ci = &get_instance();
    $ci->load->database();

     $notification = $ci->db->query("
                                     INSERT INTO notification
                                      (
                                          notification_date,
                                          company_code,
                                          process,
                                          message,
                                          receiver_user_id,
                                          receiver_view_read_status,
                                          bill_no,
                                          header,
                                          created_by,
                                          created_on,
                                          status,
                                          otp_for_user
                                      )
                                      VALUES
                                      (
                                          '".$ndate."',
                                          '".$ccode."',
                                          '".$process."',
                                          N'".$message."',
                                          '".$rec_uid."',
                                          '".$rec_vr_status."',
                                          '".$billno."',
                                          '".$header."',
                                          '".$_SESSION['username']."',
                                          '".date('Y-m-d H:i:s')."',
                                          '1',
                                          '".$otp."'
                                      )");

      // exit();
    // $ci->db->set($array);
    // $ci->db->insert('notification');
     // echo $notification;
    save_query_in_log();
}


function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

function announcementview()
{
  $ci = & get_instance();
    $ci->load->database();
    $announcementshow  = $ci->db->query("SELECT * FROM announcement WHERE  CONVERT(DATE, startdate) = CONVERT(DATE, GETDATE()) AND status='1' ORDER BY startdate ASC ")->result_array();
    // $announcementshow  = $ci->db->query("SELECT * FROM announcement WHERE  CONVERT(DATE, startdate) = CONVERT(DATE, GETDATE()) AND status='1' ORDER BY startdate ASC ")->result_array();
        $prevdate='';
        $result_data=[];
        // if (isset($announcementshow)) {
            foreach ($announcementshow as $key => $list) {
                $result_data['announcementviews'][] = $list['announcement']; 
                $result_data['startdate'][]     = $list['startdate']; 
                $result_data['enddate']  []     = $list['enddate']; 

                if ($key>0) {

                        $userlist =  json_decode($list['userid']);
                        if (in_array($_SESSION['USERID'], $userlist))
                        {
                           // $yes = 1; 
                           $result_data['isuser'][]  = 1;
                           $currentDateTime = date('Y-m-d H:i:s');
                           $startdate = $list['startdate'];
                          

                            if ($currentDateTime >= $prevdate) {

                                // $isrun = 1;  
                                $result_data['isrun'][]  = 1;                                 
                            } 
                            else 
                            {
                                // $isrun = 0;


                                $result_data['isrun'][]  = 0;

                            }

                            // $prevdate = $startdate;   
                             $prevdate  = $list['startdate'];
                        }else{

                            // $isrun = 0;
                            $result_data['isrun'][]   = 0;
                            $result_data['isuser'][]  = 0;
                        }

                }else{                 
                   
                   $userlist =  json_decode($list['userid']);

                    if (in_array($_SESSION['USERID'], $userlist))
                    {
                     
                        
                       $result_data['isuser'][]  = 1; 
                       $currentDateTime = date('Y-m-d H:i:s');
                       $startdate = $list['enddate'];
                      

                        if ($currentDateTime >= $startdate) {
                            
                            $result_data['isrun'][]  = 0;

                        } 
                        else 
                        {
                           
                          $result_data['isrun'][]  = 1;

                        }

                        $prevdate  = $list['enddate'];

                    }
                    else
                    {
                      
                    
                      $result_data['isuser'][]  = 0;   
                    }                        

                }


                          
               
                }

       $announcement_list =$result_data;


       if (isset($announcement_list)) {
        foreach ($announcement_list['announcementviews'] as $key => $list) {
           // print_r($list);
          if (isset($announcement_list['isrun'][$key])) {
            if ($announcement_list['isrun'][$key] == 1) {
              return $marquee = isset($announcement_list['announcementviews'][$key]) ? $announcement_list['announcementviews'][$key] : ''; 
            }
          }
        }
    }
   // $ci->db->close();
}

/****************************************Real-estate Function By Vasanth*********************************/

         // acre
          function acreToSquareFeet($acres) {
              $squareFeet = $acres * 43560; // 1 acre = 43560 square feet
              return $squareFeet;
          }
          function acreToCents($acres) {
              $cents = $acres * 100; // 1 acre = 100 cents
              return $cents;
          }
          // cent
          function centsToAcres($cents) {
              $acres = $cents / 100; // 1 acre = 100 cents
              return $acres;
          }
          function centsToSquareFeet($cents) {
              $squareFeet = $cents * 435.6; // 1 cent = 435.6 square feet
              return $squareFeet;
          }
          // squareFeet
          function squareFeetToAcres($squareFeet) {
              $acres = $squareFeet / 43560; // 1 acre = 43560 square feet
              return $acres;
          }
          function squareFeetToCents($squareFeet) {
              $cents = $squareFeet / 435.6; // 1 cent = 435.6 square feet
              return $cents;
          }

          // vasanth end

function amt_to_words($amt){
 $number = $amt;
     $no = floor($number);
     $point = round($number - $no, 2) * 100;
     $hundred = null;
     $digits_1 = strlen($no);
     $i = 0;
     $str = array();
     $words = array('0' => '', '1' => 'One', '2' => 'Two',
      '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
      '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
      '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
      '13' => 'Thirteen', '14' => 'Fourteen',
      '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
      '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
      '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
      '60' => 'Sixty', '70' => 'Seventy',
      '80' => 'Eighty', '90' => 'Ninety');
     $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
     while ($i < $digits_1) {
       $divider = ($i == 2) ? 10 : 100;
       $number = floor($no % $divider);
       $no = floor($no / $divider);
       $i += ($divider == 10) ? 1 : 2;
       if ($number) {
          $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
          $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
          $str [] = ($number < 21) ? $words[$number] .
              " " . $digits[$counter] . $plural . " " . $hundred
              :
              $words[floor($number / 10) * 10]
              . " " . $words[$number % 10] . " "
              . $digits[$counter] . $plural . " " . $hundred;
       } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $points = ($point) ?
      "." . $words[$point / 10] . " " . 
            $words[$point = $point % 10] : '';
        if($points!=''){
    echo $result . "Rupees  " . $points . " Paise Only.";
        }
        else{
        echo $result . "Rupees  Only." ;
        }

        

  }
?>