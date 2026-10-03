<?php

return [
    // Shared password shops use to log into the portal.
    // Set PORTAL_PASSWORD in .env on the server. Falls back to a dev default.
    'password' => env('PORTAL_PASSWORD', 'dhimis123'),
];
