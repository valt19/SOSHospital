# HOSPITAL WEBSITE PROJECT CONTEXT

## 1. PROJECT OVERVIEW

### Project Name

[Hospital Name] Website

### Project Type

Professional hospital website with a secure administrative dashboard.

### Project Goal

Build a modern, responsive and easy-to-manage hospital website using PHP, MySQL, HTML, CSS and JavaScript.

The system will have two primary components:

1. Public-facing hospital website
2. Secure administrator dashboard

The public website will provide visitors with information about the hospital, its departments, medical services, doctors, facilities, news, announcements, contact information and other approved content.

The administrator dashboard will allow authorized staff to manage website content without manually editing PHP files.

---

# 2. TECHNOLOGY STACK

## Backend

* PHP

## Database

* MySQL

## Frontend

* HTML5
* CSS3
* JavaScript

## Development Environment

* Visual Studio Code
* XAMPP or another local PHP/MySQL development environment

## Deployment

The application should be deployable to standard PHP/MySQL hosting.

---

# 3. PROJECT PRINCIPLES

The website must be:

* Professional
* Modern
* Clean
* Trustworthy
* Responsive
* Easy to navigate
* Fast-loading
* Secure
* Accessible
* Easy to maintain
* Suitable for a real hospital
* Easy for authorized non-technical staff to manage

The application should remain understandable to someone with intermediate PHP knowledge.

Avoid unnecessary frameworks, dependencies and complexity.

---

# 4. PUBLIC WEBSITE

The public website should contain the following major sections:

* Home
* About Us
* Services
* Departments
* Doctors/Medical Team
* Facilities
* Appointments
* Health Information/News
* Gallery
* Careers
* Contact Us

The exact pages can be adjusted as the project develops.

---

# 5. HOMEPAGE

The homepage should include:

* Hospital logo
* Hospital name
* Navigation menu
* Hero/banner section
* Short introduction
* Emergency/contact information where applicable
* Featured medical services
* Departments
* Doctors/medical team preview
* Hospital facilities preview
* Latest news
* Health information
* Announcements
* Appointment call-to-action
* Contact information
* Footer

The homepage should provide clear navigation to all major areas of the website.

---

# 6. ABOUT US

The About page should provide general information about the hospital.

Possible sections:

* Hospital history
* Mission
* Vision
* Core values
* Leadership
* Quality statement
* Hospital facilities
* Accreditations
* Achievements

Only verified hospital information should be published.

Do not invent medical credentials, accreditations, partnerships or achievements.

---

# 7. MEDICAL SERVICES

The Services section should provide information about services offered by the hospital.

Possible services include:

* Outpatient services
* Inpatient services
* Emergency services
* Laboratory services
* Pharmacy
* Radiology/imaging
* Maternal and child health
* Surgical services
* Dental services
* Physiotherapy
* Specialist consultations

The actual services must be determined from information provided by the hospital.

Each service may have:

* Service name
* Description
* Image
* Department
* Operating information
* Contact information

Services should be manageable through the dashboard where appropriate.

---

# 8. DEPARTMENTS

The website should provide information about hospital departments.

Each department may contain:

* Department name
* Description
* Services offered
* Location
* Contact information
* Operating hours
* Assigned medical staff

Example departments:

* Outpatient Department
* Emergency Department
* Pediatrics
* Maternity
* Surgery
* Laboratory
* Radiology
* Pharmacy

The actual departments will be determined later.

---

# 9. DOCTORS / MEDICAL TEAM

The website may include profiles of doctors and other approved medical personnel.

Each profile may contain:

* Name
* Professional title
* Department
* Specialty
* Short biography
* Professional qualifications
* Photograph
* Areas of practice

Only information officially approved for publication by the hospital should be displayed.

The system should allow administrators to:

* Add staff profiles
* Edit profiles
* Delete profiles
* Publish/unpublish profiles
* Upload profile photographs

---

# 10. FACILITIES

The Facilities section should showcase hospital facilities.

Possible facilities include:

