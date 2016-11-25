<?php
/**
 * Crypt_RSA allows to do following operations:
 *     - key pair generation
 *     - encryption and decryption
 *     - signing and sign validation
 *
 * This module requires the PHP BCMath extension.
 * See http://us2.php.net/manual/en/ref.bc.php for details.
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Encryption
 * @package    Crypt_RSA
 * @author     Alexander Valyalkin <valyala@gmail.com>
 * @copyright  2005, 2006 Alexander Valyalkin
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    1.2.0b
 * @link       http://pear.php.net/package/Crypt_RSA
 */

/**
 * this is a test script, which checks functionality of
 * Crypt_RSA package with different math wrappers. It
 * checks such things as:
 *  - key generation,
 *  - encryption / decryption
 *  - signing / sign validation
 */


require_once 'Crypt/RSA.php';
require_once 'PHPUnit/Framework/TestCase.php';

class Crypt_RSA_KeyPairTest extends PHPUnit_Framework_TestCase {

    /**
     * Load one or more drivers.
     */
    public static function drivers() {
        $drivers = array();
        if (extension_loaded('GMP')) {
            $drivers[] = array('GMP');
        }
        if (extension_loaded('big_int')) {
            $drivers[] = array('BigInt');
        }

        
        $drivers[] = array('BCMath');
        

        return $drivers;
    }

    /**
     * @dataProvider drivers
     */
    public function testKeyLength($driver) {
        $key_pair = new Crypt_RSA_KeyPair(128, $driver, 'check_error');

        $public_key = $key_pair->getPublicKey();
        $private_key = $key_pair->getPrivateKey();
        $key_length = $key_pair->getKeyLength();

        $this->assertSame(128, $key_length, "wrong result returned from Crypt_RSA_KeyPair::getKeyLength() function");
    }

    /**
     * @dataProvider drivers
     */
    public function testPEMStringParsing($driver) {
        // check fromPEMString() and toPEMString() functions of Crypt_RSA_KeyPair class
        $str_in = "
        -----BEGIN RSA PRIVATE KEY-----
        MIIBPAIBAAJBAKSLT0KZTXYxHr6U/9GYBbnV8vxGkIleDE4aiVMRxuofOjcHDCoI
        qsrVjgP78BrVqWMAAeQ9i0dXxz9zhy0+h7MCAwEAAQJBAI6OL1Yo0Uaj2doN5vDk
        f5l4dfMBA7ovZAPK08zHawlsLvZTzxOQJhKquN01aIJA2wpzixcC9T2PgI6XW6jx
        HkECIQDOEVpVZcE2tSnU3TwulVAC8V82akNAEH8ht6eqsEVWkwIhAMxqMc4Av7hs
        ioAs1H9NvkF01xYVhyiEc4rzgVlmjp5hAiEAi53AOYnmvd1CyWFXrCwn+MZ2/xRC
        Gj7TFBItvH0PjZcCIBi9kaGZPZsYp/qzclSmGCzb81xc5qrkvQdISZOEciaBAiEA
        vLq0MTN4jkO2DOC4qxvKc1l4383nks1g/cljSO/y0pw=
        -----END RSA PRIVATE KEY-----
        ";

        $key_pair = Crypt_RSA_KeyPair::fromPEMString($str_in,  $driver, 'check_error');

        $public_key = $key_pair->getPublicKey();
        $private_key = $key_pair->getPrivateKey();
        $key_length = $key_pair->getKeyLength();

        $this->assertSame(512, $key_length, "incorrect key length retrieved from PEM string");
    }

