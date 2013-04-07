<?php
/**
 * Description of GAppsOAuth1Consumer
 * @author Neftalí Yagua <neftali.yagua@gmail.com>
 */
//namespace GAppsOAuth1\Model;
use Auth\OpenID;
class GAppsOAuth1Consumer extends Auth_OpenID_Consumer{
    public function __construct(){
        $STORE_PATH = "/tmp/_php_consumer_test";
        if (!file_exists($STORE_PATH) && !mkdir($STORE_PATH)) {
            print "Could not create the FileStore directory '$STORE_PATH'. ".
                " Please check the effective permissions.";
            exit(0);
        }
        $store = new Auth_OpenID_FileStore($STORE_PATH);
        return parent::__construct($store);
    }
}
?>
