<?php

namespace ADMC\CoreBundle\LdapServices;

class ADMCSendMail{
    
    private $mailer;
    
    public function __construct($mailer){
        
        $this->mailer = $mailer;
       
    }
    
    public function envoyerMail($destinataire, $sujet, $message){
        
        $mailEnvoi  = \Swift_Message::newInstance()
                ->setSubject($sujet)
                ->setFrom("jmiller@admc.com")
                ->setTo($destinataire)
                ->setBody($message);
        $this->mailer->send($mailEnvoi);
        
        
    }
}