    /**
     * @dataProvider drivers
     */
    public function testDecryption($driver) {
        // Setup
        $str_in = "
        -----BEGIN RSA PRIVATE KEY-----
        MIIBPAIBAAJBAKSLT0KZTXYxHr6U/9GYBbnV8vxGkIleDE4aiVMRxuofOjcHDCoI
        qsrVjgP78BrVqWMAAeQ9i0dXxz9zhy0+h7MCAwEAAQJBAI6OL1Yo0Uaj2doN5vDk
        f5l4dfMBA7ovZAPK08zHawlsLvZTzxOQJhKquN01aIJA2wpzixcC9T2PgI6XW6jx
        HkECIQDOEVpVZcE2tSnU3TwulVAC8V82akNAEH8ht6eqsEVWkwIhAMxqMc4Av7hs
        ioAs1H9NvkF01xYVhyiEc4rzgVlmjp5hAiEAi53AOYnmvd1CyWFXrCwn+MZ2/xRC
        Gj7TFBItvH0PjZcCIBi9kaGZPZsYp/qzclSmGCzb81xc5qrkvQdISZOEciaBAiEA
        vLq0MTN4jkO2DOC4qxvKc1l4383nks1g/cljSO/y0pw=
        -----END RSA PRIVATE KEY-----
        ";

        $key_pair = Crypt_RSA_KeyPair::fromPEMString($str_in,  $driver, 'check_error');

        $public_key = $key_pair->getPublicKey();
        $private_key = $key_pair->getPrivateKey();

        //Test
        $rsa_obj = new Crypt_RSA(array(), $driver, 'check_error');

        $text = 'test text';
        $enc_text = $rsa_obj->encrypt($text, $public_key);
        $dec_text = $rsa_obj->decrypt($enc_text, $private_key);

        $this->assertSame($dec_text, $text, "decrypted text differs from encrypted text in Crypt_RSA_KeyPair::fromPEMString() check");

    }

    /**
     * @dataProvider drivers
     */
    public function testEverything($driver) {
        $errors = array();

        // Setup
        $str_in = "-----BEGIN RSA PRIVATE KEY-----
        MIIBPAIBAAJBAKSLT0KZTXYxHr6U/9GYBbnV8vxGkIleDE4aiVMRxuofOjcHDCoI
        qsrVjgP78BrVqWMAAeQ9i0dXxz9zhy0+h7MCAwEAAQJBAI6OL1Yo0Uaj2doN5vDk
        f5l4dfMBA7ovZAPK08zHawlsLvZTzxOQJhKquN01aIJA2wpzixcC9T2PgI6XW6jx
        HkECIQDOEVpVZcE2tSnU3TwulVAC8V82akNAEH8ht6eqsEVWkwIhAMxqMc4Av7hs
        ioAs1H9NvkF01xYVhyiEc4rzgVlmjp5hAiEAi53AOYnmvd1CyWFXrCwn+MZ2/xRC
        Gj7TFBItvH0PjZcCIBi9kaGZPZsYp/qzclSmGCzb81xc5qrkvQdISZOEciaBAiEA
        vLq0MTN4jkO2DOC4qxvKc1l4383nks1g/cljSO/y0pw=
        -----END RSA PRIVATE KEY-----
";

        $key_pair = Crypt_RSA_KeyPair::fromPEMString($str_in,  $driver, 'check_error');


        $str_out = $key_pair->toPEMString();

        $in = explode("\n", $str_in);
        $out = explode("\n", $str_out);
        
        foreach ($in as $n => $row) {
            $in[$n] = trim($row);
        }

        foreach ($out as $n => $row) {
            $out[$n] = trim($row);
        }

        $this->assertSame($in, $out, "PEM strings handling seems to be broken");

        // try to generate 256-bit keypair and convert it to PEM string,
        // then convert this string to another keypair and compare them
        $key_pair->generate(256);

        $str1 = $key_pair->toPEMString();
        $key_pair2 = $key_pair->fromPEMString($str1);
        if (!$key_pair->isEqual($key_pair2) || !$key_pair2->isEqual($key_pair)) {
            $errors[] = "RSA_KeyPair::isEqual() is broken";
        }

        $this->assertTrue(empty($errors), print_r($errors, true));
    }

}








/**************************************/
if (!function_exists('check_error')) {
    function check_error(&$obj)
    {
        if ($obj->isError()) {
            $error = $obj->getLastError();
            echo "error: ", $error->getMessage(), "\n";
    //        var_dump($error->getBacktrace());

        }
    }
}

?>
