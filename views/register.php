<h1>Register</h1>


<div class="wrapper">
    <div class="registration_form">
        <!-- Title-->
        <form action="/user/register" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>

        <div class="form-group">
            <label for="user-type">User Type:</label>
            <select id="user-type" name="user-type">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
        </div>

        <div class="form-group" id="subject-options">
            <!-- Subjects checkboxes will be dynamically added here. -->
        </div>

        <button type="submit">Register</button>
        <a href="/login">Login</a>
    </form>
    </div>
</div>

<script>
    const userTypeSelect = document.getElementById("user-type");
    const subjectOptions = document.getElementById("subject-options");

    // Function to update the form based on the selected user type.
    function updateUserType() {
        const selectedUserType = userTypeSelect.value;

        // Clear the subject options.
        subjectOptions.innerHTML = "";

        if (selectedUserType === "student") {
            // Display the subject checkboxes for students.
            const subjects = ["Management", "Electronics", "Computer Systems", "Database I", "Automata Theory"];
            subjects.forEach(subject => {
                const label = document.createElement("label");
                label.textContent = subject;
                const checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                checkbox.name = subject.toLowerCase().replace(/\s+/g, "-");
                checkbox.value = subject;
                subjectOptions.appendChild(label);
                subjectOptions.appendChild(checkbox);
            });
        } else if (selectedUserType === "teacher") {
            // Display the subject dropdown for teachers.
            const subjectLabel = document.createElement("label");
            subjectLabel.textContent = "Select Subject:";
            const subjectSelect = document.createElement("select");
            subjectSelect.name = "subject";
            const subjects = ["Management", "Electronics", "Computer Systems", "Database I", "Automata Theory"];
            subjects.forEach(subject => {
                const option = document.createElement("option");
                option.value = subject.toLowerCase().replace(/\s+/g, "-");
                option.textContent = subject;
                subjectSelect.appendChild(option);
            });
            subjectOptions.appendChild(subjectLabel);
            subjectOptions.appendChild(subjectSelect);
        }
    }

    // Attach the updateUserType function to the change event of the user type select.
    userTypeSelect.addEventListener("change", updateUserType);

    // Initial form setup based on the default selected user type.
    updateUserType();
</script>

