function Checkerror() {
  const name = document.getElementById('studentid');
  const password1 = document.getElementById('password1');
  const errorname = document.getElementById('errorname');
  const errorpw1 = document.getElementById('errorpw1');
  const errorpw2 = document.getElementById('errorpw2'); 

  const nameValue = name.value.trim();
  const password1Value = password1.value.trim();

  let isValid = true;

  if (nameValue === "") {
    errorname.style.display = "block";
    isValid = false;
  } else {
    errorname.style.display = "none";
  }

  if (password1Value === "") {
    errorpw1.style.display = "block";
    isValid = false;
  } else {
    errorpw1.style.display = "none";
  }

  return isValid; 
}