WTA-Project
===========

A simple address book. 

I will have the following functionality:
- Users can create an account and identify with an organization
- Users can search other organizations and users
- If user can edit organization info if user belongs to organization
  - user can edit other users belonging to same organization
- If user is not logged in, user can only search and view organization info.
  - User cannot search or view other user info
  - User cannot edit any info
  

***************************

Final Results:

100% functionality
- Everything is Ajaxed.
- Things operate smoothly

Potential additions / changes to do:
- Change the validation errors output to Foundations built in aspects.
- Integrate Google Maps API so that when users click on an address, it pulls up a modal with a map of that location. 

I'm rather pleased with this wee project. 
******************************

Bugs:

- Just descovered that when the user edits their data, it does not reset the session. It will appear as if the user cannot edit themselves. You'd have to log out and log back in for it to reset. 
  - I'm on it like white on rice. 
