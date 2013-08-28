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
  

******** Final Results **********

- 95% functionality
- Buggs:
  - Logout button will not work. I have no idea why
  - When you edit a user or organizaion it will validate and submit but not update the DB. Something is wrong with my Active Record Query and I'm at a loss 
  - When you click on a link or open a modal the table data hides. It reappears when you click on a pageination link 
    - This is possibly an issue conflicting with Foundation. 

- Overall I'm rather proud of it and it works seamlessly (sans buggs) 
  
