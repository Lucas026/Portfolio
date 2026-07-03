module.exports = {
  darkMode: 'class',
  content: [
    "./assets/**/*.js",
    "./assets/**/*.css",
    "./templates/**/*.html.twig",
    "./vendor/easycorp/easyadmin-bundle/**/*.php"
  ],
  theme: {
    extend: {
      colors: {
        background: "#0f172a",
        panel: "#111827",
        border: "#1f2937",
        accent: "#3b82f6"
      }
    },
  },
  plugins: [],
};