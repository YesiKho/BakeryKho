/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [],
  theme: {
    extend: {},
  },
  plugins: [],
};

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./src/**/*.{html,js,php}', './*.{html,js,php}'],
  theme: {
    extend: {
      colors: {
        primary: '#32bdea',
        secondary: '#ff7e41',
        success: '#78c091',
        warning: '#ff9770',
        danger: '#e08db4',
        info: '#7ee2ff',

        /* CSS HSL */
        linen: 'hsla(26, 100%, 95%, 1)',
        desert_sand: 'hsla(24, 43%, 76%, 1)',
        sage: 'hsla(60, 12%, 60%, 1)',
        buff: 'hsla(21, 43%, 65%, 1)',
        engineering_orange: 'hsla(0, 100%, 41%, 1)',
        cardinal: 'hsla(355, 54%, 44%, 1)',
        bistre: 'hsla(25, 51%, 13%, 1)',
        chinese_violet: 'hsla(325, 16%, 45%, 1)',
      },
    },
  },
  plugins: [],
};
