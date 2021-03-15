import React from 'react';
import { Link, useParams } from 'react-router-dom';

import formatApplicants from '../../utils/formatApplicants/index';
import Loading from '../../components/loading/index';
import Field from '../../components/field/index';

import { Container } from './styles';
import useApiClient from '../../utils/useApiClient/index';

const Job = () => {
  const { id } = useParams();
  const { data: job, loading } = useApiClient({ url: `/jobs/${id}` });

  return (
    <Container>
      <Link to={'/jobs'}>Back to Jobs</Link>
      <h1>Job details</h1>
      {loading ? (
        <Loading />
      ) : (
        <div>
          {job.map((data) => (
            <div key={data.title}>
              <Field title={'Title'} jobDetail={data.title} />
              <Field title={'Description'} jobDetail={data.description} />
              <Field title={'Location'} jobDetail={data.location} />
              <Field title={'Date'} jobDetail={data.date} />
              <Field title={'Applicants'} jobDetail={formatApplicants(data.applicants)} />
            </div>
          ))}
        </div>
      )}
    </Container>
  );
};

export default Job;
