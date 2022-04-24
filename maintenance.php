<?php
// Maintenance extension, https://github.com/GiovanniSalmeri/yellow-maintenance

class YellowMaintenance {
    const VERSION = "0.8.19";
    public $yellow;         // access to API

    var $isMaintenanceIp;

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("maintenanceIps", "");
	$this->isMaintenanceIp = in_array($this->yellow->toolbox->getServer("REMOTE_ADDR"), array_merge(preg_split("/\s*,\s*/", $this->yellow->system->get("maintenanceIps")), [ "127.0.0.1", "::1" ]));
    }

    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if (($page->get("status")=="maintenance" || $this->yellow->system->get("status")=="maintenance") && $this->yellow->getRequestHandler()=="core" && !$this->isMaintenanceIp) {
            $pageError = "";
            if ($this->yellow->extension->isExisting("edit")) {
                $pageError .= str_replace([ "@url", "@ip" ], [ $page->get("pageEditUrl"), $this->yellow->toolbox->getServer("REMOTE_ADDR") ], $this->yellow->language->getText("maintenancePageError"));
            }
            $page->error(503, $pageError);
        }
    }
}
