import React from 'react';
import Routes from './routes';
import { BrowserRouter as Router } from 'react-router-dom';
import { JobProvider } from './context/JobContext';
import 'bootstrap/dist/css/bootstrap.min.css';

import GlobalStyle from './styles/global';

const App = () => (
  <>
    <Router>
      <JobProvider>
        <Routes />
      </JobProvider>
    </Router>
    <GlobalStyle />
  </>
);

export default App;
