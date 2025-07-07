          document.addEventListener('DOMContentLoaded', () => {
    const skillsContainer = document.getElementById('skills-container');
    const recentActivityList = document.querySelector('.card-body ul');
    
    // Load saved activities from localStorage when the page loads
    const savedActivities = JSON.parse(localStorage.getItem('recent-activities')) || [];
    savedActivities.forEach(activity => {
        const newActivity = document.createElement('li');
        newActivity.textContent = activity;
        recentActivityList.appendChild(newActivity);
    });





    // Display skills when the user selects a topic and grade
    skillsContainer.addEventListener('click', (event) => {
        if (event.target.tagName === 'LI') {
            const skillClicked = event.target.textContent;
            // Save the new activity to localStorage
            savedActivities.push(newActivity.textContent);
            localStorage.setItem('recent-activities', JSON.stringify(savedActivities));
        }
    });
});

        function populateSkills() {
            const skillsContainer = document.getElementById('skills-container');
            const topic = document.getElementById('topic').value;
            const grade = document.getElementById('skill-level').value;
            let skills = [];

            if (topic === 'Math') {
                if (grade === 'Pre-K') {
                    skills = ['<a href="https://example.com/numbers">Numbers</a>', '<a href="https://example.com/counting">Counting</a>', '<a href="https://example.com/shapes">Shapes</a>'];          
                
                } else if (grade === 'First Grade') {
                    skills = ['Addition', 'Subtraction', 'Place Value'];
              
                } else if (grade === 'Second Grade') {
                    skills = ['Addition', 'Subtraction', 'Multiplication'];
                } else if (grade === 'Third Grade') {
                    skills = ['Addition', 'Subtraction', 'Multiplication', 'Division'];
                } else if (grade === 'Fourth Grade') {
                    skills = ['Fractions', 'Decimals', 'Geometry'];
                } else if (grade === 'Fifth Grade') {
                    skills = ['Fractions', 'Decimals', 'Order of Operations'];
                } else if (grade === 'Sixth Grade') {
                    skills = ['Ratios', 'Proportions', 'Basic Algebra'];
                } else if (grade === 'Seventh Grade') {
                    skills = ['Pre-Algebra', 'Statistics', 'Geometry'];
                } else if (grade === 'Eighth Grade') {
                    skills = ['Algebra 1', 'Geometry', 'Data Analysis'];
                } else if (grade === 'Ninth Grade') {
                    skills = ['Algebra 2', 'Geometry', 'Trigonometry'];
                } else if (grade === 'Tenth Grade') {
                    skills = ['Advanced Algebra', 'Trigonometry', 'Pre-Calculus'];
                } else if (grade === 'Eleventh Grade') {
                    skills = ['Pre-Calculus', 'Statistics', 'Functions'];
                } else if (grade === 'Twelfth Grade') {
                    skills = ['Calculus', 'Advanced Statistics', 'Linear Algebra'];
                }

            } else if (topic === 'Science') {
            if (grade === 'First Grade') {
                skills = ['Experimentation', 'Observation'];
            } else if (grade === 'Second Grade') {
                skills = ['Experimentation', 'Observation', 'Force & Motion'];
            } else if (grade === 'Third Grade') {
                skills = ['Scientific Method', 'Life Cycles', 'Matter'];
            } else if (grade === 'Fourth Grade') {
                skills = ['Energy', 'Ecosystems', 'Earth Science'];
            } else if (grade === 'Fifth Grade') {
                skills = ['Chemistry Basics', 'Space Science', 'Human Body'];
            } else if (grade === 'Sixth Grade') {
                skills = ['Earth Systems', 'Cell Biology', 'Physics Basics'];
            } else if (grade === 'Seventh Grade') {
                skills = ['Life Science', 'Physical Science', 'Scientific Investigation'];
            } else if (grade === 'Eighth Grade') {
                skills = ['Chemistry', 'Physics', 'Biology'];
            } else if (grade === 'Ninth Grade') {
                skills = ['Biology Advanced', 'Lab Techniques', 'Scientific Writing'];
            } else if (grade === 'Tenth Grade') {
                skills = ['Chemistry Advanced', 'Chemical Reactions', 'Lab Analysis'];
            } else if (grade === 'Eleventh Grade') {
                skills = ['Physics Advanced', 'Mechanics', 'Thermodynamics'];
            } else if (grade === 'Twelfth Grade') {
                skills = ['Advanced Sciences', 'Research Methods', 'Scientific Theory'];
            } else {
                skills = ['Scientific Method', 'Observation', 'Basic Concepts'];
            }

            } else if (topic === 'Language Arts') {
            if (grade === 'Pre-K') {
                skills = ['Letter Recognition', 'Phonics', 'Basic Words'];
            } else if (grade === 'First Grade') {
                skills = ['Vocabulary', 'Reading', 'Phonics'];
            } else if (grade === 'Second Grade') {
                skills = ['Vocabulary', 'Reading', 'Writing'];
            } else if (grade === 'Third Grade') {
                skills = ['Reading Comprehension', 'Grammar', 'Writing'];
            } else if (grade === 'Fourth Grade') {
                skills = ['Reading Analysis', 'Writing Essays', 'Grammar'];
            } else if (grade === 'Fifth Grade') {
                skills = ['Literature', 'Writing', 'Research'];
            } else if (grade === 'Sixth Grade') {
                skills = ['Literary Elements', 'Writing', 'Research'];
            } else if (grade === 'Seventh Grade') {
                skills = ['Literature Analysis', 'Essay Writing', 'Research'];
            } else if (grade === 'Eighth Grade') {
                skills = ['Critical Reading', 'Writing', 'Research'];
            } else if (grade === 'Ninth Grade') {
                skills = ['Literature Analysis', 'Composition', 'Research'];
            } else if (grade === 'Tenth Grade') {
                skills = ['World Literature', 'Advanced Writing', 'Research'];
            } else if (grade === 'Eleventh Grade') {
                skills = ['American Literature', 'Research Writing', 'Analysis'];
            } else if (grade === 'Twelfth Grade') {
                skills = ['British Literature', 'Advanced Analysis', 'Thesis Writing'];
            }

            } else if (topic === 'Social Studies') {
                if (grade === 'Pre-K') {
                    skills = ['Family', 'Community', 'Basic Maps'];
                } else if (grade === 'First Grade') {
                    skills = ['Community Helpers', 'Maps', 'Citizenship'];
                } else if (grade === 'Second Grade') {
                    skills = ['Local History', 'Geography', 'Government'];
                } else if (grade === 'Third Grade') {
                    skills = ['Communities', 'Native Americans', 'Immigration'];
                } else if (grade === 'Fourth Grade') {
                    skills = ['State History', 'Geography', 'Economics'];
                } else if (grade === 'Fifth Grade') {
                    skills = ['American History', 'Constitution', 'Government'];
                } else if (grade === 'Sixth Grade') {
                    skills = ['Ancient Civilizations', 'World Geography', 'Culture'];
                } else if (grade === 'Seventh Grade') {
                    skills = ['World History', 'Geography', 'Civics'];
                } else if (grade === 'Eighth Grade') {
                    skills = ['American History', 'Civil War', 'Constitution'];
                } else if (grade === 'Ninth Grade') {
                    skills = ['World History', 'Geography', 'Economics'];
                } else if (grade === 'Tenth Grade') {
                    skills = ['Modern History', 'Government', 'Politics'];
                } else if (grade === 'Eleventh Grade') {
                    skills = ['US History', 'Economics', 'Foreign Policy'];
                } else if (grade === 'Twelfth Grade') {
                    skills = ['Government', 'Economics', 'Contemporary Issues'];
                }
            }

            skillsContainer.innerHTML = skills.length > 0 ?
            `<h5>Skills:</h5><ul>${skills.map(skill => `<li>${skill}</li>`).join('')}</ul>` :
            '<p>No skills available for the selected topic and grade.</p>';
        }