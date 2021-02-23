const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },

            container: {
                center: "true",
                padding: "1rem",
            },

            customForms: (theme) => ({
                default: {
                    input: {
                        borderRadius: theme("borderRadius.lg"),
                        borderColor: theme("colors.gray.300"),
                        "&:focus": {
                            backgroundColor: theme("colors.white"),
                        },
                    },
                    select: {
                        borderRadius: theme("borderRadius.lg"),
                        boxShadow: theme("boxShadow.default"),
                    },
                    checkbox: {
                        width: theme("spacing.6"),
                        height: theme("spacing.6"),
                    },
                    textarea: {
                        borderRadius: theme("borderRadius.lg"),
                        borderColor: theme("colors.gray.300"),
                    },
                },
            }),
        },
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
            borderWidth: ["responsive", "last"],
        },
    },
    purge: {
        content: [
            "./app/**/*.php",
            "./resources/**/*.html",
            "./resources/**/*.js",
            "./resources/**/*.jsx",
            "./resources/**/*.ts",
            "./resources/**/*.tsx",
            "./resources/**/*.php",
            "./resources/**/*.vue",
            "./resources/**/*.twig",
        ],
        options: {
            defaultExtractor: (content) =>
                content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/custom-forms"),
    ],
};
