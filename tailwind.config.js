/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.html.twig',
    './assets/**/*.js',
  ],
  theme: {
    extend: {
      maxWidth: {
        'custom-600': '600px',
      },
    },
  },
  plugins: [],
}

