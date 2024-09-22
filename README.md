# Insurance Policy Management System for "Seguros Galdrette"

This project is a web application designed to manage insurance policies for the company **Seguros Galdrette**. 
The system is divided into two types of users: **clients** and **administrators**. The platform is designed with robust session management and data validation to ensure security and a smooth user experience.

## Features

### Clients
- **Invoice Generation**: Clients can generate invoices for their policies.
- **Policy Information**: Clients can view and consult information related to their policies.
  
### Administrators
- **User Management**: Administrators have the ability to add new users or deactivate existing ones.
- **Invoice Generation and Information Access**: Like clients, administrators can also generate invoices and consult policy details.
- **Database Backup**: Administrators can create backups of the database to ensure data is preserved.

### Additional Features
- **Input Validation**: All form inputs are validated to ensure data integrity and security.
- **Session Management**: User sessions are utilized to provide a personalized and secure browsing experience.

## How to Use

1. **Client Functionality**:
   - After logging in, clients can navigate to the **Invoice** section to generate invoices.
   - In the **Policy Information** section, clients can consult details about their insurance policies.

2. **Administrator Functionality**:
   - Administrators have access to the **User Management** section, where they can add new users or deactivate existing ones.
   - In the **Database Backup** section, administrators can create a backup of the system's data.
   - Administrators also have access to the same invoice and policy information functionalities available to clients.

## Technologies Used

- **Frontend**: HTML, CSS
- **Backend**: PHP, JavaScript
- **Database**: SQL for relational database management
- **Session Management**: PHP sessions to enhance user experience and security
- **Data Validation**: Input validation mechanisms to ensure correct and safe data handling

## Installation

- Clone the repository:
   ```bash
   git clone https://github.com/yourusername/insurance-management-system.git

- Set up the database:

    Import the provided SQL schema into your database.

- Configure the project:

    Update the database connection settings in the configuration file (config.php).

- Launch the application:

    Run the project using a local PHP server or deploy it to a web server.

##Future Enhancements

  - Implement more detailed reports for policy management.
  - Add user authentication using OAuth or other modern authentication methods.
  - Expand the backup functionality to support automated backups at regular intervals.
