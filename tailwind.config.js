/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
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
}
