import styled from 'styled-components';

export const Container = styled.div`
  width: 100%;
  max-width: 960px;
  margin: 0 auto;
  padding: 40px 20px;
`;

export const TableContainer = styled.section`
  margin-top: 64px;

  h1 {
    font-size: 70px;
    color: #3a3a3a;
  }

  table {
    width: 100%;
    border-spacing: 0 8px;

    th {
      color: #3a3a3a;
      font-weight: normal;
      padding: 20px 32px;
      text-align: left;
      font-size: 26px;
      line-height: 24px;
    }

    td {
      padding: 20px 32px;
      border: 0;
      background: #fff;
      font-size: 16px;
      font-weight: normal;
      color: #3a3a3a;

      a {
        text-decoration: none;
      }
    }

    td:first-child {
      border-radius: 8px 0 0 8px;
    }

    td:last-child {
      border-radius: 0 8px 8px 0;
    }
  }

  svg {
    margin-left: auto;
    color: blue;
  }
`;
