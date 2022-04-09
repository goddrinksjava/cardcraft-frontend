module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
        },
    },
    variants: {
        display: ['group-hover']
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
    ],
}
