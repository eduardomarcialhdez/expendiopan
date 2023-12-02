var staticCacheName = "expendio-static";
var inmutableCacheName = "expendio-inmutable";

const APP_SHELL = [
    '/images/icons/icon-72.png',
    '/images/icons/icon-96.png',
    '/images/icons/icon-128.png',
    '/images/icons/icon-192.png',
    '/images/icons/icon-384.png',
    '/images/icons/icon-512.png',
    '/',
    '/productos',
    '/nosotros',
    '/offline',
    '/politica',
    '/login',
];

const APP_SHELL_INMUTABLE = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
    'https://kit.fontawesome.com/cc064abe75.js',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
];

self.addEventListener("install", event => {
    this.skipWaiting();
    const cacheStatic = caches.open(staticCacheName).then(cache => {
        return cache.addAll(APP_SHELL);
    });

    const cacheInmutable = caches.open(inmutableCacheName).then(cache => {
        return cache.addAll(APP_SHELL_INMUTABLE);
    });

    event.waitUntil(Promise.all([cacheStatic, cacheInmutable]))
});

self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("cache-")))
                    .filter(cacheName => (cacheName !== inmutableCacheName && cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

self.addEventListener('fetch', event => {
    const requestUrl = new URL(event.request.url);

    if (APP_SHELL.includes(requestUrl.pathname)) {
        event.respondWith(
            caches.open(staticCacheName).then(cache => {
                return cache.match(event.request).then(responseFromCache => {
                    return responseFromCache || fetch(event.request).then(responseFromNetwork => {
                        cache.put(event.request, responseFromNetwork.clone());
                        return responseFromNetwork;
                    });
                });
            }).catch(() => {
                return caches.match('/offline');
            })
        );
    } else {
        const cacheName = 'cache-dyna-' + requestUrl.pathname;
        event.respondWith(
            fetch(event.request).then(responseFromNetwork => {
                return caches.open(cacheName).then(cache => {
                    cache.put(event.request, responseFromNetwork.clone());
                    return responseFromNetwork;
                });
            }).catch(() => {
                return caches.open(cacheName).then(cache => {
                    return cache.match(event.request).then(responseFromCache => {
                        return responseFromCache || fetch(event.request).then(responseFromNetwork => {
                            cache.put(event.request, responseFromNetwork.clone());
                            return responseFromNetwork;
                        });
                    });
                }).catch(() => {
                    return caches.match('/offline');
                });
            })
        );
    }
});
