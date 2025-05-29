function validateForm() {
    // Name validation
    var fname = document.getElementsByName('fname')[0].value;
    var mname = document.getElementsByName('mname')[0].value;
    var lname = document.getElementsByName('lname')[0].value;
    
    if (!/^[A-Za-z]{2,}$/.test(fname)) {
        alert('First name must be at least 2 letters and contain only letters.');
        return false;
    }
    if (mname && !/^[A-Za-z]{2,}$/.test(mname)) {
        alert('Middle name must be at least 2 letters and contain only letters.');
        return false;
    }
    if (!/^[A-Za-z]{2,}$/.test(lname)) {
        alert('Last name must be at least 2 letters and contain only letters.');
        return false;
    }
    
    // Mobile: 11 digits, starts with 0
    var mobile = document.getElementById('mobile').value;
    if (!/^0\d{10}$/.test(mobile)) {
        alert('Mobile number must be 11 digits and start with 0.');
        return false;
    }
    
    // Password: min 8 chars, 1 uppercase, 1 lowercase, 1 number, 1 special char
    var password = document.getElementById('password').value;
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/.test(password)) {
        alert('Password must be at least 8 characters, include 1 uppercase, 1 lowercase, 1 number, and 1 special character.');
        return false;
    }
    
    return true;
}