<?php

namespace Bolt\Extension\Koolserve\Passwd;

use Bolt\Extension\SimpleExtension;

/**
 * Passwd extension class.
 *
 * @author Chris Hilsdon <chris@koolserve.uk>
 */
class PasswdExtension extends SimpleExtension
{
    /**
    * {@inheritdoc}
    */
    protected function registerTwigFunctions()
    {
        return [
            'passwd' => 'passwdFunction',
        ];
    }

    public function passwdFunction($user, $pass, $realm = 'bolt')
    {
        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
            if ($_SERVER['PHP_AUTH_USER'] === $user && $_SERVER['PHP_AUTH_PW'] === $pass) {
                return '';
            }
        }

        header('WWW-Authenticate: Basic realm="'.$realm.'"');
        header('HTTP/1.0 401 Unauthorized');

        exit();
    }
}
