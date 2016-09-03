<?php

namespace ADMC\CoreBundle\LdapServices;


/**
 * Service permettant d'envoyer des mails
 */
class ADMCSendMail{
    
    /**
     *
     * @var type SwiftMailer
     */
    private $mailer;
    
    public function __construct($mailer){
        
        $this->mailer = $mailer;
       
    }
    
    
    /**
     * Méthode permettant d'envoyer un email. 
     * Les paramètres sont: destinataire, sujet, contenu du message
     * @param string $destinataire
     * @param string $sujet
     * @param string $message
     * @author Gabin Fourcault
     */
    public function envoyerMail($destinataire, $sujet, $message){
        
        $mailEnvoi  = \Swift_Message::newInstance()
                ->setSubject($sujet)
                ->setFrom("jmiller@admc.com")
                ->setTo($destinataire)
                ->setBody($message);
        $this->mailer->send($mailEnvoi);
        
        
    }
}