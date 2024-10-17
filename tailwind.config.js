/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors:{
            'backgorund':'#011642',
            'hover':'#D8A32A',
            'giris':'#021233',
            'bg':'#011339',
        },
        fontFamily: {
            abril: ['"Abril Fatface"', "serif"],
            poppins: ['"Poppins"', "sans-serif"],
        },
        borderColor:{
            'backgorund':'#011642',
            'giris':'#021233',
            'bg':'#011339',
            'white-opacity-50': 'rgba(255, 255, 255, 0.5)',
        },
        zIndex: {
            '100': '100',
            '60': '60',
          }
    },
  },
  plugins: [],
}

