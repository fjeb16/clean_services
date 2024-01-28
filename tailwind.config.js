import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                principal: ["Open Sans", "sans-serif"],
                numeros: ["Rubik", "sans-serif"],
            },
            colors: {
                amarilloclarito: "#fef08a",
                verdelima: "#a3e635",
                verdeclarito: "#bef264",
                yellow: "#fef08a",
                green: "#16a34a",
                "cyan ": "#06b6d4",
                azuloscuro: "#001C30",
                azulprueba1: "#005E7C",
                azulslider: "#001c307d",
            },
            backgroundImage: {
                "cerrar-menu": "url('../images/cerrar.png')",
                "abrir-menu": "url('../images/menu.png')",
            },
        },
    },

    plugins: [forms],
};
