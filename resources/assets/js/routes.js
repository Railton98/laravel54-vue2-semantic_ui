import Welcome from './components/welcome/Welcome'
import CountryIndex from './components/countries/CountryIndex'

export const routes = [
    {
        path: '*',
        component: Welcome
    },
    {
        path: '/welcome',
        component: Welcome
    },
    {
        path: '/country',
        component: CountryIndex
    },
]
