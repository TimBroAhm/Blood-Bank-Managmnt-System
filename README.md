# Blood Bank Management System

A web-based application for managing blood donations, donor and recipient records, inventory tracking, and blood requests for hospitals and blood banks. Built with PHP and MySQL, with role-based access for each type of user.

## Features

- **Role-based portals**: separate pages for Admin, Blood Bank Manager, Employee, Lab Technician, Nurse, Donor, and Blood Seeker
- **Authentication**: login, logout, and password recovery
- **Donor and recipient records**: registration, viewing, and updating of individual user profiles
- **Blood search**: search for available blood by type
- **Blood requests**: submit, view individual requests, and view scheduled requests
- **Scheduling**: calendar for donation and request appointments
- **Announcements and notices**: post and view announcements and notices
- **Association selection**: choose and view associated organizations and general association information
- **Content pages**: about us, about organization, gallery, slideshow, downloads, and feedback
- **Image handling**: upload and retrieval of images
- **Multi-language support**: language resources in the `Language` folder
- **PDF resources**: documents in the `pdf` folder

## Project Structure

```
Blood-Bank-Managmnt-System/
├── Admin/              # Administrator pages
├── BBmanagerPage/      # Blood bank manager pages
├── Employee/           # Employee pages
├── Labtecpage/         # Lab technician pages
├── Nursepage/          # Nurse pages
├── DonorPage/          # Donor pages
├── SeekerPage/         # Blood seeker pages
├── connection/         # Database connection settings
├── DB/                 # Database resources
├── Language/           # Language files
├── css/  js/  images/  # Static assets
├── pdf/                # PDF documents
├── form1/  help/       # Forms and help pages
├── ims.sql             # Database schema and data
├── index.php           # Landing page
├── login.php           # Login handler
└── *.php               # Shared pages and scripts
```

## Tech Stack

| Layer    | Technology            |
| -------- | --------------------- |
| Frontend | HTML, CSS, JavaScript |
| Backend  | PHP                   |
| Database | MySQL                 |
| Server   | Apache (XAMPP / WAMP) |

## Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/TimBroAhm/Blood-Bank-Managmnt-System.git
   ```

2. **Place the project in your web server directory**

   - XAMPP: `C:\xampp\htdocs\Blood-Bank-Managmnt-System`
   - WAMP: `C:\wamp64\www\Blood-Bank-Managmnt-System`

3. **Create the database**

   - Start Apache and MySQL.
   - Open `http://localhost/phpmyadmin`.
   - Create a new database, then import `ims.sql`.

4. **Configure the connection**

   Set your MySQL host, username, password, and database name in the `connection` folder.

5. **Run the application**

   Open `http://localhost/Blood-Bank-Managmnt-System/` in your browser.

## User Roles

| Role               | Responsibility                                |
| ------------------ | --------------------------------------------- |
| Admin              | System administration and user management     |
| Blood Bank Manager | Inventory, requests, and scheduling oversight |
| Employee           | Day-to-day blood bank operations              |
| Lab Technician     | Blood testing and screening records           |
| Nurse              | Donation handling and donor care              |
| Donor              | Manage profile and donation schedule          |
| Seeker             | Search for blood and submit requests          |

## Author

**TimBro**
GitHub: [@TimBroAhm](https://github.com/TimBroAhm)

