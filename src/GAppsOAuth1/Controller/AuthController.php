<?php
/**
 * Coderic, S.A. (http://www.coderic.co.ve/)
 *
 * @link      http://github.com/CodericDev/GAppsOAuth1 for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Coderic, S.A. (http://www.coderic.co.ve)
 * @license   http://www.coderic.co.ve/license/submodules/new-bsd New BSD License
 */

namespace GAppsOAuth1\Controller;
use Zend\Mvc\Controller\AbstractActionController;
/*
use Auth\OpenID\google_discovery;
use Auth\OpenID\AX;
use Auth\OpenID\Consumer;
use Auth\OpenID\FileStore;
use Auth\OpenID\PAPE;
*/
use GAppsOAuth1\Model\GAppsOAuth1Consumer;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        $consumer = new GAppsOAuth1Consumer();
        new Discover($consumer);
########################################################################
        $BASE_URL = 'http://reservas.valencialosroques.com';
        $auth = $consumer->begin("valencialosroques.com");
        /**
         * Request access to e-mail address, first name and last name
         * via OpenID Attribute Exchange (AX)
         *
         * IMPORTANT: If using values from OpenID AX, please be sure to follow
         * the security considerations documented on code.google.com/googleapps
         * on the 'Best Practices' document.
         */
        $attribute = array(
            Auth_OpenID_AX_AttrInfo::make('http://axschema.org/contact/email',2,1, 'email'),
            Auth_OpenID_AX_AttrInfo::make('http://axschema.org/namePerson/first',1,1, 'firstname'),
            Auth_OpenID_AX_AttrInfo::make('http://axschema.org/namePerson/last',1,1, 'lastname')
        );

        $ax = new Auth_OpenID_AX_FetchRequest;
        foreach($attribute as $attr){
                $ax->add($attr);
        }
        $auth->addExtension($ax);
/**
 * Redirect user to Google to complete OpenID authentication
 * Params for $auth->redirectURL():
 *   1. the openid.realm (which must match declared value in manifest)
 *   2. the openid.return_to (URL to return to after authentication is complete)
 */
        $url = $auth->redirectURL($BASE_URL . '/', $BASE_URL . '/auth/token');
        header('Location: ' . $url);
    }
    public function callbackAction()
    {
    }
    public function logoutAction()
    {
    }
}