* Wards
* Operating theatres
* Laboratories
* Imaging facilities
* Pharmacy
* Consultation rooms
* Maternity facilities
* Emergency facilities
* Waiting areas

Each facility may have:

* Name
* Description
* Photograph
* Additional information

---

# 11. APPOINTMENTS

The initial version may include an appointment request system.

Visitors may be able to submit:

* Name
* Phone number
* Email
* Preferred department
* Preferred doctor
* Preferred date
* Preferred time
* Reason for appointment
* Additional message

The system should clearly state that an appointment request is **not necessarily a confirmed appointment** unless the hospital confirms it.

Administrators should be able to:

* View appointment requests
* Review requests
* Update status
* Contact the requester
* Delete requests

Possible appointment statuses:

* Pending
* Confirmed
* Rescheduled
* Completed
* Cancelled

---

# 12. IMPORTANT MEDICAL DATA PRINCIPLE

The initial website is primarily an informational and administrative website.

It should NOT unnecessarily collect sensitive medical information.

Visitors should not be asked to submit:

* Detailed medical histories
* Diagnoses
* Prescription information
* Laboratory results
* Patient records
* Sensitive clinical documents

unless a specific requirement is introduced and appropriate security and privacy measures are designed first.

The appointment request form should collect only the minimum information required.

---

# 13. HEALTH INFORMATION / NEWS

The hospital should be able to publish:

* Hospital news
* Health education articles
* Public announcements
* Health campaigns
* Events
* Community outreach information

Administrators should be able to:

* Create articles
* Edit articles
* Delete articles
* Publish/unpublish articles
* Add featured images
* Set publication dates

Health information should be reviewed and approved by appropriate hospital personnel before publication.

The website should not present general informational content as a personalized medical diagnosis or treatment recommendation.

---

# 14. ANNOUNCEMENTS

Administrators should be able to publish important announcements.

Examples:

* Changes in operating hours
* Public notices
* Service updates
* Holiday schedules
* Clinic schedules
* Hospital events

Each announcement may include:

* Title
* Content
* Publication date
* Expiration date
* Status

---

# 15. EVENTS

The website should support hospital events.

Administrators should be able to:

* Add events
* Edit events
* Delete events
* Set dates
* Set times
* Add locations
* Add descriptions
* Publish/unpublish events

Examples:

* Health camps
* Community outreach
* Medical conferences
* Awareness campaigns
* Hospital open days

---

# 16. GALLERY

The website should have a responsive image gallery.

Administrators should be able to:

* Upload images
* Add captions
* Create categories/albums
* Edit captions
* Delete images

Possible categories:

* Hospital
* Facilities
* Staff
* Events
* Community Outreach

Uploaded files must be validated for:

* File type
* File extension
* File size
* Safe filename
* Appropriate image format

Only authorized users should be able to upload files.

---

# 17. CAREERS

The Careers page may contain:

* Current vacancies
* Job descriptions
* Requirements
* Application instructions
* Closing dates

Administrators should be able to:

* Add vacancies
* Edit vacancies
* Publish/unpublish vacancies
* Delete vacancies
* Set application deadlines

Online job applications can be added later if required.

---

# 18. CONTACT PAGE

The Contact page should contain:

* Hospital address
* Telephone numbers
* Email address
* Emergency contact information where applicable
* Opening hours
* Department contacts
* Location/map
* Contact form
* Social media links where applicable

The contact form should allow visitors to send general inquiries.

Messages should be stored in the database and made available to authorized administrators.

The contact form should discourage users from submitting sensitive medical information.

---

# 19. ADMINISTRATOR DASHBOARD

The administrative dashboard should be accessible through:

`/admin/`

It must be protected by authentication.

Unauthenticated users must not be able to access protected dashboard pages.

---

# 20. ADMIN LOGIN

The administrator login should include:

* Email or username
* Password
* Login button
* Logout functionality
* Session-based authentication

Passwords must never be stored as plain text.

Use:

`password_hash()`

to store passwords.

Use:

`password_verify()`

to verify passwords.

---

