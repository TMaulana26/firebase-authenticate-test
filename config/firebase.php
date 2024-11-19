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
                "project_id" => "test-sso-8f5db",
                "private_key_id" => "bd6484375be101e3163b8a3542afe0f40331e8ac",
                "private_key" => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC1Yt+ymfQFoz1H\n5ZKQP14n/CyWcHRl7xGfW6Dp3NH+GfKZUsW3gwKg/Z7tC9LU3H+wJY5gG8h9PD4j\nd48ZhQcdaibdptoc0AeEWyAoV8d0GmkVGAX3HEDCZi9w8AHyXGaAjOjf66/YVsQI\nSIHUy7GrIt+mF8nUGQdWCcpJf6BZP/bXLOSLVUP6gkNKdLB23mi82liKwFiWMhPN\nSH5AiB96xV7nyjh2vnOLUxNsjl+P3eG3mLK3z/72u463SN6PyOXFkNWJIesfKwFm\nC1m43i50urx6m0EbO8u6cWk/im+o9OYDkSFRzFecCI4wcetb/XFYCsxKwYGGAA05\nPU3CZMUJAgMBAAECggEAQLEo83wxKimUW6YnZccT/9LS3DzzZr+jW2DEvWQCiUwb\n2E9LMS5Kq7yJCCZlZYHXEK30X5bJJNFtoByuLv3hEb6gagFuXURcyfnuODVGb8RT\nojBVQFMVTcBAP1l6eEQ4UrTvAZ3/s3sOo52ooIqdrVncxlJJq5nZofgP67LXL70k\nhE1Tzs2NgTJ8TzNWlEBEczWevrV+Ly4Qo6TVsFMyVuDSHglLMy/jWWhBacQA8/+U\nqQ6rgiY4KlnLCJ8rYUJ5VEj9wAFrN9GcUKNP86oax9F1fOR0utQMWYsXYedGvLdh\n2nQLv8zRAdzEfx94wVLhbyXADGyF8fAkz2XgaPebGQKBgQDkje+xNtkF5A5d/2Ni\nh/UBRegsu9Po+qvsNI0klNHdPtgGxqJP6WO1ZmPEGrKyX6NisADzYt+EWoUUtMJm\nZiPlExIPP0VdFuSyJXEt+gNT5s+pdZGeGDq4DujJOa4Jkbz4ayg8HDFu/Px3b0HN\neDeNM+ecg3fdbe+Q3E/J1K+xjwKBgQDLKuy4tMkJduYthDLom1BvpAwE5ugWzG84\n8sQNwiH07oDW54f4Avh+kA2SuGDe+ksXvfp8zF3eErey9R4MvMemRDOehUaxBb8c\nx//HvW4znqEAEXro9hJpla3PIQP5OXngeetmtihRAvT5u21oSo3DWXv5oNEYclUm\nFeImH5sj5wKBgQCPiAeALiaqiWbwZwM+DI2zx/gfp7FT/aBcTUBaOc919xJpZvLl\n5ncEo5GBxRZ16JPN1SQztOMT1lj/AOmYrwpZwNk1lBF2fXsP2W2zZvASD8BX9oqF\nU0gE8PAF9uAyCEE5bOounbH5tozCYK9dXuLcHT2V0AZFm9W4DnNZF+ViRwKBgExR\n7KkaKKcohiE1FxawOZAmtOkmgKsH0wQ2lhWBBtaGvdl9EmPFYenRXXfvUVyR86GQ\nmUdGUkC5EU7lq4snY2x/FFEJSdv4B6ndK6Wx8HLttRdceaqHvbTyKF+1zFNUFweP\nZTGpXg3IqZQip1/VGdn3hI3qroGbeYccE1804kejAoGAVejI6QWr/VKtIyAoir8i\n9fwHRdUHEpVhca0EU4lFrjMDIMMeq0GVwBZEK5VADRJtYGquu1ub1f8xopT9PswW\ncW8DuT526bpNgdev5+Wcw0LnPDZeokpYABdOQ3qT59Z6TAIWd2o0CscDfWyE1pAA\nGhINFhkDfB1lEiOzZHQBtK4=\n-----END PRIVATE KEY-----\n",
                "client_email" => "firebase-adminsdk-75vxk@test-sso-8f5db.iam.gserviceaccount.com",
                "client_id" => "113315606711564662094",
                "auth_uri" => "https://accounts.google.com/o/oauth2/auth",
                "token_uri" => "https://oauth2.googleapis.com/token",
                "auth_provider_x509_cert_url" => "https://www.googleapis.com/oauth2/v1/certs",
                "client_x509_cert_url" => "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-75vxk%40test-sso-8f5db.iam.gserviceaccount.com",
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
