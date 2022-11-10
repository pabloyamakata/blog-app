/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/views/vendor/pagination/*.blade.php"
  ],
  safelist: [
    {
      pattern: /bg-(red|green|blue|purple|indigo|orange|yellow)-600/
    }
  ],
  theme: {
    extend: {},
  },
  plugins: [require('@tailwindcss/forms')],
  corePlugins: {
    container: false,
  },
}
