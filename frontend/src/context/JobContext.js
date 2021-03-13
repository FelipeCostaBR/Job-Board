import React, { createContext, useEffect, useState } from 'react';
import api from '../services/api';

export const JobContext = createContext();

export const JobProvider = ({ children }) => {
  const [jobs, setJobs] = useState([]);

  useEffect(() => {
    async function showJob() {
      const response = await api.get('/job');
      setJobs(response.data);
    };

    showJob();
  }, []);


  return (
    <JobContext.Provider
      value={{ jobs }}
    >
      {children}
    </JobContext.Provider>
  );


};

