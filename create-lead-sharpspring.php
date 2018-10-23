<?php                                                                   
$method = 'createLeads';
$params = array(
  'objects' => array (
    array( 
      'firstName'   => 'Name', //firstName (sharpsring) => Name (Form)
      'lastName'    => 'LastName', //lastName (sharpsring) => LastName (Form)
      'emailAddress'  => 'email', //emailAddress (sharpsring) => email (Form)
      'phoneNumber' => 'Phone', //phoneNumber (sharpsring) => Phone (Form)
      'city' => 'City', //city (sharpsring) => Ciudad (Form)
      'campaignID' => '0000000' // id campaña sharpspring 
    )
  )
);

$requestID = session_id();   
$accountID = 'XXXX'; // Add your accountID
$secretKey = 'XXX'; // Add your secretkey 

$data = array(                                                                                
       'method' => $method,                                                                      
       'params' => $params,                                                                      
       'id' => $requestID,                                                                       
   );                                                                                            
                                                                                                 
   $queryString = http_build_query(array('accountID' => $accountID, 'secretKey' => $secretKey)); 
   $url = "http://api.sharpspring.com/pubapi/v1/?$queryString";                             
                                                                                                 
   $data = json_encode($data);                                                                   
   $ch = curl_init($url);                                                                        
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                              
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                  
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                               
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                   
       'Content-Type: application/json',                                                         
       'Content-Length: ' . strlen($data)                                                        
   ));                                                                                           
                                                                                                 
   $result = curl_exec($ch);                                                                     
   curl_close($ch);                                                                              
   echo $result; 

?>  