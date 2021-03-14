import React, { useContext } from 'react';
import { TableContainer, Container } from './styles';
import { JobContext } from '../../context/JobContext';
// import ReactLoading from 'react-loading';
import { useHistory } from 'react-router-dom';



// export default Example;

const Dashboard = () => {
    const { jobs  } = useContext(JobContext);
    const history =  useHistory();



    const handleJobDetails = (id) => {
      history.push(`/jobs/${id}`)
    }

    if(jobs==null){
      return  <h1> Loading</h1>
    }

    // if(loading){
    //   return <div style={{ display: 'flex', justifyContent: "center", alignItems:"center", height: "100%"  }}>
    //     <ReactLoading type='spin' color='blue' height="200px" width='200px' />
    //   </div>
    // }


    return (

            <Container>
                <TableContainer>
                <h1>Job Board</h1>
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
                                    <td>{job.title}</td>
                                    <td>{job.location}</td>
                                    <td>{job.date}</td>
                                    <td>
                                      <button onClick={()=> handleJobDetails(job.id)}>
                                        details
                                      </button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </TableContainer>
            </Container>
    );
};

export default Dashboard;
