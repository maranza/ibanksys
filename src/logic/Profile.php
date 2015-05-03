<?php
//author kwesidev

//gets customer profile as object
class Profile {
    private $firstname;
    private $lastname;
    private $idnumber;
    private $dob;
    private $address;
    private $mobilenumber;
    private $email;
    private $accnumber;
    private $balance=0;
    private $acctype="";
    private $username="";
    private $password="";
    private $admin=0;
    private $block;
    public function __construct($idnumber=NULL,$acc=NULL){
	$sql="SELECT * from customer,account,login WHERE customer.idnumber=login.idnumber AND ";
	$sql.="customer.idnumber=account.idnumber  AND customer.idnumber=:idnumber OR account.accnumber=:acc";
	$rows=getData($sql,array("idnumber"=>$idnumber,"acc"=>$acc));

        if(count($rows)>=1){

		$this->firstname=$rows[0]['firstname'];
		$this->lastname=$rows[0]['lastname'];
		$this->idnumber=$rows[0]['idnumber'];
		$this->dob=$rows[0]['dob'];
		$this->address=$rows[0]['address'];
		$this->mobilenumber=$rows[0]['mobilenumber'];
		$this->email=$rows[0]['email'];
		$this->accnumber=$rows[0]['accnumber'];
		$this->balance=$rows[0]['balance'];
		$this->username=$rows[0]['username'];
		$this->password=$rows[0]['password'];
		$this->admin=(int)$rows[0]['level'];
		$this->block=(int)$rows[0]['access'];
	}	
	$query=NULL;
}
  public function getUsername(){
	return($this->username);
  }

  public function getPassword(){
	return($this->password);
  }

  public function getIdnumber(){	
	return($this->idnumber);
  }


  public function getFirstname(){
	return($this->firstname);
 }


  public function getLastname(){	
	return($this->lastname);
 }


  public function getAddress(){	
	return($this->address);
  }


  public function getMobilenumber(){
	return($this->mobilenumber);
  }

  public function getEmail(){
	return($this->email);
   }


  public function getDob(){
	
	return($this->dob);	
  }


  public function getAccNumber(){
	return($this->accnumber);
  }


  public function getBalance(){
				
	return($this->balance);
							
	
  }


   public function isAdmin(){
	if($this->admin==1)
		return true;
	else
		return false;
  }

  public function isBlock(){

	if($this->block==1)
		return true;
	else
		return false;
  }
}

