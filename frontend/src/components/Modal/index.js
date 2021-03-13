import React, { useState } from 'react';
import Modal from 'react-modal';
import { FaSearchPlus, FaWindowClose } from 'react-icons/fa'

function JobDetailsModal({ props }) {
  const [modalIsOpen, setModalIsOpen] = useState(false);

  const handleModalIsOpen = () => {
    setModalIsOpen(true);
  }

  const handleModalIsClose = () => {
    setModalIsOpen(false);
  }

  const customStyles = {
    content: {
      top: '50%',
      left: '50%',
      right: 'auto',
      bottom: 'auto',
      marginRight: '-50%',
      transform: 'translate(-50%, -50%)',
      backgroundColor: '#fff'
    }
  };

  return (
    <>
      <FaSearchPlus size={20} onClick={handleModalIsOpen}>
        Details
        </FaSearchPlus>

      <Modal
        isOpen={modalIsOpen}
        ariaHideApp={false}
        style={customStyles}
        onRequestClose={() => setModalIsOpen(false)}
      >
        <FaWindowClose size={30} onClick={handleModalIsClose}>Close</FaWindowClose>
        <h2>{props.title}</h2>
        <h2>{props.description}</h2>
        <h2>{props.location}</h2>
        <h2>{props.date}</h2>
        <h2>{props.applicants}</h2>
      </Modal>
    </>
  )
}

export default JobDetailsModal;
