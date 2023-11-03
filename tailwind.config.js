/** @type {import('tailwindcss').Config} */
const withMT = require("@material-tailwind/html/utils/withMT");
module.exports = withMT({
  content: [
    "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
  ],
  daisyui: {
    themes: false,
  },
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin'),
    require("daisyui"),
  ],
  
})

