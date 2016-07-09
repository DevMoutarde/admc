<?php



namespace ADMC\CoreBundle\LdapServices;
use \ADMC\CoreBundle\LdapServices\ADMCConnector;
use \ADMC\CoreBundle\LdapServices\ADMCIsInGroup;

class ADMCAddgroup{
    
    private $connector;
    private $isInGroup;
    
    public function __construct(ADMCConnector $connector, ADMCIsInGroup $isInGroup) {
        $this->connector = $connector;
        $this->isInGroup = $isInGroup;
    }
    
    
    public function addGroup($group, $user){
        
        echo "est ce que l'utilisateur est dans la liste";
        var_dump($this->isInGroup->isInGroup($group->getName(), $user->getUsername()));
        
        
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