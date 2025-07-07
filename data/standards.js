document.getElementById("view-standard-btn").addEventListener("click", function () {
    const subject = document.getElementById("subject-select").value;
    const grade = document.getElementById("grade-select").value;
    const standardsContent = document.getElementById("standards-content");

    // Example logic to dynamically load standards
    if (subject === "math" && grade === "1") {
        standardsContent.innerHTML = `
            <h2 class="text-primary mb-4">1. Operations and Algebraic Thinking (1.OA)</h2>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item">1.OA.A.1: Use addition and subtraction within 20 to solve word problems.</li>
                <li class="list-group-item">1.OA.A.2: Solve word problems that call for addition of three whole numbers.</li>
            </ul>
            <h2 class="text-primary mb-4">2. Number and Operations in Base Ten (1.NBT)</h2>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item">1.NBT.A.1: Count to 120, starting at any number less than 120.</li>
            </ul>`;
    } 
    
    else { 
        standardsContent.innerHTML = `<p class="text-muted">Standards for ${subject.toUpperCase()} Grade ${grade} are not available yet.</p>`;
    }
});






/*
const standards = {
    math: {
        "1": [
            { id: "1.OA.A.1", text: "Use addition and subtraction within 20 to solve word problems." },
            { id: "1.OA.A.2", text: "Solve problems that call for addition of three whole numbers." },
            { id: "1.OA.B.3", text: "Apply properties of operations as strategies to add and subtract." },
            { id: "1.OA.B.4", text: "Understand subtraction as an unknown-addend problem." },
            { id: "1.OA.C.5", text: "Relate counting to addition and subtraction." },
            { id: "1.OA.C.6", text: "Add and subtract within 20, demonstrating fluency for addition and subtraction within 10." },
            { id: "1.OA.D.7", text: "Understand the meaning of the equal sign, and determine if equations involving addition and subtraction are true or false." },
            { id: "1.OA.D.8", text: "Determine the unknown whole number in an addition or subtraction equation relating three whole numbers." },
            { id: "1.NBT.A.1", text: "Count to 120, starting at any number less than 120." },
            { id: "1.NBT.B.2", text: "Understand that the two digits of a two-digit number represent amounts of tens and ones." },
            { id: "1.NBT.B.3", text: "Compare two two-digit numbers based on meanings of the tens and ones digits." },
            { id: "1.NBT.C.4", text: "Add within 100, including adding a two-digit number and a one-digit number." },
            { id: "1.NBT.C.5", text: "Given a two-digit number, mentally find 10 more or 10 less than the number." },
            { id: "1.NBT.C.6", text: "Subtract multiples of 10 in the range 10-90 from multiples of 10 in the range 10-90." },
            { id: "1.MD.A.1", text: "Order three objects by length; compare the lengths of two objects indirectly by using a third object." },
            { id: "1.MD.A.2", text: "Express the length of an object as a whole number of length units." },
            { id: "1.MD.B.3", text: "Tell and write time in hours and half-hours using analog and digital clocks." },
            { id: "1.MD.C.4", text: "Organize, represent, and interpret data with up to three categories." },
            { id: "1.G.A.1", text: "Distinguish between defining attributes versus non-defining attributes." },
            { id: "1.G.A.2", text: "Compose two-dimensional shapes or three-dimensional shapes to create a composite shape." },
            { id: "1.G.A.3", text: "Partition circles and rectangles into two and four equal shares." }
        ]
    },
    science: {
        "1": [
            { id: "1-ESS1-1", text: "Use observations of the sun, moon, and stars to describe patterns that can be predicted." },
            { id: "1-ESS2-2", text: "Use information from observations to describe patterns in the natural world." }
        ]
    },
    social_studies: {
        "1": [
            { id: "1.1.1", text: "Identify the roles of individuals in the community." },
            { id: "1.2.2", text: "Describe how people in the community work together." }
        ]
    },
    health: {
        "1": [
            { id: "1.1.1", text: "Identify healthy habits and practices." },
            { id: "1.2.2", text: "Describe the importance of personal hygiene." }
        ]
    },
    physical_education: {
        "1": [
            { id: "1.1.1", text: "Demonstrate basic locomotor skills." },
            { id: "1.2.2", text: "Participate in physical activities." }
        ]
    },
    art: {
        "1": [
            { id: "1.1.1", text: "Create art using a variety of materials." },
            { id: "1.2.2", text: "Describe the elements of art." }
        ]
    },
    music: {
        "1": [
            { id: "1.1.1", text: "Sing simple songs." },
            { id: "1.2.2", text: "Identify different musical instruments." }
        ]
    },
    technology: {
        "1": [
            { id: "1.1.1", text: "Use basic computer skills." },
            { id: "1.2.2", text: "Identify different types of technology." }
        ]
    },
    foreign_language: {
        "1": [
            { id: "1.1.1", text: "Recognize basic vocabulary in a foreign language." },
            { id: "1.2.2", text: "Participate in simple conversations." }
        ]
    },
    ela: {
        "1": [
            { id: "1.RL.1", text: "Ask and answer questions about key details in a text." }
        ]
    }
};
*/
