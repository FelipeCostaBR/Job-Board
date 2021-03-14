import React, { useContext, useEffect } from 'react'
import { useParams } from 'react-router';
import { JobContext } from '../../context/JobContext';
import { Container } from './styles';
// import ReactLoading from 'react-loading';

const Job = () => {
  const { jobDetails, handleJobDetails, setJobDetails } = useContext(JobContext);
  const [jobId] = Object.values(useParams());


  useEffect(() => {
    handleJobDetails(jobId);
    // return ()=> {

    //   setJobDetails(null)
    // }
  }, [jobId, handleJobDetails])


  if(jobDetails == null){
    return  <h1> Loading</h1>

  }

  // if(loading){
  //     return <div style={{ display: 'flex', justifyContent: "center", alignItems:"center", height: "100%"  }}>
  //       <ReactLoading type='spin' color='blue' height="200px" width='200px' />
  //     </div>
  //   }

  return (
    <Container>
      <h1>Job details</h1>
      <strong>Title: </strong>
      <span>{jobDetails.title}</span>

      <strong>Description: </strong>
      <span>{jobDetails.description}</span>

      <strong>Location: </strong>
      <span>{jobDetails.location}</span>

      <strong>Date: </strong>
      <span>{jobDetails.date}</span>

      <strong>Applicants: </strong>
      <span>{ jobDetails.name} </span>
    </Container>
  )
}

export default Job;
