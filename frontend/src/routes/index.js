import React from 'react';
import { Switch, Route } from 'react-router-dom';

import Dashboard from '../pages/dashboard/index';
import Job from '../pages/job/index';

const Routes = () => (
  <Switch>
    <Route path="/jobs" exact component={Dashboard} />
    <Route path="/jobs/:id" component={Job} />
  </Switch>
);

export default Routes;
