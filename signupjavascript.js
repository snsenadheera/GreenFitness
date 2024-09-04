function checkPasswordStrength() {
    // ... (existing password strength check)
}

function Checkerror() {
    const name = document.getElementById("Name").value;
    const studentId = document.getElementById("studid").value;
    const password1 = document.getElementById("password1").value;
    const password2 = document.getElementById("password2").value;
  
    let isValid = true; // Assuming valid initially
  
    if (name === "") {
      document.getElementById("errorname").style.display = "block";
      isValid = false;
    } else {
      document.getElementById("errorname").style.display = "none";
    }
  
    if (studentId === "") {
      document.getElementById("errorstudtid").style.display = "block";
      isValid = false;
    } else {
      document.getElementById("errorstudtid").style.display = "none";
    }
  
    if (password1 === "") {
      document.getElementById("errorpw1").style.display = "block";
      isValid = false;
    } else {
      document.getElementById("errorpw1").style.display = "none";
    }
  
    if (password1 !== password2) {
      document.getElementById("errorrepw2").style.display = "block";
      isValid = false;
    } else {
      document.getElementById("errorrepw2").style.display = "none";
    }
  
    // Add checks for password strength using checkPasswordStrength()
  
    if (isValid) {
      // Successful validation, submit form or redirect
      return true;
    } else {
      alert("Please correct the errors and try again.");
      return false;
    }
  }

function redirectToLogin() {
    window.location.href = "index.html";
}