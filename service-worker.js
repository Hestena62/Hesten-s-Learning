const CACHE_NAME = 'hestens-learning-v1';
const ASSETS_TO_CACHE = [
  '/',
  '/index.php',
  '/manifest.json',
  '/Images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png',
  // Add other critical local scripts/styles here if they exist, e.g.:
  // '/css/style.css', 
  // '/js/app.js'
];

// Install Event: Caches critical assets immediately
self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      console.log('[Service Worker] Caching pre-defined assets');
      return cache.addAll(ASSETS_TO_CACHE);
    })
  );
  self.skipWaiting();
});

// Activate Event: Cleans up old caches
self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys().then((keyList) => {
      return Promise.all(
        keyList.map((key) => {
          if (key !== CACHE_NAME) {
            console.log('[Service Worker] Removing old cache', key);
            return caches.delete(key);
          }
        })
      );
    })
  );
  self.clients.claim();
});

// Fetch Event: The Strategy
self.addEventListener('fetch', (event) => {
  // 1. For HTML pages (PHP), use Network First, then Cache
  if (event.request.headers.get('accept').includes('text/html')) {
    event.respondWith(
      fetch(event.request)
        .then((response) => {
          return caches.open(CACHE_NAME).then((cache) => {
            cache.put(event.request, response.clone());
            return response;
          });
        })
        .catch(() => {
          return caches.match(event.request).then((response) => {
            if (response) return response;
            // Optional: Return a custom offline.php page if you create one
            // return caches.match('/offline.php');
          });
        })
    );
  } 
  // 2. For images, fonts, and static assets, use Cache First, then Network
  else {
    event.respondWith(
      caches.match(event.request).then((response) => {
        return response || fetch(event.request).then((networkResponse) => {
            return caches.open(CACHE_NAME).then((cache) => {
                // Cache new assets dynamically as they are fetched
                cache.put(event.request, networkResponse.clone());
                return networkResponse;
            });
        });
      })
    );
  }
});