# 21. ADMIN DASHBOARD HOME

The dashboard should provide an overview of website activity.

Possible statistics:

* Total services
* Total departments
* Total staff profiles
* Total news articles
* Total announcements
* Total events
* Total gallery images
* Pending appointment requests
* Unread contact messages
* Active vacancies

The dashboard may also contain:

* Recent appointment requests
* Recent messages
* Recent news
* Upcoming events
* Quick actions

---

# 22. CONTENT MANAGEMENT

The administrator should be able to perform CRUD operations.

CRUD means:

* Create
* Read
* Update
* Delete

Management areas should include:

### Services

* Add
* View
* Edit
* Delete
* Publish/unpublish

### Departments

* Add
* View
* Edit
* Delete
* Publish/unpublish

### Doctors/Staff

* Add
* View
* Edit
* Delete
* Publish/unpublish

### News

* Add
* View
* Edit
* Delete
* Publish/unpublish

### Announcements

* Add
* View
* Edit
* Delete
* Publish/unpublish

### Events

* Add
* View
* Edit
* Delete

### Gallery

* Upload
* View
* Edit
* Delete

### Careers

* Add
* View
* Edit
* Delete
* Publish/unpublish

---

# 23. APPOINTMENT MANAGEMENT

The dashboard should provide a dedicated appointment section.

Administrators should be able to:

* View appointment requests
* Filter appointments
* View appointment details
* Change appointment status
* Delete requests

The system should avoid exposing appointment information publicly.

Appointment data must only be accessible to authorized administrators.

---

# 24. CONTACT MESSAGE MANAGEMENT

Administrators should be able to:

* View messages
* Mark messages as read/unread
* Delete messages
* Search messages

Messages should not be publicly accessible.

---

# 25. ADMIN USERS

The system should support administrator accounts.

Initial features:

* Add administrator
* View administrators
* Delete administrator
* Change password
* Logout

Possible future roles:

* Super Admin
* Administrator
* Content Editor

Permissions should be enforced server-side.

---

# 26. HOSPITAL SETTINGS

The dashboard should allow authorized administrators to manage basic hospital information.

Possible settings:

* Hospital name
* Logo
* Slogan
* Address
* Phone
* Emergency phone
* Email
* Social media links
* Mission
* Vision
* About information
* Opening hours

Public pages should retrieve appropriate information from the database.

---

# 27. DATABASE

The initial MySQL database may contain tables such as:

* `admins`
* `hospital_settings`
* `services`
* `departments`
* `staff`
* `news`
* `announcements`
* `events`
* `gallery`
* `gallery_categories`
* `appointments`
* `messages`
* `careers`

Additional tables should only be introduced when required.

---

# 28. DATABASE SECURITY

Database operations must use prepared statements.

Do not directly concatenate untrusted user input into SQL queries.

Use:

* Prepared statements
* Input validation
* Output escaping
* Secure password hashing
* Authentication
* Authorization

Database credentials must not be exposed in public source repositories.

---

# 29. PROJECT STRUCTURE

Suggested initial structure:

```text
hospital-website/
│
├── index.php
├── about.php
├── services.php
├── service-details.php
├── departments.php
├── department-details.php
├── doctors.php
├── doctor-details.php
├── facilities.php
├── appointments.php
├── news.php
├── news-details.php
├── events.php
├── gallery.php
├── careers.php
├── contact.php
│
├── admin/
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   ├── dashboard.php
│   │
│   ├── services/
│   ├── departments/
│   ├── staff/
│   ├── news/
│   ├── announcements/
│   ├── events/
│   ├── gallery/
│   ├── appointments/
│   ├── careers/
│   ├── messages/
│   ├── users/
│   └── settings/
│
├── includes/
│   ├── config.php
│   ├── database.php
│   ├── auth.php
│   ├── functions.php
│   ├── header.php
│   ├── navbar.php
│   └── footer.php
│
├── admin/includes/
│   ├── admin-header.php
│   ├── admin-navbar.php
│   ├── admin-sidebar.php
│   └── admin-footer.php
│
├── assets/
│   ├── css/
│   │   ├── style.css
│   │   └── admin.css
│   ├── js/
│   │   └── script.js
│   └── images/
│
├── uploads/
│   ├── gallery/
│   ├── news/
│   ├── staff/
│   └── services/
│
├── database/
│   └── hospital.sql
│
└── context/
    └── project-context.md
```

