import '../styles/globals.css'
import { PersistGate } from 'redux-persist/integration/react'

import { Provider, connect } from "react-redux";
import configureStore from "../redux/store";

import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:3300';


import('semantic-ui-css/semantic.min.css')
const { store, persistor } = configureStore();
function MyApp({ Component, pageProps }) {
  return (
    <Provider store={store}>
      <PersistGate loading={null} persistor={persistor}>
        <Component {...pageProps} />
      </PersistGate>
    </Provider>
  )
}

export default MyApp
