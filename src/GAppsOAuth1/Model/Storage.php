<?php
/**
 * Description of GAppsOAuth1_Storage
 * @author Neftalí Yagua <neftali.yagua@gmail.com>
 */
namespace GAppsOAuth1\Model;
use Zend\Authentication\Storage;
class Storage extends Storage\Session
{
    public function setRememberMe($rememberMe = 0, $time = 1209600)
    {
        if ($rememberMe == 1) {
            $this->session->getManager()->rememberMe($time);
        }
    }
    public function forgetMe()
    {
        $this->session->getManager()->forgetMe();
    } 
}