<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test2</title>


    <style>
        img {
            width: 300px;
            height: 300px;
            margin-bottom: 500px;
        }
    </style>
</head>

<body>


    <img data-src="../banners/banner1.jpg" alt="" class="lazy-loaded-img">
    <img data-src="../banners/banner2.jpg" alt="" class="lazy-loaded-img">
    <img data-src="../banners/banner3.jpeg" alt="" class="lazy-loaded-img">
    <img data-src="../banners/banner4.jpeg" alt="" class="lazy-loaded-img">
    <img data-src="../banners/banner5.jpeg" alt="" class="lazy-loaded-img">
    <img data-src="../banners/banner6.jpeg" alt="" class="lazy-loaded-img">



    <script>
        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.25
        }

        let callback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && entry.target.className === 'lazy-loaded-img') {
                    let imageUrl = entry.target.getAttribute('data-src');
                    if (imageUrl) {
                        entry.target.src = imageUrl;
                        observer.unobserve(entry.target);
                    }
                }
            })
        }
        observer = new IntersectionObserver(callback, options);

        var lazy_loaded_images = document.querySelectorAll(".lazy-loaded-img");
        console.log(lazy_loaded_images)
        lazy_loaded_images.forEach(image => {
            observer.observe(image)
        })
    </script>



</body>

</html>