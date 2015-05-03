<?php
function cal_time($elapsed=0){
   define("MIN",60);
   define("HOURS",3600);
   define("DAY",24*3600);
   define("WEEK",24*7*3600);
   define("MONTH",4*7*24*3600);
   define("YEAR",24*365*3600);
   $now=time()-$elapsed;
   if(($now<MIN) ||($elapsed==0))
         return "Few Seconds"; 
   else if($now<HOURS){
 	$cal=(int)($now/MIN);
    if($cal>1)
	$mess="Mins";
     else
	$mess="Min";
 } 


 else if($now<DAY){
     $cal=(int)($now/HOURS);
 if($cal>1)
     $mess="Hours";
    else
     $mess="Hour";

 }



 else if($now<WEEK){
    $cal=(int)($now/DAY);
    if($cal>1)
	 $mess="Days";
	else
	  $mess="Day";
	
	}
     else if($now<MONTH){
	$cal=(int)($now/WEEK);
	if($cal>1)
	   $mess="Weeks";
	  else
           $mess="Week";
    }
     else if($now<YEAR){
	$cal=(int)($now/MONTH);
	  if($cal>1)
		$mess="Months";
	 else
		$mess="Month";
 
   }
    else
	{
        $cal=(int)($now/YEAR);
        if($cal>1)
	   $mess="Years";
         else
	   $mess="Year";
 
      }
  

   return sprintf("%d %s",$cal,$mess);
}


function timemap($elapsed=0){
   define("MIN",60);
   define("HOURS",3600);
   define("DAY",24*3600);
   define("WEEK",24*7*3600);
   define("MONTH",4*7*24*3600);
   define("YEAR",24*365*3600);
   $now=time()-$elapsed;
   if(($now<MIN) ||($elapsed==0))
       return $now;
   else if($now<HOURS)
       $cal=(int)($now/MIN);
   else if($now<DAY)
       $cal=(int)($now/HOURS);
   else if($now<WEEK)
       $cal=(int)($now/DAY);
   else if($now<MONTH)
       $cal=(int)($now/WEEK);
   else if($now<YEAR)
       $cal=(int)($now/MONTH);	
	else
     $cal=(int)($now/YEAR);

    return $cal;

}





function acc_check($acc){

   return(preg_match("/^[a-z0-9]{4,20}$/",$acc));

}


function check($val){
  if(preg_match("/^[a-z0-9_]{4,25}$/",$val))
    return true;
  else
    return false;
}


function checkname($val){

   return(preg_match("/^[a-zA-Z]{4,25}$/",$val));

}

function check_pass($value){
   if(preg_match("/^[a-zA-Z+_.0-9]+$/",$value))
      return true;
  else
     return false;

}
function checkemail($email){

   if(filter_var($email,FILTER_VALIDATE_EMAIL))
      return true;
   else
      return false;
}
function sendpro($to,$data,$frm){

     if(mail($to,"Problem $frm",$data))
         return true;
      else
        return false;			 
		
}
?>
