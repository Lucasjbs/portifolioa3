// IF USER IS LOGGED, SHOW USER NAVBAR
// Create Logout Button

// IN /profile, CREATE STANDARD FUNCTION TO CHECK IF USER IS ACTIVE, IF NOT, REDIRECT TO LOGIN PAGE
// TOGETHER, CREATE A PHP WARDEN TO PREVENT CLIENT FROM BYPASS THE SESSION

// profile.html ==> sessionWarden.js (redirect if not logged) ==> entrypoint.php (get, profile) ==> ProfileGetAction (checks authentication)
// if autenticated, echo user data. (for admin, it'll echo entire html files on the server side, refactor needed)

// Routes that need to be protected: /profile, /admin (Refactor client/server needed)

