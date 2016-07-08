<?php

namespace ADMC\CoreBundle\LdapServices;
use ADMC\CoreBundle\LdapServices\ADMCConnector;


class ADMCListUserByGroup{
    
    private $connect;
    
    public function __construct(ADMCConnector $connector){
        $this->connect = $connector;
    }
    

    public function listUserByGroup($nameGroup){
        
        $this->connect->connector();
        $ad = $this->connect->getConnector();
        
        
         $ldap_dn = "cn=Users,dc=admc,dc=com";
        
        $filter = array('group' => $nameGroup);
        $justthese = array('ou');

        $result= ldap_search($ad, $ldap_dn, "(&(objectclass=group)(cn=".$nameGroup."))");
        $entries = ldap_get_entries($ad, $result);
        $listUser = False;
        $x = 0;
       
     
           
           for($x=0; $x< $entries[0]['member']['count']; $x++ ){
               $listUser[$x] = $this->getBetween($entries[0]['member'][$x], "=", ",");
           }
                
           
       
       
       return $listUser;
        
        
        
        
        
        
        
        
//        for ($x=0; $x<$entries['count']; $x++){
//            
//        if(!empty($entries[$x]['memberof'][0])){
//                   //var_dump($entries[$x]['memberof']);
//                   for($y=0; $y< $entries[$x]['memberof']['count']; $y++){
//
//
//                       $listUser[strtoupper(trim($entries[$x]['samaccountname'][0]))]['memberof'][$y] = $this->getBetween($entries[$x]['memberof'][$y], "=", ",");
//                   }
//
//               }
//        }
//        return $listUser;
        
        
    }
    
    
   public function getBetween($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}
        
    }
 