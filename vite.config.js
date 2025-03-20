import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                "resources/template/assets/vendor/bootstrap/css/bootstrap.min.css",
                "resources/template/assets/vendor/bootstrap-icons/bootstrap-icons.css",
                "resources/template/assets/vendor/boxicons/css/boxicons.min.css",
                "resources/template/assets/vendor/glightbox/css/glightbox.min.css",
                "resources/template/assets/vendor/remixicon/remixicon.css",
                "resources/template/assets/vendor/swiper/swiper-bundle.min.css",
                "resources/template/assets/css/style.css",

                'resources/js/app.js',
                "resources/template/assets/vendor/purecounter/purecounter_vanilla.js",
                "resources/template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js",
                "resources/template/assets/vendor/glightbox/js/glightbox.min.js",
                "resources/template/assets/vendor/isotope-layout/isotope.pkgd.min.js",
                "resources/template/assets/vendor/swiper/swiper-bundle.min.js",
                "resources/template/assets/vendor/waypoints/noframework.waypoints.js",
                "resources/template/assets/vendor/php-email-form/validate.js",
                "resources/template/assets/js/main.js",
            ],
            refresh: [`resources/views/**/*`],
        }),
        tailwindcss(),
    ],
    server: {
        cors: true,
    },
});
