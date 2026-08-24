# PHP Blog system
A simple blog system built with PHP and MySQL. the application allows users to register, log in, create and manage blog posts, search posts, and add comments.

## Live Demo

[Live Demo](https://blog-system.rf.gd/public/)

---

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Database Design](#database-design)
- [Installation](#installation)
- [Usage](#usage)
- [Screenshots](#screenshots)
- [Future Improvements](#future-improvements)
- [Credits](#credits)
- [License](#license)

---

## Overview

### Motivation
I built this project to practice developing a PHP application that uses a MySQL database and user authentication.

### objective

The objective of the project was to create a functional blog system where users can create and manage posts, interact with posts through comments, and search for content.

### Learning Outcomes

- Built a PHP web application
- Connected PHP to a MySQL database using PDO
- Implemented user registration and login
- Used password hashing and password verification
- Implemented sessions for user authentication
- Created and used SQL queries
- Implemented CRUD functionality for blog posts
- Added a commenting system
- Added post search functionality
- Implemented user permissions and admin functionality
- Deployed the application using PHP and MySQL hosting

---

## Features

- User registration
- User login and logout
- Password hashing
- Session-based authentication
- Create blog posts
- View blog posts
- Edit your own posts
- Delete your own posts
- Add comments to posts
- Delete comments
- Search posts by title or content
- Admin permissions
- MySQL database integration

---

## Tech Stack

### Frontend

- HTML5
- PHP
- CSS

### Backend

- PHP
- PDO
- PHP Sessions

### Database

- MySQL

### Tools

- XAMPP
- phpMyAdmin
- Visual Studio Code
- Git
- GitHub

### Deployment

- InfinityFree

---

## Project Structure

```text
blog_system/
│
├── includes/
│   ├── auth.php
│   └── db.php
│
├── public/
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   ├── register.php
│   ├── create_post.php
│   ├── edit_post.php
│   ├── delete_post.php
│   ├── delete-comment.php
│   ├── post.php
│   └── search.php
│
└── sql/
    ├── schema1.sql
    └── admin.sql
