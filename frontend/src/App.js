import React from 'react';
import Routes from './routes';
import { BrowserRouter as Router } from 'react-router-dom';
// import { JobProvider } from './context/jobContext';

import GlobalStyle from './styles/global';

const App = () => (
  <>
    <Router>
      <Routes />
    </Router>
    <GlobalStyle />
  </>
);

export default App;
