<?php

declare(strict_types=1);

return [
    /*
     * ------------------------------------------------------------------------
     * Default Firebase project
     * ------------------------------------------------------------------------
     */

    'default' => env('FIREBASE_PROJECT', 'app'),

    /*
     * ------------------------------------------------------------------------
     * Firebase project configurations
     * ------------------------------------------------------------------------
     */

    'projects' => [
        'app' => [

            /*
             * ------------------------------------------------------------------------
             * Credentials / Service Account
             * ------------------------------------------------------------------------
             *
             * In order to access a Firebase project and its related services using a
             * server SDK, requests must be authenticated. For server-to-server
             * communication this is done with a Service Account.
             *
             * If you don't already have generated a Service Account, you can do so by
             * following the instructions from the official documentation pages at
             *
             * https://firebase.google.com/docs/admin/setup#initialize_the_sdk
             *
             * Once you have downloaded the Service Account JSON file, you can use it
             * to configure the package.
             *
             * If you don't provide credentials, the Firebase Admin SDK will try to
             * auto-discover them
             *
             * - by checking the environment variable FIREBASE_CREDENTIALS
             * - by checking the environment variable GOOGLE_APPLICATION_CREDENTIALS
             * - by trying to find Google's well known file
             * - by checking if the application is running on GCE/GCP
             *
             * If no credentials file can be found, an exception will be thrown the
             * first time you try to access a component of the Firebase Admin SDK.
             *
             */

            'credentials' => [
                "type" => "service_account",
                "project_id" => "sso-authentication-8ac9e",
                "private_key_id" => "6ebb4835b910dc299604b56440efdbd04c17346c",
                "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDo80ZNfRikQXO0\nwu3tuSf9iTtlg/emB3DuRrGqL0sAIVNhtijo+8eyRC4q0F3O13W37NDY/CFmNPLn\nhcFvstIIux+s0xVs6FKkx43+5vJpUlGV/mMDLXc+TrAe+JWr2+T+zQqbsL/DDx29\nt3pOcWPZUGLa46wl16NuX1FbC8Qujfsf3Hf+M+KxnJVQUIqxRRS8tFD6/oR2XuDi\n97u+L7JLImVP75q/90RGv5dp3Kr0lp/ennfR1xmppT/U2Y2nghmEWLrlhtpGm/Vr\ndxZcABnzbkHvKJUUqXHwsrOL106BCENEDhDX2Sxoa/XiUSRU6YYZxcT7j/CB4HDJ\nnOOeab8ZAgMBAAECggEACSRjAe+C5A9dhx6PT+EQXLbiCd3f/jgUioVju5YXj22/\nY/pOKLaY47ohRbTfuZpjGFDG8X0Tons5fTSWnteZvpX5bELseFW1yJm8TOCras68\nPPK62AkUwPE9oDmJRjFfD1Dkta9+Fx2kwSlON33juUeaWZTN0L5hv5cmDjir/leo\n9EYqACArrZ8tFymLuThRZhqZ3sHLigtxjHj05dZDTIIPlxq3lqc6xqk8ueW7V55F\nr27NpgAziwQTcIsRKznNId6TnjevV0oqenALnD97kLRiEYuehvrTXY16fWcrv5iv\nLH72JXF0SwOZr/4llRfxmNgGdr4S5+/ofnkJryKccQKBgQD17Jgjvtdj0n6OMO2j\n+c8NhQBlCcUCjD7N9fmxNgWj41SjfNeCA6TM8RxTvadrNWYQJY5QeE6Q1R9S0w4m\n7vll1EUGre+iJ7ACK11pXPnby3ljkev2oAzcE610fmz/g+6cbtA2T2JJFR1uK38c\nAGtzR72ClSWe56B8fI0hfx4+9wKBgQDyfpoZfnLPg6kay+n6vwV+aqn4jCHJ/iIa\n5ZOaYNUkBuwBaPX8utjkohP/R6I22oAO9LwKNLiOFXT1tE6db2FAQwRtRTJWFTdr\nbTyB9/LAua25i0CX06GHGEIoEmz7GurLWAPce8OOFAOcdSUV8TSMkitdMpq6HI69\n6vfayhCebwKBgBhiJwuURoLtQgMTMtzJThBHGazq9Q+1nByLwQAjHRgM2D2FiVCo\nz9RKK8bZzRnCJ6Z+MsgjxZZyqzJpHsQZebzw+Q8ae+IWEUuFxTNHNrbmS9jlhQHl\nCKFhihc82c3T5Pq5ugdIg7Q/VbWwtl+uYvkBKfcilqJU0QLGzq99jSAtAoGBAM73\nTRDbQqRoa+lKBx6S8N5vrThMaf5bn8IzFWKaqO/B1KZzbhfRZZLl3olwGzwUC144\ndVGEo8vo9lVLGhn22Rse1+VnPMoJ+639oroO5KqnD2YgOvYak2+ZPcWzzD4ZQDJj\noZAKNeLKpDZiKU/r+XzMuKQnr7WO8CmaJQcglUSTAoGBAKOrwq1EIkwhQQocGcWG\nQ3EPnECQCY+01BT8hqS3/IF36SoEN2V7FG/1m4+caOwK4MlGRzUODmYMIGNXOdRy\nIUJ1ivZxx0mQfWPFZ7X9GHlzolTVc1LndyJWZpE5d4iUOji8703cLJE2NmSmeVn5\nkdARlyqpzPXFQmPrXiGf4Hj0\n-----END PRIVATE KEY-----\n",
                "client_email" => "firebase-adminsdk-jdfjd@sso-authentication-8ac9e.iam.gserviceaccount.com",
                "client_id" => "108625715852575401504",
                "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
                "token_uri" => "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
                "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-jdfjd%40sso-authentication-8ac9e.iam.gserviceaccount.com",
                "universe_domain" => "googleapis.com"
            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Auth Component
             * ------------------------------------------------------------------------
             */

            'auth' => [
                'tenant_id' => env('FIREBASE_AUTH_TENANT_ID'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firestore Component
             * ------------------------------------------------------------------------
             */

            'firestore' => [

                /*
                 * If you want to access a Firestore database other than the default database,
                 * enter its name here.
                 *
                 * By default, the Firestore client will connect to the `(default)` database.
                 *
                 * https://firebase.google.com/docs/firestore/manage-databases
                 */

                // 'database' => env('FIREBASE_FIRESTORE_DATABASE'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Realtime Database
             * ------------------------------------------------------------------------
             */

            'database' => [

                /*
                 * In most of the cases the project ID defined in the credentials file
                 * determines the URL of your project's Realtime Database. If the
                 * connection to the Realtime Database fails, you can override
                 * its URL with the value you see at
                 *
                 * https://console.firebase.google.com/u/1/project/_/database
                 *
                 * Please make sure that you use a full URL like, for example,
                 * https://my-project-id.firebaseio.com
                 */

                'url' => env('FIREBASE_DATABASE_URL'),

                /*
                 * As a best practice, a service should have access to only the resources it needs.
                 * To get more fine-grained control over the resources a Firebase app instance can access,
                 * use a unique identifier in your Security Rules to represent your service.
                 *
                 * https://firebase.google.com/docs/database/admin/start#authenticate-with-limited-privileges
                 */

                // 'auth_variable_override' => [
                //     'uid' => 'my-service-worker'
                // ],

            ],

            'dynamic_links' => [

                /*
                 * Dynamic links can be built with any URL prefix registered on
                 *
                 * https://console.firebase.google.com/u/1/project/_/durablelinks/links/
                 *
                 * You can define one of those domains as the default for new Dynamic
                 * Links created within your project.
                 *
                 * The value must be a valid domain, for example,
                 * https://example.page.link
                 */

                'default_domain' => env('FIREBASE_DYNAMIC_LINKS_DEFAULT_DOMAIN'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Cloud Storage
             * ------------------------------------------------------------------------
             */

            'storage' => [

                /*
                 * Your project's default storage bucket usually uses the project ID
                 * as its name. If you have multiple storage buckets and want to
                 * use another one as the default for your application, you can
                 * override it here.
                 */

                'default_bucket' => env('FIREBASE_STORAGE_DEFAULT_BUCKET'),

            ],

            /*
             * ------------------------------------------------------------------------
             * Caching
             * ------------------------------------------------------------------------
             *
             * The Firebase Admin SDK can cache some data returned from the Firebase
             * API, for example Google's public keys used to verify ID tokens.
             *
             */

            'cache_store' => env('FIREBASE_CACHE_STORE', 'file'),

            /*
             * ------------------------------------------------------------------------
             * Logging
             * ------------------------------------------------------------------------
             *
             * Enable logging of HTTP interaction for insights and/or debugging.
             *
             * Log channels are defined in config/logging.php
             *
             * Successful HTTP messages are logged with the log level 'info'.
             * Failed HTTP messages are logged with the log level 'notice'.
             *
             * Note: Using the same channel for simple and debug logs will result in
             * two entries per request and response.
             */

            'logging' => [
                'http_log_channel' => env('FIREBASE_HTTP_LOG_CHANNEL'),
                'http_debug_log_channel' => env('FIREBASE_HTTP_DEBUG_LOG_CHANNEL'),
            ],

            /*
             * ------------------------------------------------------------------------
             * HTTP Client Options
             * ------------------------------------------------------------------------
             *
             * Behavior of the HTTP Client performing the API requests
             */

            'http_client_options' => [

                /*
                 * Use a proxy that all API requests should be passed through.
                 * (default: none)
                 */

                'proxy' => env('FIREBASE_HTTP_CLIENT_PROXY'),

                /*
                 * Set the maximum amount of seconds (float) that can pass before
                 * a request is considered timed out
                 *
                 * The default time out can be reviewed at
                 * https://github.com/kreait/firebase-php/blob/6.x/src/Firebase/Http/HttpClientOptions.php
                 */

                'timeout' => env('FIREBASE_HTTP_CLIENT_TIMEOUT'),

                'guzzle_middlewares' => [],
            ],
        ],
    ],
];
