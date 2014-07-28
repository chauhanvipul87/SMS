<?php
echo gethostname(); // may output e.g,: sandie
// Or, an option that also works before PHP 5.3
echo php_uname('n'); // may output e.g,: sandie

echo "<br/>";

$source ="test the system.";
echo "Source: $source"; 
$fp=fopen("to/privatekey","r"); 
$priv_key=fread($fp,8192); 
var_dump($priv_key);
fclose($fp); 
echo $priv_key;
$priv_key= openssl_pkey_get_private("to/privatekey");
var_dump($priv_key);



 



?> 


<?php
 
    function strtohex($x) 
    {
         $s='';
         foreach (str_split($x) as $c) $s.=sprintf("%02X",ord($c));
         return($s);
     } 
    
    $source = 'It works !';
    $iv = "1234567812345678";
    $pass = '1234567812345678';
    $method = 'aes-128-cbc';
 
    echo "\niv in hex to use: ".strtohex ($iv);
    echo "\nkey in hex to use: ".strtohex ($pass);
    echo "\n";
	
    file_put_contents ('./file.encrypted',openssl_encrypt ($source, $method, $pass, true, $iv));
	 
    $exec = "openssl enc -".$method." -d -in file.encrypted -nosalt -nopad -K ".strtohex($pass)." -iv ".strtohex($iv);
 
    echo 'executing: '.$exec."\n\n";
	echo "<br/>";
    echo exec ($exec);
     

 
	$cert = file_get_contents('./file.encrypted');
	var_dump($cert);
	var_dump(openssl_decrypt($cert, $method,$pass, true, $iv));
	file_put_contents ('./file.decrypted',openssl_decrypt($cert, $method,$pass, true, $iv));
 
	
	// Set a random salt
     $salt = openssl_random_pseudo_bytes(8);
 
     $salted = '';
     $dx = '';
     // Salt the key(32) and iv(16) = 48
     while (strlen($salted) < 48) {
       $dx = md5($dx.$pass.$salt, true);
       $salted .= $dx;
     }
 
    $key = substr($salted, 0, 32);
    $iv  = substr($salted, 32,16);
 
    $encrypted_data = openssl_encrypt($source, $method,$pass,true, $iv);
    echo base64_encode('Salted__' . $salt . $encrypted_data);
 
	
	
 
?>




