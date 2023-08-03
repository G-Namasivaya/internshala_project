function signup(event) {
    event.preventDefault();
    // Get the form data
    const formData = new FormData(event.target);
  
    // Send a POST request to the server
    fetch('/signup', {
      method: 'POST',
      body: formData,
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Redirect to the login page after successful signup
        window.location.href = '/login.html';
      } else {
        // Handle signup failure
        alert(data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred during signup.');
    });
  }
  
  function login(event) {
    event.preventDefault();
    // Get the form data
    const formData = new FormData(event.target);
  
    // Send a POST request to the server
    fetch('/login', {
      method: 'POST',
      body: formData,
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Redirect to the inner page after successful login
        window.location.href = '/users.html';
      } else {
        // Handle login failure
        alert(data.message);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred during login.');
    });
  }
  