This structure may be modified as development progresses.

---

# 30. REUSABLE PHP COMPONENTS

Common website elements should not be duplicated unnecessarily.

Use PHP includes for:

* Header
* Navigation
* Footer
* Database connection
* Authentication
* Common functions

Example:

```php
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- Page content -->

<?php include 'includes/footer.php'; ?>
```

The admin dashboard should have its own reusable layout components.

---

# 31. DESIGN DIRECTION

The design should communicate:

* Trust
* Professionalism
* Safety
* Cleanliness
* Compassion
* Reliability

The interface should avoid looking overly complicated.

Use a clean medical/hospital visual style with:

* Clear typography
* Strong spacing
* Professional cards
* Clear calls-to-action
* Accessible forms
* Consistent buttons
* High-quality imagery

The exact color palette and branding will be determined later.

---

# 32. RESPONSIVE DESIGN

The entire website must work on:

* Desktop
* Laptop
* Tablet
* Android phones
* iPhones

The navigation should adapt to smaller screens.

Forms, tables, cards and images must not overflow mobile screens.

The administrator dashboard must also be responsive.

---

# 33. ACCESSIBILITY

Use basic accessibility practices:

* Semantic HTML
* Proper heading hierarchy
* Labels for form fields
* Alt text for images
* Sufficient color contrast
* Keyboard-friendly controls
* Clear error messages
* Clearly identifiable buttons and links

---

# 34. SECURITY REQUIREMENTS

The administrator dashboard and any submitted data must be protected.

The application should defend against common vulnerabilities such as:

* SQL injection
* Cross-site scripting (XSS)
* Unauthorized dashboard access
* Unsafe file uploads
* Session-related attacks
* Weak password storage
* Insecure direct object references

Use:

* Prepared SQL statements
* Output escaping
* Password hashing
* Session authentication
* Authorization checks
* Server-side validation
* Secure file-upload handling

Security must not rely only on client-side JavaScript validation.

---

# 35. PRIVACY PRINCIPLES

The website should collect only information necessary for its stated purpose.

Particular care should be taken with:

* Appointment information
* Contact information
* Staff information
* Uploaded files

Sensitive patient information should not be collected through ordinary public website forms unless a properly designed clinical/privacy system is introduced.

Do not display private patient information on public pages.

Do not expose database records through insecure URLs or APIs.

---

# 36. PUBLIC URL STRUCTURE

Possible URLs:

```text
/
/about.php
/services.php
/service-details.php?id=1
/departments.php
/department-details.php?id=1
/doctors.php
/doctor-details.php?id=1
/facilities.php
/appointments.php
/news.php
/news-details.php?id=1
/events.php
/gallery.php
/careers.php
/contact.php
```

Clean URLs may be introduced later if supported by the hosting environment.

---

# 37. ADMIN URL STRUCTURE

Possible URLs:

```text
/admin/login.php
/admin/dashboard.php

/admin/services/
/admin/departments/
/admin/staff/
/admin/news/
/admin/announcements/
/admin/events/
/admin/gallery/
/admin/appointments/
/admin/careers/
/admin/messages/
/admin/users/
/admin/settings/
```

Every protected page must verify authentication.

---

# 38. CONTENT MANAGEMENT PRINCIPLE

Frequently changing information should be managed through the dashboard rather than hard-coded into PHP.

Dynamic content includes:

* Services
* Departments
* Staff profiles
* News
* Announcements
* Events
* Gallery
* Careers
* Appointments
* Contact messages
* Hospital settings

The basic page structure and design components may remain in PHP files.

---

# 39. MEDICAL CONTENT PRINCIPLE

The website is not intended to replace professional medical consultation.

