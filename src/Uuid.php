<?php
/**
 * This file is part of MayMeow/Uuid project
 * Copyright (c)  Charlotta Jung
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 * @copyright Copyright (c) Charlotta MayMeow Jung
 * @link      http://maymeow.click
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace MayMeow;

class Uuid {

    /**
     * When this namespace is specified, the name string is a fully-qualified domain name.
     * @link http://tools.ietf.org/html/rfc4122#appendix-C
     */
    const NAMESPACE_DNS = '6ba7b810-9dad-11d1-80b4-00c04fd430c8';
    /**
     * When this namespace is specified, the name string is a URL.
     * @link http://tools.ietf.org/html/rfc4122#appendix-C
     */
    const NAMESPACE_URL = '6ba7b811-9dad-11d1-80b4-00c04fd430c8';
    /**
     * When this namespace is specified, the name string is an ISO OID.
     * @link http://tools.ietf.org/html/rfc4122#appendix-C
     */
    const NAMESPACE_OID = '6ba7b812-9dad-11d1-80b4-00c04fd430c8';
    /**
     * When this namespace is specified, the name string is an X.500 DN in DER or a text output format.
     * @link http://tools.ietf.org/html/rfc4122#appendix-C
     */
    const NAMESPACE_X500 = '6ba7b814-9dad-11d1-80b4-00c04fd430c8';
    /**
     * The nil UUID is special form of UUID that is specified to have all 128 bits set to zero.
     * @link http://tools.ietf.org/html/rfc4122#section-4.1.7
     */
    const NIL = '00000000-0000-0000-0000-000000000000';

    private static $factory = null;

    /**
     * Validation Pattern
     */
    const VALID_PATTERN = '/^\{?[0-9a-f]{8}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?[0-9a-f]{4}\-?[0-9a-f]{12}\}?$/i';

    /**
     * Generate version 3 UUID based on sha1 hash of namespace and name
     *
     * @param $namespace UUID
     * @param $name string
     * @return bool|string
     */
    public static function v3($namespace, $name)
    {
        if(!self::is_valid($namespace)) return false;

        return self::_getFactory()->uuidV3($namespace, $name);

    }

    /**
     * Generate version 4 random UUID
     *
     * @return string
     */
    public static function v4()
    {
        return self::_getFactory()->uuidV4();
    }

    /**
     * Generate version 5 UUID based on sha1 has of namespace and name.
     *
     * @param $namespace
     * @param $name
     * @return bool|string
     */
    public static function v5($namespace, $name)
    {
        if(!self::is_valid($namespace)) return false;

        return self::_getFactory()->uuidV5($namespace, $name);
    }

    /**
     * Function _getFactory
     * @return UuidFactory|null
     */
    private static function _getFactory()
    {
        if(!self::$factory) {
            self::$factory = new UuidFactory();
        }

        return self::$factory;
    }

    /**
     * Check UUID agains validation pattern
     *
     * @param $uuid
     * @return bool
     */
    public static function is_valid($uuid) {
		return preg_match(self::VALID_PATTERN, $uuid) === 1;
	}
}
