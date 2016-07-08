<?php

namespace ADMC\CoreBundle\LdapServices;
use \ADMC\CoreBundle\LdapServices\ADMCConnector;
use ADMC\CoreBundle\Entity\User;

class ADMCCreateuser{
    
    private $connector;
    
    public function __construct(ADMCConnector $connector){
        $this->connector = $connector;
    }
    
    public function createUser(){
        
        $this->connector->connector();
        $dn = "CN=mcfly,CN=Users;dc=admc,dc=com"; 
        $adduserAD["cn"][0] = "mcfly"; 
        $adduserAD["samaccountname"][0] =  "mcfly"; 
        $adduserAD["objectclass"][0] = "top"; 
        $adduserAD["objectclass"][1] = "person"; 
        $adduserAD["objectclass"][2] = "organizationalPerson"; 
        $adduserAD["objectclass"][3] = "user"; 
        $adduserAD["displayname"][0] = "marty mcfly"; 
        $adduserAD["name"][0] = "mcfly"; 
        $adduserAD["givenname"][0] = "Marty"; 
        $adduserAD["sn"][0] =  "mcfly"; 
        $adduserAD["company"][0] ="labinal"; 
        $adduserAD["description"][0] = "retour vers le futur"; 
        $adduserAD["mail"][0] = "mcfly@admc.com"; 
        $adduserAD["streetAddress"][0] = "adress";
        $adduserAD["postalCode"][0] = "31400";
        $adduserAD["l"][0] = "Toulouse";
        $adduserAD["userprincipalname"][0] ="mcfly@admc.com"; 
        //$adduserAD['userPassword'] = '{MD5}' . base64_encode(pack('H*',md5("Donjon2016")));
           // add data to directory 
         $result=ldap_add($this->connector->getConnector(), $dn, $adduserAD); 
          if ($result){
              echo "Ajout utilisateur!";
              $this->activateUser($adduserAD["samaccountname"][0]);
              
              
              
          } 
          else{
              echo "Echec de l'opération";
          } 
               
    }
    
    public function createUserByObject($user){
        
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
         $result=ldap_add($this->connector->getConnector(), $dn, $adduserAD); 
          if ($result){
              echo "Ajout utilisateur!";
              $this->activateUser($adduserAD["samaccountname"][0]);
              
              
              
          } 
          else{
              echo "Echec de l'opération";
          } 
        
    }
    
    
    public function activateUser($sameaccountname){
        
        $baseDn = "dc=admc, dc=com";
        
        $rechercheUser = ldap_search($this->connector->getConnector(), $baseDn, "(samaccountname=".$sameaccountname.")");
        $ent= ldap_get_entries($this->connector->getConnector(),$rechercheUser);
        $dnResult = $ent[0]["dn"];
        $userAccountControl = $ent[0]["useraccountcontrol"][0];
        echo "useraccountcontrol: ".$userAccountControl."<br>";
        $disable=($userAccountControl | 2);
        $enable=($userAccountControl & ~2);

          $userdata=array();
          if ($enable==1){
                  $new=$disable; 
          }else{
                  $new=$enable;
          }
          $userdata["useraccountcontrol"][0]=$new;
          ldap_modify($this->connector->getConnector(), $dnResult, $userdata);
    }
    
}