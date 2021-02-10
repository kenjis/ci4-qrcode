<?php

declare(strict_types=1);

namespace App\Libraries;

use QRcode;
use QRimage;

use function array_filter;
use function count;
use function define;
use function defined;
use function in_array;
use function is_array;
use function max;
use function min;

/**
 * PHP QR Code porting for Codeigniter
 *
 * @porting author    dwi.setiyadi@gmail.com
 * @original author    http://phpqrcode.sourceforge.net/
 */

class Ciqrcode
{
    var $cacheable = true;
    var $cachedir = WRITEPATH . 'cache/';
    var $errorlog = WRITEPATH . 'logs/';
    var $quality = true;
    var $size = 1024;

    function __construct($config = [])
    {
        include APPPATH . '/ThirdParty/qrcode/qrconst.php';
        include APPPATH . '/ThirdParty/qrcode/qrtools.php';
        include APPPATH . '/ThirdParty/qrcode/qrspec.php';
        include APPPATH . '/ThirdParty/qrcode/qrimage.php';
        include APPPATH . '/ThirdParty/qrcode/qrinput.php';
        include APPPATH . '/ThirdParty/qrcode/qrbitstream.php';
        include APPPATH . '/ThirdParty/qrcode/qrsplit.php';
        include APPPATH . '/ThirdParty/qrcode/qrrscode.php';
        include APPPATH . '/ThirdParty/qrcode/qrmask.php';
        include APPPATH . '/ThirdParty/qrcode/qrencode.php';

        $this->initialize($config);
    }

    public function initialize($config = []): void
    {
        $this->cacheable = $config['cacheable'] ?? $this->cacheable;
        $this->cachedir = $config['cachedir'] ?? $this->cachedir;
        $this->errorlog = $config['errorlog'] ?? $this->errorlog;
        $this->quality = $config['quality'] ?? $this->quality;
        $this->size = $config['size'] ?? $this->size;

        // use cache - more disk reads but less CPU power, masks and format templates are stored there
        if (! defined('QR_CACHEABLE')) {
            define('QR_CACHEABLE', $this->cacheable);
        }

        // used when QR_CACHEABLE === true
        if (! defined('QR_CACHE_DIR')) {
            define('QR_CACHE_DIR', $this->cachedir);
        }

        // default error logs dir
        if (! defined('QR_LOG_DIR')) {
            define('QR_LOG_DIR', $this->errorlog);
        }

        // if true, estimates best mask (spec. default, but extremally slow; set to false to significant performance boost but (propably) worst quality code
        if ($this->quality) {
            if (! defined('QR_FIND_BEST_MASK')) {
                define('QR_FIND_BEST_MASK', true);
            }
        } else {
            if (! defined('QR_FIND_BEST_MASK')) {
                define('QR_FIND_BEST_MASK', false);
            }

            if (! defined('QR_DEFAULT_MASK')) {
                define('QR_DEFAULT_MASK', $this->quality);
            }
        }

        // if false, checks all masks available, otherwise value tells count of masks need to be checked, mask id are got randomly
        if (! defined('QR_FIND_FROM_RANDOM')) {
            define('QR_FIND_FROM_RANDOM', false);
        }

        // maximum allowed png image width (in pixels), tune to make sure GD and PHP can handle such big images
        if (defined('QR_PNG_MAXIMUM_SIZE')) {
            return;
        }

        define('QR_PNG_MAXIMUM_SIZE', $this->size);
    }

    public function generate($params = [])
    {
        if (
            isset($params['black'])
            && is_array($params['black'])
            && count($params['black']) == 3
            && array_filter($params['black'], 'is_int') === $params['black']
        ) {
            QRimage::$black = $params['black'];
        }

        if (
            isset($params['white'])
            && is_array($params['white'])
            && count($params['white']) == 3
            && array_filter($params['white'], 'is_int') === $params['white']
        ) {
            QRimage::$white = $params['white'];
        }

        $params['data'] = $params['data'] ?? 'QR Code Library';
        if (isset($params['savename'])) {
            $level = 'L';
            if (
                isset($params['level']) && in_array(
                    $params['level'],
                    ['L', 'M', 'Q', 'H']
                )
            ) {
                $level = $params['level'];
            }

            $size = 4;
            if (isset($params['size'])) {
                $size = min(max((int) $params['size'], 1), 10);
            }

            QRcode::png($params['data'], $params['savename'], $level, $size, 2);

            return $params['savename'];
        } else {
            $level = 'L';
            if (
                isset($params['level']) && in_array(
                    $params['level'],
                    ['L', 'M', 'Q', 'H']
                )
            ) {
                $level = $params['level'];
            }

            $size = 4;
            if (isset($params['size'])) {
                $size = min(max((int) $params['size'], 1), 10);
            }

            QRcode::png($params['data'], null, $level, $size, 2);
        }
    }
}
