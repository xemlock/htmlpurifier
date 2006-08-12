<?php

require_once 'HTMLPurifier/URIScheme.php';

// VERY RELAXED! Shouldn't cause problems, not even Firefox checks if the
// email is valid, but be careful!

class HTMLPurifier_URIScheme_mailto extends HTMLPurifier_URIScheme {
    
    function validateComponents(
        $userinfo, $host, $port, $path, $query, $config
    ) {
        list($userinfo, $host, $port, $path, $query) = 
            parent::validateComponents(
                $userinfo, $host, $port, $path, $query, $config );
        // we need to validate path against RFC 2368's addr-spec
        return array(null, null, null, $path, $query);
    }
    
}

?>