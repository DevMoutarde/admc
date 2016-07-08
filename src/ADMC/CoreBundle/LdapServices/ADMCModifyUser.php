<?php



namespace ADMC\CoreBundle\LdapServices;
use \ADMC\CoreBundle\LdapServices\ADMCConnector;
use ADMC\CoreBundle\Entity\User;


class ADMCModifyUser{    
    
    private $connector;
    
    

    public function __construct(ADMCConnector $connector){
        $this->connector = $connector;
    }
    
     
        
    

    public function modifyUser($user){
        
        //var_dump($user);
        //echo $user->getFirstName();
        $this->connector->connector();
        $dn = "CN=".$user->getLastName().",CN=Users;dc=admc,dc=com"; 
        $adduserAD["cn"][0] = $user->getLastName(); 
        $adduserAD["samaccountname"][0] =  $user->getLastName(); 
        $adduserAD["objectclass"][0] = "top"; 
        $adduserAD["objectclass"][1] = "person"; 
        $adduserAD["objectclass"][2] = "organizationalPerson"; 
        $adduserAD["objectclass"][3] = "user"; 
        $adduserAD["displayname"][0] = $user->getFirstName()." ".$user->getLastName() ; 
        $adduserAD["name"][0] = $user->getLastName(); 
        $adduserAD["givenname"][0] = $user->getFirstName(); 
        $adduserAD["sn"][0] = $user->getLastName(); 
        $adduserAD["company"][0] ="lbnl"; 
        $adduserAD["description"][0] = "Employé de lbnl"; 
        $adduserAD["mail"][0] = $user->getEmail(); 
        $adduserAD["streetAddress"][0] = $user->getAddress();
        $adduserAD["postalCode"][0] = $user->getPostalCode();
        $adduserAD["l"][0] = $user->getTown();
        $adduserAD["samaccountname"][0] = $user->getUsername(); 
        $adduserAD["userprincipalname"][0] =$user->getEmail(); 
      //  $adduserAD["profilepath"][0] = "\\WIN-O0SRPP64UEJ\Common\Profils\\".$user->getUsername();
        //$adduserAD['userPassword'] = '{MD5}' . base64_encode(pack('H*',md5("Donjon2016")));
           // add data to directory 
        
        $data["description"] = array(0=> "employe de lbnl");
         return ldap_modify($this->connector->getConnector(), $dn, $data); 
          
         
        
    }
    
}