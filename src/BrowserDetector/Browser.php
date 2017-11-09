<?php
namespace BrowserDetector;

class Browser
{
    public $browser;
    public $version;
    public $os;
    public $osVersion;
    public $platform;

    public function __toString() {
        $s = $this->browser . ' ' . $this->version . ' (' . $this->os;
        if ($this->osVersion) {
            $s .= ' ' . $this->osVersion;
        }
        if ($this->platform) {
            $s .= ', ' . $this->platform;
        }
        $s .= ')';
        return $s;
    }
}
