/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./landing/*.{html,js}"],
  theme: {
    fontFamily:{
      'MyFont':['Roboto']
    },

    colors:{
      'col1':'#fdc921',
      'col2':'#6799c0',
      'col3':'#feb25f',
      'col4':'#ffffff',
      'col5':'#1b4965',
    },
    extend: {},
  },
  plugins: [],
}

