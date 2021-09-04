<?php
declare(strict_types=1);

return [
    /**
     * Library to be used by the SDK to communicate with
     * the publit.io API.
     *
     * Recommended: curl
     * Default: 'fopen'
     *
     * Find all options in the enum: LaritioHttpLibrary
     */
    'http_library' => env('LARITIO_HTTP_LIBRARY', 'fopen'),

    /**
     * Which version of the publit.io API the SDK should communitcate
     * with.
     *
     * Default: '1'
     */
    'api_version' => env('LARITIO_API_VERSION', '1'),

    /**
     * Public API Key to be used by the SDK to authenticate
     * to the publit.io API.
     *
     * @see https://publit.io/docs/#getting-started
     *
     * Default: ''
     */
    'public_key' => env('LARITIO_PUBLIC_KEY', ''),

    /**
     * Private API Key to be used by the SDK to authenticate
     * to the publit.io API.
     *
     * @see https://publit.io/docs/#getting-started
     *
     * Default: ''
     */
    'private_key' => env('LARITIO_PRIVATE_KEY', ''),

    /**
     * The endpoint to which the SDK should point the requests.
     *
     * @see https://publit.io/docs
     *
     * Default: https://api.publit.io
     */
    'api_endpoint' => env('LARITIO_API_ENDPOINT', 'https://api.publit.io'),
];
