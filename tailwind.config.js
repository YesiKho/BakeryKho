/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
  content: ['*.{html,js,php}', './**/**/**/*.{html,js,php}', './**/**/*.{html,js,php}', './**/*.{html,js,php}'],
  theme: {
    extend: {
      colors: {
        primary: '#32bdea',
        textPrimary: '#676e8a',
        secondary: '#ff7e41',
        success: '#78c091',
        warning: '#ff9770',
        error: '#ef4444',
        danger: '#e08db4',
        info: '#7ee2ff',
        linen: 'hsla(26, 100%, 95%, 1)',
        desertSand: 'hsla(24, 43%, 76%, 1)',
        sage: 'hsla(60, 12%, 60%, 1)',
        buff: 'hsla(21, 43%, 65%, 1)',
        engineeringOrange: 'hsla(0, 100%, 41%, 1)',
        cardinal: 'hsla(355, 54%, 44%, 1)',
        bistre: 'hsla(25, 51%, 13%, 1)',
        chineseViolet: 'hsla(325, 16%, 45%, 1)',
      },
      fontFamily: {
        poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [],
};
