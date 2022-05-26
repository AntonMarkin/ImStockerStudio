<script src="{{asset('js/cookieconsent.min.js')}}"></script>
<script>
    window.CookieConsent.init({
        // More link URL on bar
        modalMainTextMoreLink: null,
        // How lond to wait until bar comes up
        barTimeout: 1000,
        // Look and feel
        theme: {
            barColor: '#5C81E0',
            barTextColor: '#FFF',
            barMainButtonColor: '#FFF',
            barMainButtonTextColor: '#4A629F',
            modalMainButtonColor: '#4A629F',
            modalMainButtonTextColor: '#FFF',
        },
        language: {
            // Current language
            current: 'en',
            locale: {
                en: {
                    barMainText: 'This website uses cookies to ensure you get the best experience on our website.',
                    barLinkSetting: 'Cookie Settings',
                    barBtnAcceptAll: 'Accept all cookies',
                    modalMainTitle: 'Cookie settings',
                    modalMainText: 'Cookies are small piece of data sent from a website and stored on the user\'s computer by the user\'s web browser while the user is browsing. Your browser stores each message in a small file, called cookie. When you request another page from the server, your browser sends the cookie back to the server. Cookies were designed to be a reliable mechanism for websites to remember information or to record the user\'s browsing activity.',
                    modalBtnSave: 'Save current settings',
                    modalBtnAcceptAll: 'Accept all cookies and close',
                    modalAffectedSolutions: 'Affected solutions:',
                    learnMore: 'Learn More',
                    on: 'On',
                    off: 'Off',
                }
            }
        },
        // List all the categories you want to display
        categories: {
            // Unique name
            // This probably will be the default category
            necessary: {
                // The cookies here are necessary and category cant be turned off.
                // Wanted config value  will be ignored.
                needed: true,
                // The cookies in this category will be let trough.
                // This probably should be false if not necessary category
                wanted: true,
                // If the checkbox is on or off at first run.
                checked: true,
                // Language settings for categories
                language: {
                    locale: {
                        en: {
                            name: 'Strictly Necessary Cookies',
                            description: 'This cookies helps you stay logged in, save language settings',
                        },
                    }
                }
            },
            // Unique name
            // This probably will be the default category
            analytics: {
                // The cookies here are necessary and category cant be turned off.
                // Wanted config value  will be ignored.
                needed: false,
                // The cookies in this category will be let trough.
                // This probably should be false if not necessary category
                wanted: false,
                // If the checkbox is on or off at first run.
                checked: false,
                // Language settings for categories
                language: {
                    locale: {
                        en: {
                            name: 'Analytics',
                            description: 'These trackers help us to measure traffic and analyze your behavior with the goal of improving our service.',
                        },
                    }
                }
            }
        },
        // List actual services here
        services: {
            // Unique name
            ym: {
                // Existing category Unique name
                // This example shows how to block Google Analytics
                category: 'analytics',
                // Type of blocking to apply here.
                // This depends on the type of script we are trying to block
                // Can be: dynamic-script, script-tag, wrapped, localcookie
                type: 'dynamic-script',
                // Only needed if "type: dynamic-script"
                // The filter will look for this keyword in inserted scipt tags
                // and block if match found
                search: 'mc.yandex',
                // List of known cookie names or Regular expressions matching
                // cookie names placed by this service.
                // These willbe removed from current domain and .domain.
                cookies: [
                    {
                        // Regex matching cookie name.
                        name: /^_ym/,
                        domain: `.imstocker.com`
                    }
                ],
                language: {
                    locale: {
                        en: {
                            name: 'Yandex Metrika'
                        },
                    }
                }
            }
        }
    });
</script>
