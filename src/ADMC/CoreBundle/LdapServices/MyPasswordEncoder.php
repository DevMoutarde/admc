<?php

namespace ADMC\CoreBundle\LdapServices;
use Symfony\Component\Security\Core\Encoder\BasePasswordEncoder;

class MyPasswordEncoder extends BasePasswordEncoder
{
    public function encodePassword($raw, $salt)
    {
        
        return base64_encode( pack( 'H*' , md5($raw) ) );
        
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $this->comparePasswords($encoded, $this->encodePassword($raw, $salt));
    }
    
    public function verifyUser(){
        
        $test = 0;
    }
}