document.addEventListener('DOMContentLoaded', () => {
    // Intersection Observer for animations
    const icons = document.querySelectorAll('.benefits-icon');
    const title = document.querySelector('.benefits-title');
    const intro = document.querySelector('.benefits-intro');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            } else {
                entry.target.classList.remove('animate');
            }
        });
    }, {
        threshold: 0.1
    });

    icons.forEach(icon => {
        observer.observe(icon);
    });

    if (title) observer.observe(title);
    if (intro) observer.observe(intro);

    // BMI Calculator
    document.getElementById('bmi-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const weight = parseFloat(document.getElementById('weight').value);
        const height = parseFloat(document.getElementById('height').value) / 100; // Convert cm to meters

        if (isNaN(weight) || isNaN(height) || height === 0) {
            document.getElementById('bmi-result').innerText = 'Please enter valid weight and height.';
            return;
        }

        const bmi = weight / (height * height);
        let category = '';

        if (bmi < 18.5) {
            category = 'Underweight';
        } else if (bmi >= 18.5 && bmi < 24.9) {
            category = 'Normal weight';
        } else if (bmi >= 25 && bmi < 29.9) {
            category = 'Overweight';
        } else {
            category = 'Obesity';
        }

        // Display the BMI result in the popup
        document.getElementById('bmi-popup-bmi').innerText = bmi.toFixed(1);
        document.getElementById('bmi-popup-category').innerText = category;
        document.getElementById('bmi-popup').style.display = 'block';
    });

    // Close the popup when the close button is clicked
    document.getElementById('bmi-popup-close').addEventListener('click', function() {
        document.getElementById('bmi-popup').style.display = 'none';
    });

    // Close the popup when clicking outside of the popup content
    window.addEventListener('click', function(event) {
        if (event.target == document.getElementById('bmi-popup')) {
            document.getElementById('bmi-popup').style.display = 'none';
        }
    });
});

function renewMembership() {
    alert('Renew Membership: Functionality to be added.');
}

function bookTraining() {
    alert('Book Personal Training: Functionality to be added.');
}

function viewHistory() {
    alert('View Workout History: Functionality to be added.');
}

function updateProfile() {
    alert('Update Profile Information: Functionality to be added.');
}

function contactSupport() {
    alert('Contact Support: Functionality to be added.');
}
document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
    .catch(error => console.error('Error:', error));
});




