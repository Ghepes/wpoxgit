<?php

namespace Oxgit;

use Oxgit\Log\Logger;

class OxgitServiceProvider implements ProviderInterface
{
    public function register(Oxgit $oxgit)
    {
        // Bind the Oxgit instance itself to the container
        $oxgit->bind('Oxgit\Oxgit', $oxgit);

        // Initialise logger from log file
        $oxgit->bind('Oxgit\Log\Logger', function(Oxgit $oxgit) {
            $log = Logger::file(trailingslashit($oxgit->oxgitPath) . 'oxgitlog');
            return $log;
        });

        // Use EDD for licensing
        $oxgit->bind('Oxgit\License\LicenseApi', 'Oxgit\License\DashboardLicenseApi');

        // Singletons must be last for now, since they call "make()"
        $oxgit->singleton('Oxgit\Dashboard', 'Oxgit\Dashboard');
    }
}
