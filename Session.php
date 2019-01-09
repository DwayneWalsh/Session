<?php

/**
 * Session wrapper
 *
 * @since 2019-01-09
 * @version 1.0
 * @author Dwayne Walsh
 * @link https://github.com/DwayneWalsh
 *
 */

class Session
{
    /**
     * Creates a session
     * @param string $name          A session name
     * @param string $value         Value of a session
     *
     * @return string
     */
    public static function put($name, $value) 
    {
        if(self::exists($name)) {
            self::delete($name);
        }
        return $_SESSION[$name] = $value;
    }

    /**
     * Checks if session exists
     * @param string $name          A session name
     *
     * @return boolean
     */
    public static function exists($name) 
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    /**
     * Deletes a session
     * @param string $name          A session name
     */
    public static function delete($name) 
    {
        if(self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }


    /**
     * Gets a session`s value if it exists
     * @param string $name          A session name
     *
     * @return string
     */
    public static function get($name) 
    {
        if(self::exists($name)) {
            return $_SESSION[$name];
        }
        return '';
    }


    /**
     * Create`s a session and after it was once showed - delete`s it
     * @param string $name          A session name
     * @param string $string        Value of a session
     *
     * @return string
     */
    public static function flash($name, $string = '') {
        if(self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
        return '';
    }

}
