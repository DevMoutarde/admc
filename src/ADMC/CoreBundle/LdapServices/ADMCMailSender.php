<?php

namespace ADMC\CoreBundle\LdapServices;

class ADMCMailSender{
    
    public function sendMail($subject, $recipient, $body){
       $message = \Swift_Message::newInstance()
               ->setSubject($subject)
               ->setFrom('jmiller@admc.com')
               ->setTo($recipient)
               ->setBody($body);
       $this->get('mailer')->send($message);
    }
}