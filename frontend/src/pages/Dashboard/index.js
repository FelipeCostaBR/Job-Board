import React from 'react';
import { Link } from 'react-router-dom';
import Loading from '../../components/loading';

import useApiClient from '../../utils/useApiClient';
import { Container, TableContainer } from './styles';

const Dashboard = () => {
  const { data: jobs, loading } = useApiClient({ url: '/jobs' });
  return (
    <Container>
      <TableContainer>
        <h1>Job Board</h1>
        {loading ? (
          <Loading />
        ) : (
          <table>
            <thead>
              <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Date</th>
                <th>Details</th>
              </tr>
            </thead>

            <tbody>
              {jobs.map((job) => (
                <tr key={job.id}>
                  <td>
                    <Link to={`/jobs/${job.id}`}>{job.title}</Link>
                  </td>
                  <td>{job.location}</td>
                  <td>{job.date}</td>
                  <td>
                    <Link to={`/jobs/${job.id}`}>Details</Link>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        )}
      </TableContainer>
    </Container>
  );
};
export default Dashboard;
