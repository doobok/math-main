module.exports = {
  purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/js/**/*.vue',
    ],
  darkMode: false, // or 'media' or 'class'
  theme: {
      latex: {
          footnotes: true,
          syntax: true,
      },
  },
  variants: {
    extend: {},
  },
  plugins: [
    // require("latex-tailwind")
  ],
}
