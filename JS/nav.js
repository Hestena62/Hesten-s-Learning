const saveProfile = () => {
        const name = document.getElementById('name').value.trim();
        const parentEmail = document.getElementById('parent-email').value.trim();
        const grade = document.getElementById('user-grade').value;
        const skills = Array.from(document.querySelectorAll('.skills input[type="checkbox"]:checked'))
            .map(checkbox => checkbox.value);
        const profilePic = document.querySelector('.profile-option.selected')?.src || '';

        if (!name || !parentEmail || !grade) {
            alert("Please fill out all required fields.");
            return;
        }

        // Store in localStorage for navbar display
        localStorage.setItem('userName', name);
        localStorage.setItem('userPic', profilePic);

        const formData = new FormData();
        formData.append('name', name);
        formData.append('parentEmail', parentEmail);
        formData.append('grade', grade);
        formData.append('skills', skills);
        formData.append('profilePic', profilePic);

        fetch('save_profile.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                showToast();
            })
            .catch(error => console.error('Error saving profile:', error));
    };

    const selectProfilePic = (img) => {
        document.querySelectorAll('.profile-option').forEach(option => option.classList.remove('selected'));
        img.classList.add('selected');
    };

    const showToast = () => {
        const toast = new bootstrap.Toast(document.getElementById('saveToast'));
        toast.show();
    };

    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('save-btn').addEventListener('click', saveProfile);

        // Load saved profile data into navbar
        const profileName = localStorage.getItem('userName');
        const profilePic = localStorage.getItem('userPic');

        if (profileName) {
            document.getElementById('profile-name').textContent = profileName;
        }

        if (profilePic) {
            document.getElementById('profile-pic').src = profilePic;
        }
    });