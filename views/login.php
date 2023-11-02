<?php

//    var_dump(password_hash('admin123',PASSWORD_DEFAULT));
    



?>
<div class="wrapper">
    <div class="registration_form">
        <!-- Title-->
        <form action="/login" method="post">
        

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        

        <div class="form-group">
            <label for="user-type">User Type:</label>
            <select id="user-type" name="user-type">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
        </div>

        

        <button type="submit">Login</button>
        <a href="/">Register</a>
    </form>
    </div>
</div>


