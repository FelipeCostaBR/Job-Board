import React from 'react';

const Field = ({ title, jobDetail }) => (
  <div>
    <strong>{title} </strong>
    <p>{jobDetail}</p>
  </div>
);

export default Field;
