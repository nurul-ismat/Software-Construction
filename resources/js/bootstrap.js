window._ = require("lodash");

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");

    require("slick-carousel");
    require("jqueryui");
    require("bootstrap");
    require("./dropzone.min");
    require("./main-js");
    require("./script");



    //  ============= plugin init start ================

    // slick start
    $(".slick").slick({
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        fade: true,
        speed: 2000,
        cssEase: "ease-in-out",
        touchThreshold: 100,
        // pauseOnHover: true,
        draggable: true,
        prevArrow: "<img class='a-left control-c prev slick-prev' src='/images/front_image/icon/prev.png'>",
        nextArrow: "<img class='a-right control-c next slick-next' src='/images/front_image/icon/next.png'>"
    });


    //  ============= plugin init end ================
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// slick end

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
