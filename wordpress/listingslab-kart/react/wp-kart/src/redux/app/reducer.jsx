import pJSON from '../../../package.json'
import { createReducer } from '@reduxjs/toolkit'
import {
  error,
  appMenuOpen,
  fullScreen,
  themeMode,
} from "./actions"

const devWpBloginfo = {
  name: `Advicator`,
  description: `Plugin Admin`,
  wpurl: `https://woocommerce-368502-1795531.cloudwaysapps.com/`,
  admin_email: `listingslab@gmail.com`,
  icon: `https://woocommerce-368502-1795531.cloudwaysapps.com/wp-content/uploads/2021/03/Icon250.png`,
}

export const appSlice = {
  pJSON,
  error: null,
  fullScreen: false,
  appMenuOpen: false,
  themeMode: `light`,
  wpBloginfo: devWpBloginfo,
}

const appReducer = createReducer(appSlice, {

  [themeMode]: (state, action) => {
    state.themeMode = action.themeMode
    return state
  },

  [fullScreen]: (state, action) => {
    state.fullScreen = action.fullScreen
    return state
  },

  [appMenuOpen]: (state, action) => {
    state.appMenuOpen = action.appMenuOpen
    return state
  },

  [error]: (state, action) => {
    state.error = action.error
    return state
  },

})

export { appReducer }