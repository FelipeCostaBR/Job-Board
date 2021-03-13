import React, { useContext } from 'react'
import { Form } from 'react-bootstrap';
import { Header, TableContainer, Container } from './styles';
import { JobContext } from '../../context/JobContext';
import JobDetailsModal from '../../components/Modal';

const Dashboard = () => {
  const { jobs } = useContext(JobContext);

  return (
    <>
      <Header />
      <h1>Job Board</h1>
      <Container >
        <Form>
          <Form.File
            id="file"
            label="file input"
            data-browse="Insert"
            custom
          />
        </Form>

        <TableContainer>
          <h1>Job Details</h1>
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
              {jobs.map(job => (
                <tr key={job.id}>
                  <td className="title">{job.title}</td>
                  <td>{job.location}</td>
                  <td>{job.date}</td>
                  <td>
                    <JobDetailsModal props={job}/>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </TableContainer>
      </Container>

    </>
  )
}

export default Dashboard;

