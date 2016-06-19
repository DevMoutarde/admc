<?php

namespace ADMC\CoreBundle\LdapServices;

class ADMCConnector{
    
    private $bind;
    private $connect;
    public function __construct(){
        $this->bind = "";
        $this->connect = "";
        
    }
    
    public function connector(){
        $server = "192.168.1.240";
        $ad = ldap_connect($server, 389) or die ("pas de connexion possibles");
        $this->connect= $ad;
        
        $baseDn = "CN=jmiller,CN=Users,DC=admc,DC=com";
         $user = 'Administrateur';
         $password='Donjon2016';
         $domain="admc.com";
         
         
         
         ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
         ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
         $r=ldap_bind($ad, "{$user}@{$domain}", $password) or die('Bind ad impossible.');
         
         if ($r){
             echo "connexion LDAP établie";
         }
         
//         $sr=ldap_search($ad,$baseDn, "sn=*"); 
//         echo "le resultat de la recherche est: ".$sr."<br>";
//         echo 'Le nombre d\'entrées retournées est ' . ldap_count_entries($ad,$sr) 
//         . '<br >';
         
         

 
//adduser
         
         
//         $object_name="Test Group";
//         $dn="CN=".$object_name.",OU=User,DC=admc,DC=com";
//         $members[] ="CN=gabin,OU=Employe,DC=admc,DC=com";
//        
//         $addgroup_ad['cn']="$object_name";
//         $addgroup_ad['objectClass'][0] = "top";
//         $addgroup_ad['objectClass'][1] ="group";
//         $addgroup_ad['groupType']="2";
//         $addgroup_ad['member']=$members;
//         $addgroup_ad["sAMAccountName"] =$object_name;
//         
//        ldap_add($r,$dn,$addgroup_ad) or die (ldap_error($ad));
         
//                $adduserAD["cn"][0] = "jmiller"; 
//                $adduserAD["samaccountname"][0] =  "jmiller"; 
//                $adduserAD["objectclass"][0] = "top"; 
//                $adduserAD["objectclass"][1] = "person"; 
//                $adduserAD["objectclass"][2] = "organizationalPerson"; 
//                $adduserAD["objectclass"][3] = "user"; 
//                $adduserAD["displayname"][0] = "jemp miller"; 
//                $adduserAD["name"][0] = "jemp"; 
//                $adduserAD["givenname"][0] = "miller"; 
//                $adduserAD["sn"][0] =  "Bisdorff"; 
//                $adduserAD["company"][0] ="vdl"; 
//                $adduserAD["description"][0] = "my description"; 
//                $adduserAD["mail"][0] = "jmil@ville.dom"; 
//                $adduserAD["samaccountname"][0] = "jbisdorff"; 
//                $adduserAD["userprincipalname"][0] ="jmil@admc.com"; 
//                // add data to directory 
//                $result=ldap_add($ad, $dn, $adduserAD); 
//                        if ($result) 
//                        echo "User added!"; 
//                else 
//                                         echo "There was a problem!";
         
         
// activate user     
         
//        $rechercheUser = ldap_search($ad, $baseDn, "(samaccountname=jbisdorff)");
//        $ent= ldap_get_entries($ad,$rechercheUser);
//        $dnResult = $ent[0]["dn"];
//        $userAccountControl = $ent[0]["useraccountcontrol"][0];
//        echo "useraccountcontrol: ".$userAccountControl."<br>";
//        $disable=($userAccountControl | 2);
//        $enable=($userAccountControl & ~2);
//        
//        $userdata=array();
//        if ($enable==1){
//            $new=$disable; 
//        }else{
//            $new=$enable;
//        }
//        $userdata["useraccountcontrol"][0]=$new;
//        ldap_modify($ad, $dnResult, $userdata);
//        
//         
         $this->bind = $r;
         
        return $ad;
        
        
    }
    
    public function getBind(){
        return $this->bind;
    }
    
    public function getConnector(){
        return $this->connect;
    }
    

}