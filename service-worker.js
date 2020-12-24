var cacheName = "v1";

var cacheAssets = [
    "banners/bannern3.jpg",
    "banners/bannern5.jpg",
    "banners/bannern6.jpg",
    "banners/bannern7.jpg",
    "banners/banner4.jpeg",
    "banners/banner1.jpg",
    "banners/banner8.jpg",
    "banners/banner9.jpg",
    "banners/banner10.jpg"
];

// var site_images = document.getElementsByTagName("img");
// for(i=0; i<site_images.length;i++){
//     var src = site_images[i].getAttribute("data-src");
//     console.log(src)
//     if(src != null){
//         cacheAssets.push(src);
//     }
// }

console.log(cacheAssets)


// Call install event
self.addEventListener('install', (e)=>{
    console.log('Service Worker installed')
    e.waitUntil(
        caches
        .open(cacheName)
        .then(cache => {
            console.log('Service Worker: Caching files')
            cache.addAll(cacheAssets)
        })
        .then(()=>self.skipWaiting())
    )
})

// Call activate event
self.addEventListener('activate', (e)=>{
    console.log('Service Worker activated')
    // remove unwanted caches
    e.waitUntil(
        caches.keys().then(cacheNames =>{
            return Promise.all(
                cacheNames.map(cache =>{
                    if(cache !== cacheName){
                        console.log('Service Worker: clearing old cache');
                        return caches.delete(cache);
                    }
                })
            )
        })
    )
})


// Call fetch event
self.addEventListener('fetch', (e)=>{
    console.log('Service Worker: fetching')
    e.respondWith(fetch(e.request).catch(()=>caches.match(e.request)))
})