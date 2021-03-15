import styled from 'styled-components';

export const Container = styled.div`
  width: 100%;
  max-width: 960px;
  margin: 0 auto;
  padding: 40px 20px;
  display: grid;
  grid-template-columns: 1fr repeat(5);

  h1 {
    margin-top: 64px;
    font-size: 70px;
    color: #3a3a3a;
  }

  strong {
    font-size: 35px;
  }

  p {
    font-size: 25px;
    margin-bottom: 30px;
  }
`;
