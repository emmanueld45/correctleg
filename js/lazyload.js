

function lazyload(threshold){
    let threshold_level;
    if(threshold){
    threshold_level = threshold_level;
    }
let options = {
    root: null,
    rootMargin: '0px',
    //  threshold: 0.25
    threshold: 0
}

let callback = (entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            let imageUrl = entry.target.getAttribute('data-src');
            //console.log(imageUrl)
            if (imageUrl) {
                //console.log(imageUrl)
                entry.target.src = imageUrl;
                observer.unobserve(entry.target);
            }
        }

        // if (entry.isIntersecting) {
        //     console.log("is intersecting")
        //     let imageUrl = entry.target.getAttribute('data-src');
        //     console.log(imageUrl)
        //     entry.target.src = imageUrl;
        //     console.log(entry.target.src)
        //    console.log(entry.target.className)
        // }

    })
}
observer = new IntersectionObserver(callback, options);

var lazy_loaded_images = document.querySelectorAll(".lazy-loaded-img");

lazy_loaded_images.forEach(image => {
    observer.observe(image)
})

}