Health articles should be informational and should be reviewed by the hospital before publication.

The system should not automatically generate diagnoses, prescriptions or individualized medical advice.

If advanced clinical functionality is added in the future, it must be treated as a separate system with substantially stronger security, privacy and access-control requirements.

---

# 40. DEVELOPMENT RULES

When modifying the project:

1. Understand the existing project before changing it.
2. Preserve working functionality.
3. Do not unnecessarily rewrite existing files.
4. Maintain consistent naming conventions.
5. Use secure database queries.
6. Validate user input.
7. Escape output appropriately.
8. Keep public and admin functionality separated.
9. Do not invent hospital information.
10. Use placeholders until official information is provided.
11. Test each feature before moving to the next.
12. Avoid unnecessary dependencies.
13. Keep the application maintainable.
14. Keep security requirements in mind from the beginning.

---

# 41. CURRENT PROJECT STATUS

Status:

Planning stage.

No production code has been created yet.

The next development step is to establish the local PHP/MySQL development environment and create the initial project structure.

---

# 42. INFORMATION STILL REQUIRED

The following information will be supplied later.

## Hospital Information

* Hospital name
* Logo
* Slogan
* Hospital type
* Location
* Address
* Phone numbers
* Emergency number
* Email address
* Website domain

## Services

* Services offered
* Departments
* Operating hours
* Specialist services

## Medical Team

* Doctors
* Nurses/medical staff where appropriate
* Specialties
* Qualifications approved for publication
* Staff photographs

## Admissions/Appointment Information

* Appointment process
* Operating hours
* Required information
* Contact details

## Branding

* Primary color
* Secondary color
* Fonts
* Logo
* Design references

Do not invent these details.

---

# 43. FUTURE FEATURES

Potential future features include:

* Patient portal
* Doctor portal
* Staff portal
* Online patient registration
* Electronic medical records
* Laboratory results
* Prescription management
* Pharmacy management
* Billing
* Insurance management
* Online payments
* SMS notifications
* Email notifications
* Telemedicine
* Patient appointment calendar
* Advanced reporting

These features are outside the initial scope unless specifically requested.

They should not be added casually because they involve significantly greater security, privacy and regulatory considerations.

---

# 44. INITIAL DEVELOPMENT ORDER

Development should follow this sequence:

### Step 1

Set up PHP/MySQL development environment.

### Step 2

Create project folder structure.

### Step 3

Create MySQL database.

### Step 4

Create database connection.

### Step 5

Create reusable public website layout.

### Step 6

Build homepage.

### Step 7

Build About page.

### Step 8

Build Services and Departments.

### Step 9

Build Doctors/Medical Team.

### Step 10

Build Facilities.

### Step 11

Build News, Announcements and Events.

### Step 12

Build Gallery.

### Step 13

Build Careers.

### Step 14

Build Contact page.

### Step 15

Build appointment request functionality.

### Step 16

Create administrator authentication.

### Step 17

Build administrator dashboard.

### Step 18

Build content management modules.

### Step 19

Build appointment and message management.

### Step 20

Build hospital settings.

### Step 21

Improve security and validation.

### Step 22

Test responsive design.

### Step 23

Test the complete system.

### Step 24

Prepare the application for deployment.

---

# 45. IMPORTANT AI DEVELOPMENT INSTRUCTION

This document is the master context for the hospital website project.

When an AI assistant is asked to modify this project, it should use this document as the primary project reference.

Before making significant changes:

1. Understand the existing project structure.
2. Check existing functionality.
3. Preserve working functionality.
4. Follow the architecture defined here.
5. Do not invent hospital information.
6. Ask for clarification when an important requirement is genuinely unknown.
7. Prefer simple, maintainable PHP solutions.
8. Do not introduce unnecessary frameworks or dependencies.
9. Follow the security and privacy requirements.
10. Treat medical/patient data as sensitive.
11. Update this context file when important architectural decisions or requirements change.
12. Develop the application incrementally rather than generating the entire system at once.

---

# END OF PROJECT CONTEXT
