import { getStore } from '../'

const getFlagByCountryCode = ( countryCode ) => {

	let flagSrcPath = ``
	const state = getStore().getState()
	const {
        wpBloginfo,
    } = state.app

    const { wpurl } = wpBloginfo
    flagSrcPath = `${wpurl}/wp-content/plugins/advicator/public/`
    
    if ( !countryCode ) return `${ flagSrcPath }/svg/icons/ironavirus.svg`

    let flagSrc = `${ flagSrcPath }/svg/flags/${ countryCode.toLowerCase() }.svg`
    // console.log ( `flagSrc`, flagSrc )
    return flagSrc
}

export default getFlagByCountryCode