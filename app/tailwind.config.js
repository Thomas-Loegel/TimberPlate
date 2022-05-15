module.exports = {
  content: [
    'public/themes/lohr-theme/views/**/*.twig',
    'public/themes/lohr-theme/views/blocks/*.twig',
    'public/themes/lohr-theme/views/includes/*.twig',
    'public/themes/lohr-theme/views/tempate-pages/*.twig',
    'public/themes/lohr-theme/assets/scripts/app.js'
  ],
  theme: {
    container: {
      center: true,
    },
    screens: {
      'small': { 'max': '575px' }, // => @media (max-width: 575)
      'sm': '576px', // => @media (min-width: 576)
      'md': '992px', // => @media (min-width: 992)
      'lg': '1400px' // => @media (min-width: 1400)
    },
    colors: {
    },
    spacing: {
      screen: '100vw',
      'screen-half': '50vw',
      half: '50%',
      full: '100%',
      px: '1px',
      '0': '0',
      '2': '0.125rem',
      '4': '0.25rem',
      '8': '0.5rem',
      '10': '0.625rem',
      '12': '0.75rem',
      '14': '0.875rem',
      '16': '1rem',
      '20': '1.25rem',
      '22': '1.375rem',
      '24': '1.5rem',
      '32': '2rem',
      '38': '2.375rem',
      '40': '2.5rem',
      '42': '2.625rem',
      '48': '3rem',
      '50': '3.125rem',
      '56': '3.5rem',
      '60': '3.75rem',
      '64': '4rem',
      '80': '5rem',
      '96': '6rem',
      '120': '7.5rem',
      '140': '8.75rem',
      '320': '20rem',
      '400': '25rem'
    },
    maxWidth: theme => theme('spacing'),
    fontFamily: {
      avenir_next: ['Avenir Next', 'arial', 'helvetiva', 'sans-serif'],
      base: ['Roboto', 'sans-serif']
    },
    fontSize: {
      0: '0',
      12: '0.75rem',
      14: '0.875rem',
      16: '1rem',
      18: '1.125rem',
      20: '1.25rem',
      25: '1.563rem', // h4
      30: '1.875rem', // h3
      40: '2.5rem', // h2
      68: '4.25rem', // h1
    },
    lineHeight: {
      0: '0',
      16: '1rem',
      24: '1.5rem',
      32: '2rem',
      40: '2.5rem',
      48: '3rem',
      56: '3.5rem',
      80: '5rem',
    },
    letterSpacing: {
      normal: '0',
      wide: '0.02rem',
      wider: '0.03rem'
    },
  },
  plugins: []
}
