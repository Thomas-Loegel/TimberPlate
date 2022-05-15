/**
 * Règles communes pour Vue et JS
 */
const commonRules = {
  // Force des espaces consistants dans les parenthèses
  'space-in-parens': ['error', 'never'],
  // pas de dernière virgule
  'comma-dangle': ['error', 'never'],
  // Force un espace avant et après un mot clé, if, else etc
  'keyword-spacing': ['error'],
  // Force un espace dans les objets
  'object-curly-spacing': ['error', 'always'],
  // imbrication des {} (if/else/try/catch/etc...) unique
  'brace-style': 'error',
  // triple = obligatoire
  eqeqeq: 'error',
  // espaces entre opérateurs
  'space-infix-ops': ['error'],
  // Force les propriétés à être espacées Ex: { hello: 'World' } -> espace après le double point
  'key-spacing': ['error', { afterColon: true }]
}

/**
 * JS natif
 */
const jsRules = {
  indent: ['error', 2, { SwitchCase: 1 }],
  // Force les commentaires multi-lignes du type starred-block
  'multiline-comment-style': ['error', 'starred-block'],
  // Préfère les template string que les concaténations
  'prefer-template': 'error',
  'curly': ['error', 'all'], // {} toujours requises
  'quote-props': 'off', // controle des quotes autour des propriétés des objets
  'no-trailing-spaces': 'error', // pas d'espaces vides
  semi: ['error', 'never'], // pas de ";" à la fin des lignes
  'object-shorthand': ['error', 'always'],
  // les const, c'est la vie
  'prefer-const': [
    'error',
    {
      destructuring: 'all',
      ignoreReadBeforeAssign: false
    }
  ],
  // pas d'espaces avant les () d'une fonction
  'space-before-function-paren': [
    'error',
    {
      anonymous: 'never',
      named: 'never',
      asyncArrow: 'always'
    }
  ]
}
