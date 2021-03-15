import { useEffect, useState } from 'react';
import api from '../../services/api';

function useApiClient({ url }) {
  const [loading, setLoading] = useState(true);
  const [data, setData] = useState([]);

  useEffect(() => {
    async function fetchData() {
      const response = await api.get(url);
      const jobs = response.data;

      setData(jobs);
      setLoading(false);
    }
    fetchData();
  }, [url]);

  return {
    loading,
    data,
  };
}

export default useApiClient;
