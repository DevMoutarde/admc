<?php
    
    
namespace ADMC\CoreBundle\Entity;
 
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @UniqueEntity(fields="usernameCanonical", errorPath="username", message="fos_user.username.already_used", groups={"Default", "Registration", "Profile"})
 * @UniqueEntity(fields="emailCanonical", errorPath="email", message="fos_user.email.already_used", groups={"Default", "Registration", "Profile"})
 */
class User extends BaseUser {
 
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
 
    /**
     * @ORM\ManyToMany(targetEntity="ADMC\CoreBundle\Entity\Group", inversedBy="users")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;
 
    /**
     * @ORM\Column(type="integer", length=6, options={"default":0})
     */
    protected $loginCount = 0;
 
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $firstLogin;
    
    
    /**
     * @var string
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     * 
     */
    protected $address;
    
    /**
     * @var integer
     * @ORM\Column(name="postalcode", type="integer", length=5, nullable=true)
     * 
     */
    protected $postalcode;
    
    /**
     * @var string
     * @ORM\Column(name="town", type="string", length=255, nullable=true)
     * 
     */
    protected $town;
    
    /**
     * @var string
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     * 
     */
    protected $firstname;
    
    /**
     * @var string
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     * 
     */
    protected $lastname;
    
    
 
    public function __construct() {
        parent::__construct();
        $this->groups = new ArrayCollection();
    }
 
    /**
     * Set loginCount
     *
     * @param integer $loginCount
     *
     * @return User
     */
    public function setLoginCount($loginCount) {
        $this->loginCount = $loginCount;
        return $this;
    }
 
    /**
     * Get loginCount
     *
     * @return integer
     */
    public function getLoginCount() {
        return $this->loginCount;
    }
 
    /**
     * Set firstLogin
     *
     * @param \DateTime $firstLogin
     *
     * @return User
     */
    public function setFirstLogin($firstLogin) {
        $this->firstLogin = $firstLogin;
        return $this;
    }
 
    /**
     * Get firstLogin
     *
     * @return \DateTime
     */
    public function getFirstLogin() {
        return $this->firstLogin;
    }
 
    function getEnabled() {
        return $this->enabled;
    }
 
    function getLocked() {
        return $this->locked;
    }
 
    function getExpired() {
        return $this->expired;
    }
 
    function getExpiresAt() {
        return $this->expiresAt;
    }
 
    function getCredentialsExpired() {
        return $this->credentialsExpired;
    }
 
    function getCredentialsExpireAt() {
        return $this->credentialsExpireAt;
    }
 
    function setSalt($salt) {
        $this->salt = $salt;
    }
 
    public function setPassword($password) {
        if ($password !== null)
            $this->password = $password;
        return $this;
    }
 
    function setGroups(Collection $groups = null) {
        if ($groups !== null)
            $this->groups = $groups;
    }
 
    public function setRoles(array $roles = array()) {
        $this->roles = array();
        foreach ($roles as $role)
            $this->addRole($role);
        return $this;
    }
 
    public function hasGroup($name = '') {
        return in_array($name, $this->getGroupNames());
    }
    
    public function setAddress($address){
        $this->address = $address;
        return $this;
    }
    
    public function getAddress(){
        return $this->address;
    }
    
    public function setPostalCode($code){
        $this->postalcode = $code;
        return $this;
    }
    
    public function getPostalCode(){
        return $this->postalcode;
    }
    
    public function setTown($town){
        $this->town = $town;
        return $this;
    }
    
    public function getTown(){
        return $this->town;
    }
    
    public function setFirstName($name){
        $this->firstname = $name;
        return $this;
    }
    
    public function getFirstName(){
        return $this->firstname;
    }
    
    public function setLastName($name){
        $this->lastname = $name;
        return $this;
    }
    
    public function getLastName(){
        return $this->lastname;
    }
 
}