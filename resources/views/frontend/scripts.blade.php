 <!-- Bootstrap jS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <!-- Owl carousel JS -->
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
    </script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
    </script>

    <script src="{{asset('js/globalVar.js')}}"></script>

    <script>
        $(document).ready(function () { // It's good practice to wrap your Owl Carousel initialization in document.ready
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 3, // Default for larger screens
                loop: true,
                margin: 40,
                autoplay: false,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        margin: 10,
                        dots: true
                    },
                    480: {
                        items: 2,
                        margin: 20,
                        dots: true
                    },
                    768: {
                        items: 2,
                        margin: 30,
                        dots: false
                    },
                    820: {
                        items: 2,
                        margin: 30,
                        dots: false
                    },
                    1024: {
                        items: 3,
                        margin: 40,
                        dots: false
                    }
                }
            });
        });
    </script>