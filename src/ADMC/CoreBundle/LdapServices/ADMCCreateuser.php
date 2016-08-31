<?php

namespace ADMC\CoreBundle\LdapServices;
use \ADMC\CoreBundle\LdapServices\ADMCConnector;
use ADMC\CoreBundle\Entity\User;


/**
 * Classe ADMCCreateuser
 * Permet la création d'un utilisateur
 */
class ADMCCreateuser{
    
    private $connector;
    
    /**
     * 
     * @param ADMCConnector $connector
     */
    public function __construct(ADMCConnector $connector){
        $this->connector = $connector;
    }
    
    
    /**
     * Créé un utilisateur dans l'annuaire AD
     * @param User $user
     */
    public function createUserByObject($user){
        
        //dump($user);
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
              //echo "Ajout utilisateur!";
              $this->activateUser($adduserAD["samaccountname"][0]);
              return True;
              
              
              
          } 
          else{
              //echo "Echec de l'opération";
              return False;
          } 
        
    }
    
    /**
     * Active l'utilisateur une fois enregistré dans l'annuaire
     * @param str $sameaccountname 
     */
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