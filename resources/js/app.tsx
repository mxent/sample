import '../css/app.css';
import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';
import { ThemeProvider } from '@/components/theme-provider';

const appName = import.meta.env.VITE_APP_NAME || 'Sample';

const components = import.meta.glob([
    '/resources/js/pages/**/*.tsx',
    '/resources/js/pages/**/*.jsx',
    '/vendor/mxent/*/resources/js/**/*.tsx',
    '/vendor/mxent/*/resources/js/**/*.jsx',
]);

createInertiaApp({
    title: title => (title ? `${title} - ${appName}` : appName),
    resolve: name => {
        return components[`${name}.tsx`]();
    },
    setup({ el, App, props }) {
        createRoot(el).render(
            <>
                <ThemeProvider defaultTheme="dark" storageKey="vite-ui-theme">
                    <App {...props} />
                </ThemeProvider>
            </>
        );
    },
});