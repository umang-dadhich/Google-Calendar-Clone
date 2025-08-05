# Google-Calendar-Clone
# 🗓️ Google Calendar Clone

A lightweight **Google Calendar Clone** built using **PHP, JavaScript, JSON, and CSS** — no database required!

This project lets users **Add**, **Edit**, and **Delete** calendar events in a clean and modern UI. All events are stored in a simple JSON file.

---

## 📸 Demo Screenshots

> Replace the below paths with your actual uploaded screenshot names

### ✅ Main Calendar View
![Calendar View]<img width="1920" height="1009" alt="Screenshot (22)" src="https://github.com/user-attachments/assets/533c4f48-bfcb-4be7-b0f5-9f896605f49a" />


### ➕ Add Event Modal
![Add Event Modal]
<img width="1920" height="1000" alt="Screenshot (23)" src="https://github.com/user-attachments/assets/9ee23a3b-0973-4d3c-885d-b9837a946c1c" />


### ✏️ Edit Event Modal
![Edit Event Modal]<img width="1920" height="1025" alt="Screenshot (24)" src="https://github.com/user-attachments/assets/7b974b33-473c-46cd-b99b-eb5fffa235b2" />


---

## 🔧 Tech Stack

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Storage:** JSON file (`events.json`)  
- **No Database Used** — fully portable and simple

---

## 🎯 Features

- 📅 Dynamic full calendar view with month/year navigation  
- ➕ Add new events using a modal form  
- ✏️ Edit existing events with dropdown selection  
- 🗑️ Delete events with confirmation  
- 🕒 Live digital clock  
- 📚 Events include course title, instructor, and time slots  
- 💾 Data stored in JSON file instead of a database  

---

## 📁 Project Structure
📁your-project/
├── index.php # Main UI and calendar logic
├── calendar.php # PHP backend for events
├── calendar.js # Frontend JS for UI and logic
├── style.css # Responsive CSS styles
├── events.json # Stores event data
├── /screenshots # Screenshots for documentation
└── README.md # You're reading this file

---
## How to Run Locally

Clone the repository:

git clone https://github.com/yourusername/google-calendar-clone.git
cd google-calendar-clone

## Start the PHP server
php -S localhost:8000

Sample JSON Format
[
  {
    "id": "abc123",
    "course_name": "Math 101",
    "instructor_name": "John Doe",
    "start_date": "2025-08-10",
    "end_date": "2025-08-12",
    "start_time": "09:00",
    "end_time": "10:00"
  }
]


