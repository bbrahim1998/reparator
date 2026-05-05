/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                primario: '#3A9AFF',
                secundario: '#261CC1',
                fondo: '#1C0770',
                texto: '#ffffff',
                acento: '#F1FF5E',
            },
            fontFamily: {
                titulos: ['Montserrat', 'sans-serif'],
                parrafos: ['Roboto', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
