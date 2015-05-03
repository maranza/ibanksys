<?php
function decrypt($data){
  //encrypt using SHA256 algorithm
	
   return(crypt($data,CRYPT_SHA256));

}

