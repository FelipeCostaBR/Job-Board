import styled from 'styled-components';

export const Container = styled.div`
display: grid;
grid-template-columns: 1fr repeat(5);

h1 {
        font-size: 70px;
        color: #3a3a3a;
    }

strong{
  margin-top: 64px;
  font-size: 35px;
}

span{
  font-size: 25px;
}
`;
