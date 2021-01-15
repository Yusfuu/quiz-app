console.log("¯\\_(ツ)_/¯");

// Select form tag
const form = document.querySelector('#form');

// Validate inputs from empty text
function validateUser(user) {
  return user.email.toString().trim() !== '' &&
    user.password.toString().trim() !== '' &&
    user.username.toString().trim() !== ''
}

// wait for submit form
form.addEventListener('submit', (e) => {
  e.preventDefault();
  const fd = new FormData(form);
  // get all data from inputs and store in user variable (const)
  const user = { email: fd.get('email'), username: fd.get('username'), password: fd.get('password') };
  if (validateUser(user)) {
    console.log(user);
    // You can put sendReq(user) function here to send request
  } else {
    console.error('Something Went Wrong 😭');
  }
});

function sendReq(user) {
  // POST method implementation 
  // Sending a request (json data)
  // wait for response
  fetch('http://localhost:3000/register', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(user)
  })
    .then(res => res.json())
    .then(data => console.log(data))
    .catch(err => console.log(err));
}
