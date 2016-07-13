<?php



namespace ADMC\CoreBundle\LdapServices;
use \ADMC\CoreBundle\LdapServices\ADMCConnector;
use ADMC\CoreBundle\Entity\User;


class ADMCModifyUser{    
    
    private $connector;
    
    
    /**
     * 
     * @param ADMCConnector $connector
     */
    public function __construct(ADMCConnector $connector){
        $this->connector = $connector;
    }
    
     
        
    
    /**
     * @Modifie mail+description+adresse+cp+ville
     * @param User $user
     * @return Boolean
     * 
     */
    public function modifyUser($user){
        
        $this->connector->connector();
        $dn = "CN=".$user->getLastName().",CN=Users;dc=admc,dc=com"; 
        
        //changement de login ok
        //$data["samaccountname"] = array(0=>"acrausaz");
        //impossible de changer nom et prénom pour le moment
        //$data["name"] = array(0=>"cipolini");
        $data["mail"]= array(0=>$user->getEmail());
        $data["streetaddress"] = array(0=> $user->getAddress());
        $data["postalcode"] = array(0=> $user->getPostalCode());
        $data["l"] = array(0=> $user->getPostalCode());
        var_dump($data);
         return ldap_modify($this->connector->getConnector(), $dn, $data); 
          
         
        
    }
    
   
    
}