
# SKILLSPRINT: A PHP, MySQL, JQuery, and Quill.js Open-Source Skill-Sharing Platform.

## Languages Used:
1. PHP
2. JavaScript

The project is built on `HTML5` and `Bootstrap 5`.

## Getting Started

To get started with this project:

1. **Clone the Repository**
```bash
    git clone https://github.com/patrickkariukikabita/skillsprint.git
```
    or download the code from this repository.

2. **Upload the Project to the Server Root**

    Upload all project files to the root directory of your web server. Example:
```bash
    mv SKILLSPRINT /opt/lampp/htdocs/
```

3. **Navigate to the Project Directory**
```bash
    cd SKILLSPRINT
```

4. **Create a Database**

    Create a MySQL database named `SKILLSPRINT` and upload the `SKILLSPRINT.sql` file to populate the database. You can use tools like phpMyAdmin or the MySQL command line for this.

5. **Configure Database Connection**

    Open the `config.php` file in the `resources` directory and update the database connection settings with your database credentials.
```php
    $serverhost = "localhost";
    $dbusername = "[your database username]";
    $dbpassword = "[your database password]";
    $dbasename = "SKILLSPRINT";
    $siteName = "SKILLS PRINT"; // Change this to modify the site name
```

6. **Dependencies**

    This project uses the following dependencies:
    - jQuery 3.6.3
    - Quill.js
    - FontAwesome 4.7.0 icons

7. **Key Features**

    - User registration
    - Category creation
    - Skill creation
    - Content posting
    - Trending categories section
    - Trending authors section
    - Featured content
    - WYSIWYG TinyMCE editor

8. **Start the Development Server**

    If you're using a local server environment like XAMPP, WAMP, or MAMP, start the server and ensure that Apache and MySQL are running. If you're on a live server, ensure the server is configured to handle PHP and MySQL.

9. **View the Application**

    Open your web browser and navigate to `http://localhost/SKILLSPRINT` (for a local server) or your domain name (for a live server) to view and interact with the blog application.

    You can try the project out using the credentials:
```javascript
    username: abc@gmail.com
    password: 1111
```

## Project Overview

### Screenshots

#### Homepage
![Homepage top section](resources/imgs/homepage1.png)
![Homepage bottom section](resources/imgs/homepage2.png)

#### User Homepage
![User Home](resources/imgs/userHome.png)

#### Create a Skill
![Create a skill](resources/imgs/createSkills.png)

#### Create Content
![Create content](resources/imgs/createContent.png)

#### Sample Content
![Sample content](resources/imgs/sampleContent.png)

## Visit My Site

- [www.bytemast.com](https://bytemast.com)

Feel free to explore the project, provide feedback or suggestions, and consider giving this project a star if you like it.
