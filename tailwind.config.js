import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Brand
                brand: "var(--color-brand)",
                // Primary
                primary5: "var(--color-primary5)",
                primary4: "var(--color-primary4)",
                primary: "var(--color-primary)",
                primary2: "var(--color-primary2)",
                primary1: "var(--color-primary1)",
                // Neutral
                neutral5: "var(--color-neutral5)",
                neutral4: "var(--color-neutral4)",
                neutral: "var(--color-neutral)",
                neutral2: "var(--color-neutral2)",
                neutral1: "var(--color-neutral1)",
                // Secondary
                secondary: "var(--color-secondary)",
                // Success
                success5: "var(--color-success5)",
                success4: "var(--color-success4)",
                success: "var(--color-success)",
                success2: "var(--color-success2)",
                success1: "var(--color-success1)",
                // Warning
                warning5: "var(--color-warning5)",
                warning4: "var(--color-warning4)",
                warning: "var(--color-warning)",
                warning2: "var(--color-warning2)",
                warning1: "var(--color-warning1)",
                // Danger
                danger5: "var(--color-danger5)",
                danger4: "var(--color-danger4)",
                danger: "var(--color-danger)",
                danger2: "var(--color-danger2)",
                danger1: "var(--color-danger1)",
                // Dark
                dark: "var(--color-dark)",
            },

            dropShadow: {
                md: "0 0 4px rgba(0, 0, 0, 0.25)",
            },
            borderWidth: {
                6: "6px",
            },
        },
    },

    plugins: [forms, require("flowbite/plugin")],
};