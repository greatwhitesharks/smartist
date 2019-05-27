<?php
Class Mcrypt{
public static function encrypt($string,$key){
$mcrypt = mcrypt_module_open('rijndael-256', '', 'cbc', '');//Opens the module
$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($mcrypt), MCRYPT_DEV_RANDOM);//Define initialization vector
mcrypt_generic_init($mcrypt, $key, $iv);//Open buffers
$encryptedData = mcrypt_generic($mcrypt, $string);//Encrypt string
print_r($encryptedData);//Print encrypted value
mcrypt_generic_deinit($mcrypt);//Close buffers
mcrypt_module_close($mcrypt);//Close MCrypt module
}
public static function decrypt($stringEncoded,$key){
$mcrypt = mcrypt_module_open('rijndael-256', '', 'cbc', '');//Opens the module
mcrypt_generic_init($mcrypt, $key, $iv);//Open buffers
$decryptedData = mdecrypt_generic($mcrypt, $encryptedData);
echo PHP_EOL."Decrypted value: ".$decryptedData;
mcrypt_generic_deinit($mcrypt);//Close buffers
mcrypt_module_close($mcrypt);//Close MCrypt module
}
}
?>