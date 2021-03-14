import React, { createContext, useEffect, useState } from 'react';
import api from '../services/api';

export const JobContext = createContext();

export const JobProvider = ({ children }) => {
  const [jobs, setJobs] = useState(null);
  const [jobDetails, setJobDetails] = useState(null);



  useEffect(() => {
    async function showJobs() {
      const response = await api.get('/jobs');

      const jobListFormatted = response.data.map(job => ({
        ...job,
        date: job.date.replaceAll('/', '-'),
      }));

      setJobs(jobListFormatted);
    }

    showJobs();
  }, []);

  async function handleJobDetails(id) {
    await api.get(`/jobs/${id}`).then(response => {

      const nameList = response.data.map(job => job.name).join(", ");
      const jobDetailsFormatted = response.data.reduce((acc, job) => (
        {
        ...job,
        name: nameList
      }
      ))
      setJobDetails(jobDetailsFormatted);
    });
  };

  return (
    <JobContext.Provider value={{ jobs, jobDetails, setJobDetails, handleJobDetails }}>{children}</JobContext.Provider>
  );
};
