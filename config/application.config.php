<?php
/**
 * @author Rafi Adnan <rafi@nascenia.com>
 * @since 2014-11-10
 * @version 2014-11-10
 */

return array(
    // Modules to be loaded.
    'modules' => array(
        // 3rd party modules
        'RdnDoctrine',
        'RdnException',
        'RdnRouter',
        'RdnTrailingSlash',
        'RdnUpload',

        // BetterCollective modules
        'Nascenia',
        'NasRec',
        'NasRecAdmin',
        'NasRecPublic',
    ),
    'module_listener_options' => array(
        /* Empty array so bin/console doesn't throw errors */
    ),
);
