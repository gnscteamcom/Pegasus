<?php
  function randomString($length, $type = '') {
  // Select which type of characters you want in your random string
  switch($type) {
    case 'num':
      // Use only numbers
      $salt = '1234567890';
      break;
    case 'lower':
      // Use only lowercase letters
      $salt = 'abcdefghijklmnopqrstuvwxyz';
      break;
    case 'upper':
      // Use only uppercase letters
      $salt = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      break;
    default:
      // Use uppercase, lowercase, numbers, and symbols
      $salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      break;
  }
  $rand = '';
  $i = 0;
  while ($i < $length) { // Loop until you have met the length
    $num = rand() % strlen($salt);
    $tmp = substr($salt, $num, 1);
    $rand = $rand . $tmp;
    $i++;
  }
  return $rand; // Return the random string
}
?>
