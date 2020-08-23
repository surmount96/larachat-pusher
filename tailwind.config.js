module.exports = {
    theme: {
        colors: {
            success: '#00D67D',
            negative: '#CC2E2E',
            pending: '#FFC82C',
            black: '#000000',
            white: '#FFFFFF',
            transparent: 'transparent',
            warning: '#EBA350',
            sky:{
                blue: '#31AEED',
            },
            blue: {
                default: '#2D9CDB',
                100: '#EBF8FE',
                700: '#2872BE',
                base: '#032041',
                dark: '#1956b4',
                deep: '#36485F',
                deeper: '#03045E',
                pale: '#E8F7FF',
                light: '#48586D',
            },
            yellow: {
                default: '#FFC82C',
                dark: '#F8B700',
                light: '#FFD55F',
                pale: '#FFFADE',
                deep: '#D4CB2C',
            },

            orange: {
                default: '#F2994A',
                light: '#ffd6a5',
            },

            green: {
                default: '#128C7E',
                dark: '#188F32',
                deep: '#3D8962',
                100: '#69CE7E',
                light: '#29EB7F',
                pale: '#DEFFE5',
            },

            red: {
                default: '#EC5757',
                dark: '#A10000',
                light: '#D75C5C',
                pale: '#FFFADE',
            },

            gray: {
                100: '#f9f9f9',
                200: '#444854',
                300: '#828282',
                400: '#F9F9F9',
                500: '#cccccc',
                dark: '#4D575E',
                light: '#A6AAB4;',
                grayer: '#899296',
                default:'#f9f9f9'
            },
            purple:{
                default: '#E964BE',
                dark: '#8765DF'
            },
            pt:'#70CF98',
            fs:'#EB5758',
            sm:'#57CCF629',

            smoke: {
                dark: '#9DA8B6',
                100: '#C0CCDA',
                200: '#D3DCE6',
                300: '#E0E6ED',
            },
            dark: '#252525',
            snow: {
                100: '#E5E9F2',
                200: '#EEF1F5',
                300: '#FAFAFA',
            },
        },

        opacity: {
            0: '0',
            10: '0.1',
            20: '0.2',
            30: '0.3',
            40: '0.4',
            50: '0.5',
            60: '0.6',
            70: '0.7',
            80: '0.8',
            90: '0.9',
            100: '1',
        },

        screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
            '2xl': '1440px',
        },

        fontSize: {
            subtext: '7px',
            default: '16px',
            large: '17px',
            medium: '.85rem',
            'body-2': '15px',
            h1: '48px',
            h2: '40px',
            h3: '32px',
            h4: '20px',
        },

        lineHeight: {
            22: '22px',
            26: '26px',
            28: '28px',
            33: '33px',
            42: '42px',
            52: '52px',
            62: '62px',
        },

        borderColor: (theme) => ({
            default: theme('color.gray', 'currentColor'),
            gray: {
                default: '#F1F1F1',
                100: '#ccccc'
            },
            lightGrey: '#A6AAB4',
            orange: '#EBA350',
            green: '#5FCAAF',
            blue: {
                default: '#31AEED',
                500: '#4299E1',
            },
        }),
        fontFamily: {
            display: ['Gilroy', 'sans-serif'],
            body: ['Graphik', 'sans-serif'],
        },
        borderWidth: {
            default: '1px',
            '0': '0',
            '2': '2px',
            '4': '4px',
        },
        extend: {
            colors: {
                cyan: '#9cdbff',
            },
            spacing: {
                '96': '24rem',
                '128': '32rem',
            }
        }
    },
    variants: {
        appearance: ['responsive'],
        backgroundColor: ['responsive', 'hover', 'focus'],
        tableLayout: ['responsive', 'hover', 'focus'],
        fill: [],
    },
}
