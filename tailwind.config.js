// tailwind.config.js
module.exports = {
  purge: {
    enabled: true,
    content: ['./**/*.php'],
   },
  theme: {
    extend: {
      screens: {
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1280px',
        '2xl': '1680px',
        '3xl': '1920px',
      },
      colors: {
        'primary': '#28F0F0',
        'secondary': '#ffffff',
        'secondary-dark': '#5E5E5E',
        'tertiary': '#010101',
        'tertiary-light': '#121212',
      },
      fontSize: {
        '1.5xl': ['1.3rem', { lineHeight: '1.5' }],
        '5.5xl': ['3.5rem', { lineHeight: '1.5' }],
      },
      lineHeight: {
        'relaxed-2x': '1.75rem',
        'relaxed-3x': '2rem',
      },
      width: {
        '36': '9rem',
        '40': '10rem',
        '60': '15rem',
        '72': '18rem',
        '80': '20rem',
        '96': '24rem',
        '108': '27rem',
        '112': '28rem',
        '128': '32rem',
        '144': '36rem',
        '192': '48rem',
        '224': '56rem',
        '256': '64rem',
      },
      height: {
        '2px': '2px',
        '36': '9rem',
        '40': '10rem',
        '60': '15rem',
        '72': '18rem',
        '80': '20rem',
        '96': '24rem',
        '108': '27rem',
        '112': '28rem',
        '128': '32rem',
        '144': '36rem',
        '192': '48rem',
        '224': '56rem',
        '256': '64rem',
        '20vh': '20vh',
        '25vh': '25vh',
        '37vh': '37.5vh',
        '40vh': '40vh',
        '50vh': '50vh',
        '56vh': '56.25vh',
        '65vh': '65vh',
        '75vh': '75vh',
        '85vh': '85vh',
        '95vh': '95vh',
      },
      maxHeight: {
        '72': '18rem',
        '96': '24rem',
      },
      padding: {
        '28': '7rem',
        '80': '20rem',
        '96': '24rem',
        '112': '28rem',
        '128': '32rem',
      },
      margin: {
        '28': '7rem',
        '52': '13rem',
        '72': '18rem',
        '80': '20rem',
        '96': '24rem',
        '196': '24rem',
        '112': '28rem',
        '128': '32rem',
      },
      inset: {
        '50p': 'calc(50vh - 10rem)',
        '5p': 'calc(5vh - 1rem)',
      },
      fontFamily: {
        'body': ['Favorit Pro'],
        'header': ['Monaako Script'],
      },
      transitionDuration: {
        '0': '0ms',
        '150': '150ms',
        '250': '250ms',
      },
      transitionProperty: {
        'height': 'height',
      },
      transformOrigin: {
        'custom': '0.55rem',
      },
      overflow: {
        'overlay': 'overflow: overlay;',
      },
      opacity: {
        '80': '0.8',
      },
      keyframes: {
        appear: {
          '0%, 50%': { opacity: '0' },
          '100%': { opacity: '1.0' },
        }
      },
      animation: {
        appear: 'appear 1s ease-in-out 1',
      }
    },
  },
  variants: {
    extend: {
      margin: ['even'],
    },
    padding: ['responsive', 'last', 'hover', 'focus', 'even'],
  },
}
