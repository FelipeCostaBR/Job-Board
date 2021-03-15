const formatApplicants = (date) => {
  const name = date.map((item) => item.name).join(', ');

  return name;
};

export default formatApplicants;
