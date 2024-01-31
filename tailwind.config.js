import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/* @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#e2702e",
                    800: "#e2702ec2",
                    500: "#e2702e9f",
                    300: "#e2702e6c",
                    200: "#e2702e62",
                },
            },
        },
    },

    plugins: [forms, typography],
};
