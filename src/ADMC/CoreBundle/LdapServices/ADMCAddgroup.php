<?php



namespace ADMC\CoreBundle\LdapServices;
use \ADMC\CoreBundle\LdapServices\ADMCConnector;


class ADMCAddgroup{
    
    private $connector;
    
    public function __construct(ADMCConnector $connector) {
        $this->connector = $connector;
    }
    
    
    public function addGroup($group, $user){
        
        
        
        $this->connector->connector();
        $ds = $this->connector->getConnector();
        $racine =  "dc=admc, dc=com";
        $rechercheGroupe = ldap_search($ds, $racine, "(&(objectclass=group)(name=".$group."))");
        $resultatGroupe = ldap_get_entries($ds, $rechercheGroupe);
        //var_dump($resultatGroupe);
        $groupe = $resultatGroupe[0];
        //var_dump($groupe);
        $dn_group = $groupe['dn'];
        $recupMember = $groupe["member"];
        
            $groupe = array();
            $groupe['member']="cn=".$user.",cn=Users,dc=admc,dc=com";
  
        return  ldap_mod_add($this->connector->getConnector(), $dn_group, $groupe) or die ();


       

    }
    
    public function addGroupTest(){
        echo "<br>>>>>>>>>>>> ajout groupe >>>>>>>><br>";
        $dn = "CN=bourique,CN=Employe;dc=admc,dc=com";
        $dn_groupReturned = "CN=Logiciel,CN=Users,DC=admc,DC=com";
        $ds = $this->connector->getConnector();
        $racine =  "dc=admc, dc=com";
        $rechercheGroupe = ldap_search($ds, $racine, "(&(objectclass=group)(name=testgroup))");
        $resultatGroupe = ldap_get_entries($ds, $rechercheGroupe);
        //var_dump($resultatGroupe);
        $groupe = $resultatGroupe[0];
        var_dump($groupe);
        $dn_group = $groupe['dn'];
        $recupMember = $groupe["member"];
        foreach($recupMember as $key => $member){
            echo "<br> dn_group: ".$key." ".$member."<br>";
        }
            $groupe = array();
            $groupe['member']="cn=jmiller,cn=Users,dc=admc,dc=com";
  
       ldap_mod_add($this->connector->getConnector(), $dn_group, $groupe);


       
        echo "<br>>>>>>>>>>>>fin  ajout groupe >>>>>>>><br>";

    }
    
    
}