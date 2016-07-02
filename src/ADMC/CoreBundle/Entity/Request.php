<?php

namespace ADMC\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Request
 *
 * @ORM\Table(name="request")
 * @ORM\Entity(repositoryClass="ADMC\CoreBundle\Repository\RequestRepository")
 */
class Request
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="ADMC\CoreBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $requestor;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="ADMC\CoreBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $approver;
    
    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="ADMC\CoreBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $userConcerned;
    
    

    
    /**
     * @var RoleRequest
     * 
     * @ORM\ManyToOne(targetEntity="ADMC\CoreBundle\Entity\RoleRequest")
     * @ORM\JoinColumn(nullable=false)
     */
    private $roleRequest;
    
    /**
     * @var Group
     * 
     * @ORM\ManyToOne(targetEntity="ADMC\CoreBundle\Entity\Group")
     * @ORM\JoinColumn(nullable=true)
     */
    private $group;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="attached", type="string", length=255, nullable=true)
     */
    private $attached;


     /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
     private $date;
     
     /**
      * @var string
      * 
      * @ORM\Column(name="status", type="string", length=255, nullable=true)
      */
     private $status;
    
     
     
    
    public function __construct(){
        $this->date = new \Datetime();
    }
     
     
     
     
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set requestor
     *
     * @param User $requestor
     *
     * @return Request
     */
    public function setRequestor(User $requestor)
    {
        $this->requestor = $requestor;

        return $this;
    }

    /**
     * Get requestor
     *
     * @return User
     */
    public function getRequestor()
    {
        return $this->requestor;
    }

    /**
     * Set approver
     *
     * @param User $approver
     *
     * @return Request
     */
    public function setApprover(User $approver)
    {
        $this->approver = $approver;

        return $this;
    }

    /**
     * Get approver
     *
     * @return User
     */
    public function getApprover()
    {
        return $this->approver;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Request
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set attached
     *
     * @param string $attached
     *
     * @return Request
     */
    public function setAttached($attached)
    {
        $this->attached = $attached;

        return $this;
    }

    /**
     * Get attached
     *
     * @return string
     */
    public function getAttached()
    {
        return $this->attached;
    }
    
    
    
     /**
     * Set date
     *
     * @param \DateTime $date
     * @return Request
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
    
    
    /**
     * Get status
     * 
     * @return Request
     */
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
    
    public function getStatus(){
        return $this->status;
    }
      
    /**
     * 
     * @param \ADMC\CoreBundle\Entity\RoleRequest $role
     * @return \ADMC\CoreBundle\Entity\Request
     */
    public function setRoleRequest(RoleRequest $role){
        $this->roleRequest = $role;
        return $this;
    }
    
    
    /**
     * 
     * @return RoleRequest
     */
    public function getRoleRequest(){
        return $this->roleRequest;
    }
    
    
    /**
     * 
     * @param \ADMC\CoreBundle\Entity\Group $group
     * @return \ADMC\CoreBundle\Entity\Request
     */
    public function setGroup(Group $group){
        $this->group = $group;
        return $this;
    }
    
    
    /**
     * 
     * @return Group
     */
    public function getGroup(){
        return $this->group;
    }
    
    public function setUserConcerned(User $user){
        $this->userConcerned = $user;
        return $this;
    }
    
    public function getUserConcerned(){
        
        return $this->userConcerned;
    }
    
}

