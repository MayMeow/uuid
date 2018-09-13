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

/**
 * Created by PhpStorm.
 * User: may
 * Date: 2/14/2017
 * Time: 7:17 PM
 */

namespace tests;

use MayMeow\UuidFactory;
use PHPUnit\Framework\TestCase as BaseTestCase;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

class UuidTest extends BaseTestCase
{
    public function testV3()
    {
        $uuidv3 = UuidFactory::v3(UuidFactory::NAMESPACE_DNS, 'test.maymeow.click');

        $this->assertEquals('14543655-8766-3363-8ca4-a0b5b4c64124', $uuidv3);
    }

    public function testV5()
    {
        $uuidv5 = UuidFactory::v5(UuidFactory::NAMESPACE_DNS, 'test.maymeow.click');

        $this->assertEquals('e3cd3b2a-d28a-50d7-820e-42907646f6d8', $uuidv5);
    }

    public function testV4()
    {
        $uuidv4 = UuidFactory::v4();

        $this->assertEquals(true, UuidFactory::is_valid($uuidv4));
    }

    public function testIsValid()
    {
        $notValidUuid = 'e3cd3b2a-d28a-50d7-820es-42907646f6d8';

        $this->assertEquals(false, UuidFactory::is_valid($notValidUuid));
    }
}
