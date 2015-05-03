<?php
//administrator model

class Admin {
	
	public static $accnumber="";
	//view summary of customers account 
		public static function viewAccounts(){
			$sql="SELECT account.accnumber,account.balance,SUM(transactions.payments) as Payments,";
			$sql.="SUM(transactions.deposits) as Deposits FROM "; 
			$sql.="account LEFT JOIN transactions ON account.accnumber=transactions.accnumber GROUP BY ";
			$sql.="account.accnumber ORDER BY account.balance asc";
			return(getData($sql,null));	
		
		}
	
	
	
	//deregisters customers for internet banking
	
	public static function deleteinet($idnumber){
						
		return runquery("DELETE FROM customer where idnumber=:id",array("id"=>$idnumber));
		
	}
//this function registers new cucstomers to the bank

	public static function register_customer($data=array()){
	
		return(runquery("INSERT INTO customer values(:name,:last,:dob,:id,:pass,:add,:mob,:email)",$data));
	
		
	}	
	public static function register_acc($id,$type){
				
		$ac_code=generate_code($id);
		while(checkacc($ac_code))
			$ac_code=generate_code($id);	
			self::$accnumber=$ac_code;	
	        $sql="INSERT INTO account(accnumber,balance,accountype,idnumber) ";
	        $sql.="values(:acc,:bal,:type,:id)";				
		return(runquery($sql,array("acc"=>$ac_code,"bal"=>0,"type"=>$type,"id"=>$id)));
		
		
	}
	public static function block_user($user,$duration){
			//convert to timestamp
	      $sql="UPDATE login set access=1,stamp=:stamp where username=:user";
	      $dur=(int)strtotime('+'.$duration);
	      if(runquery($sql,array("user"=>$user,"stamp"=>$dur)))
	            return true; 
	      else 
		    return false;
			
	}	
	
	
	
}
