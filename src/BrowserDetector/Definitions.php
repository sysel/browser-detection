<?php
namespace BrowserDetector;

class Definitions
{
    private $cacheDir = __DIR__;
    private $osFile = __DIR__ . '/Definitions/os.txt';
    private $browserFile = __DIR__ . '/Definitions/browser.txt';
    private $platformFile = __DIR__ . '/Definitions/platform.txt';

    private $definitions = [];

    /**
     * @param  string Cache directory
     */
    public function __construct($cacheDir = NULL) {
        if ($cacheDir && is_dir($cacheDir)) {
            $this->cacheDir = $cacheDir;
        }

        $this->loadDefinitions();
    }

    public function os() {
        return $this->definitions['os'];
    }

    public function browser() {
        return $this->definitions['browser'];
    }

    public function platform() {
        return $this->definitions['platform'];
    }

    private function loadDefinitions() {
        $this->definitions['os'] = $this->parseFile($this->osFile, 'parseOsLine');
        $this->definitions['browser'] = $this->parseFile($this->browserFile, 'parseBrowserLine');
        $this->definitions['platform'] = $this->parseFile($this->platformFile, 'parsePlatformLine');
    }

    private function parseFile($file, $callback) {
        $definitions = [];
        $fh = fopen($file, 'r');
        if (!$fh) {
            throw new BrowserDetectorException(sprintf("Could not open OS defintions in '%s'", $this->os));
        }
        while (($buffer = fgets($fh, 2048)) !== FALSE) {
            // detect empty lines and comment
            if (preg_match('/^(\\s+|\\s*#)/', $buffer)) {
                continue;
            }
            $line = call_user_func(array($this, $callback), $buffer);
            if ($line) {
                $definitions[] = $line;
            }
        }
        fclose($fh);
        return $definitions;
    }

    private function parseOsLine($line) {
        $split = preg_split('/\\s{2,}/', $line, 4);
        return [
            'os' => trim($split[0]),
            'version' => trim($split[1]),
            'pattern' => trim($split[2]),
            'ua' => trim($split[3]),
        ];
    }

    private function parseBrowserLine($line) {
        $split = preg_split('/\\s{2,}/', $line, 3);
        return [
            'browser' => trim($split[0]),
            'pattern' => trim($split[1]),
            'ua' => trim($split[2]),
        ];
    }

    private function parsePlatformLine($line) {
        $split = preg_split('/\\s{2,}/', $line, 3);
        return [
            'platform' => trim($split[0]),
            'pattern' => trim($split[1]),
            'ua' => trim($split[2]),
        ];
    }
}
