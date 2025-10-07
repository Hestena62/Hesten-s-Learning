// Check if Workbox is available
if (workbox) {
  console.log('Workbox is loaded! 🎉');

  // Precaching assets for offline use
  workbox.precaching.precacheAndRoute([
    { url: '/offline.html', revision: '1' },
    { url: '/css/style.css', revision: '1' },
    { url: '/js/main.js', revision: '1' },
    { url: '/images/logo.png', revision: '1' }
  ]);

  // Use a StaleWhileRevalidate strategy for images
  // This serves a cached image instantly and updates the cache in the background
  workbox.routing.registerRoute(
    ({ request }) => request.destination === 'image',
    new workbox.strategies.StaleWhileRevalidate({
      cacheName: 'images-cache',
      plugins: [
        new workbox.expiration.ExpirationPlugin({
          maxEntries: 60,
          maxAgeSeconds: 30 * 24 * 60 * 60, // 30 Days
        }),
      ],
    })
  );

  // Use a CacheFirst strategy for CSS and JavaScript files
  // This is good for static assets that don't change often
  workbox.routing.registerRoute(
    ({ request }) => request.destination === 'style' || request.destination === 'script',
    new workbox.strategies.CacheFirst({
      cacheName: 'static-resources-cache',
    })
  );

  // Implement the offline fallback page
  const navigationRoute = new workbox.routing.NavigationRoute(
    new workbox.strategies.NetworkOnly({
      plugins: [
        new workbox.routing.NavigationRoute.NavigationFallback({
          fallbackURL: '/offline.html',
        })
      ]
    })
  );
  workbox.routing.registerRoute(navigationRoute);

} else {
  console.log('Workbox did not load. 😢');
}