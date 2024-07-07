# Running Event New Zealand

This project focuses on building a dynamic website for managing and booking running events across New Zealand. 
It uses PHP, Bootstrap, CSS, HTML,
and the Laravel PHP framework to construct a robust full-stack application with MySQL integration.


## Introduction

The website "Running Event New Zealand" comprises four key models: authentication, event booking, discussion board, and admin dashboard.

1. **Authentication Model**: Handles user login and registration, ensuring secure access to the website's features.
2. **Event Booking Model**: Facilitates the process of booking events, providing users with the ability to reserve their spots for desired events.
3. **Discussion Board Model**: Enables users to engage in discussions, post messages, and interact with other participants, fostering community engagement.
4. **Admin Dashboard Model**: Empowers administrators with tools to manage website content, user accounts, events, and discussions, ensuring smooth operations and effective oversight.

These models work in tandem to deliver a comprehensive and functional experience for both users and administrators, aligning with the website's objectives and requirements.

## Key Functionalities

### Homepage

- Display events in three columns with title, description, and photo.
- Limit to three events per category with a "More" button for additional events.
- "More" button directs users to the event page.
- Ensure uniform design and functionalities for all users.

### Event Page

- Allow users to book events via the "Book Now" buttons.
- Provide search and category functions for user exploration.
- Design the page for straightforward content viewing and filtering.

### Discussion Board

- Registered users can start new messages.
- Display thread titles and content for unregistered users.
- Maintain consistent style across both pages for ease of navigation.

### Admin Dashboard

- Consolidate admin functions into a single page for ease of use.
- Enable CRUD (Create, Read, Update, Delete) operations on members, events, and messages.
- Display an overview at the top for quick reference.

### Register/Log-in Page

- Combine registration and login functions into a single page.
- Allow access for both unregistered and registered users.
- Enable further website usage post-registration or log-in.

### Account Management

- Allow registered users to update account information after logging in.
- Provide options for password update and account deactivation.
- Implement a logout function for terminating user sessions.
- Ensure consistency in style and layout with other pages.

## Non-functional Requirements

- Ensure consistent user experience across all pages for both registered and unregistered users.
- Maintain a visually appealing and intuitive design.
- Optimize database queries and server-side processing for efficient data retrieval and management.
- Encrypt sensitive user information, such as passwords, during transmission and storage.

---

