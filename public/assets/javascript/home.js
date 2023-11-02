    // Get the modal and close button
    var modal = document.getElementById('myModal');
    var closeModal = document.getElementById('closeModal');

    // Get all the subject boxes
    var boxes = document.querySelectorAll('.box');

    // Function to open the modal
    function openModal() {
        modal.style.display = 'block';
    }

    // Function to close the modal
    function closeModalFunc() {
        modal.style.display = 'none';
    }

    // Attach click event listeners to each subject box
    boxes.forEach(function(box) {
        box.addEventListener('click', openModal);
    });

    // Attach click event listener to close button
    closeModal.addEventListener('click', closeModalFunc);
