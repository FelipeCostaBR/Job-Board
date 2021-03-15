import React from 'react';
import ReactLoading from 'react-loading';

const Loading = () => (
  <div style={{ display: 'flex', justifyContent: 'center', alignItems: 'center', height: '100%' }}>
    <ReactLoading type="spin" color="blue" height="100px" width="100px" />
  </div>
);

export default Loading;
