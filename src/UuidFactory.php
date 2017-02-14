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

class UuidFactory
{
    /**
     * Generate UUID version 3
     *
     * @param $namespace
     * @param $name
     * @return string
     */
    public function uuidV3($namespace, $name)
    {
        $string = $this->getFromNameAndNs($namespace, $name, 'md5');

        return $this->getFromHash($string, 3);
    }

    /**
     * Generate UUID version 4
     *
     * @return string
     */
    public function uuidV4()
    {
        if (function_exists('random_bytes')) {
            $bytes = random_bytes(16);
        } else {
            $bytes = openssl_random_pseudo_bytes(16);
        }
        $hash = bin2hex($bytes);

        return $this->getFromHash($hash, 4);
    }

    /**
     * Generate UUID version 5
     *
     * @param $namespace
     * @param $name
     * @return string
     */
    public function uuidV5($namespace, $name)
    {
        $string = $this->getFromNameAndNs($namespace, $name, 'sha1');

        return $this->getFromHash($string, 5);
    }

    /**
     * Generate hash from, namespace and hash function.
     *
     * @param $namespace UUID
     * @param $name string
     * @param $hash
     * @return mixed
     */
    protected function getFromNameAndNs($namespace, $name, $hash)
    {
        $nhex = str_replace(array('-','{','}'), '', $namespace);
        $nstr = '';

        for($i = 0; $i < strlen($nhex); $i+=2)
		{
			$nstr .= chr(hexdec($nhex[$i].$nhex[$i+1]));
		}

        return $hash($nstr . $name);
    }

    /**
     * Generate UUID from hash and version.
     *
     * @param $hash
     * @param $version
     * @return string
     */
    protected function getFromHash($hash, $version)
    {
        return sprintf('%08s-%04s-%04x-%04x-%12s',
    		// 32 bits for "time_low"
    		substr($hash, 0, 8),
    		// 16 bits for "time_mid"
    		substr($hash, 8, 4),
    		// 16 bits for "time_hi_and_version",
    		// four most significant bits holds version number 4
    		(hexdec(substr($hash, 12, 4)) & 0x0fff) | $version << 12,
    		// 16 bits, 8 bits for "clk_seq_hi_res",
    		// 8 bits for "clk_seq_low",
    		// two most significant bits holds zero and one for variant DCE1.1
    		(hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,
    		// 48 bits for "node"
    		substr($hash, 20, 12)
		);
    }

}
