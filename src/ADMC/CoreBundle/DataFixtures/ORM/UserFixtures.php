<?php

namespace ADMC\CoreBundle\DataFixtures\ORM; 
use Doctrine\Common\Persistence\ObjectManager; 
use Doctrine\Common\DataFixtures\AbstractFixture; 
use Doctrine\Common\DataFixtures\OrderedFixtureInterface; 
use Symfony\Component\DependencyInjection\ContainerAwareInterface; 
use Symfony\Component\DependencyInjection\ContainerInterface; 
use ADMC\CoreBundle\Entity\User; 
use ADMC\CoreBundle\Entity\Group; 

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface { 
    /** * @var ContainerInterface */ 
    private $container; 
    
    /** * {@inheritDoc} */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }
     
    public function getOrder() {
        return 0;
    }
 
    public function load(ObjectManager $manager) {
 
        $userManager = $this->container->get('fos_user.user_manager');
         
        $user = $userManager->createUser();
         
        $user
            ->setUsername('gabin')
            ->setEmail('gabin@example.com')
            ->setFirstLogin(\DateTime::createFromFormat('j-M-Y', '15-Feb-2009'))
            ->setEnabled(true);
         
        $user->setPlainPassword('password');
 
        // Equivalent à :
         
//        $encoder = $this->container
//                ->get('security.encoder_factory')
//                ->getEncoder($user)
//            ;
//        $user->setPassword($encoder->encodePassword('somepass', $user->getSalt()));
 
         
        $userManager->updateUser($user);
    }
     
}