<?php
require_once("db_con.php");

$json = file_get_contents('php://input');

// Converts it into a PHP object
$data1 = json_decode($json);

$access_token = $data1->access_token;
$username = $data1->username;
$password = $data1->password;
$company_id = $data1->company_id;
$passwordHash = encrypt_decrypt($password, 'encrypt');

if($password == '' && $username == '' && $company_id == '')
{
   		$data['Login'][0]['message']='Fill All Details';
	   	$data['Login'][0]['status']=0;
}
else if($username == '')
{
	$data['Login'][0]['message']='* Enter User Name';
   	$data['Login'][0]['status']=0;
}
else if($password == '')
{
	$data['Login'][0]['message']='* Enter Password';
   	$data['Login'][0]['status']=0;
}
else if($company_id == '')
{
  $data['Login'][0]['message']='* Choose Company';
    $data['Login'][0]['status']=0;
}
else
{

	$sql_query = "Select * FROM employee where username='".$username."' and password = '".$passwordHash."' AND company_id = '".$company_id."'";
  //echo $sql_query;exit;
		$signup = mysqli_query($mysqli, $sql_query);
    //echo mysqli_num_rows($signup); exit;
		if (mysqli_num_rows($signup) > 0) {
      $member_det=mysqli_fetch_assoc($signup);

 			$data['Login'][0]['message']='Login Successfully!!!';
      $data['Login'][0]['employee_id']=$member_det['employee_id'];
   		$data['Login'][0]['status']=1;

      $sql = "update employee set access_token = '".$access_token."' where employee_id='".$member_det['employee_id']."' ";
      $query = mysqli_query($mysqli,$sql);
 		}
 		else{
 			$data['Login'][0]['message']='Login Failure, Invalid Username / Password / Company';
   		$data['Login'][0]['status']=0;
 		}
   }
header('Content-type: text/javascript');
echo json_encode($data, JSON_PRETTY_PRINT);


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

?>