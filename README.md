# ✨ Todo List App ✨

<div align="center">
  <img src="https://api.placeholder.com/400/320" alt="Todo App Logo" width="200"/>
  <br>
  <p><b>A beautiful task management system built with Laravel 10</b></p>
  <p>
    <img src="https://img.shields.io/badge/Laravel-10-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 10"/>
    <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap 5"/>
    <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"/>
  </p>
</div>

## 🌟 Features

### 📋 Task Management
- **✅ Create** - Add colorful new tasks with titles, descriptions, and due dates
- **👁️ Read** - View all tasks in an organized, filterable list
- **🔄 Update** - Edit tasks with an intuitive interface
- **🗑️ Delete** - Remove tasks with a simple click

### 🚦 Task Status
- 🟠 **Pending** - Tasks waiting to be started
- 🔵 **In Progress** - Tasks currently being worked on
- 🟢 **Completed** - Tasks that have been finished

### 🏷️ Color-Coded Categories
- Create vibrant color-coded categories to organize your tasks
- Filter tasks by category with a visual color system
- Instantly recognize task types with custom colors

### 📱 Responsive Design
- Seamlessly switch between desktop and mobile
- Optimized interface for all screen sizes
- Beautiful and functional on any device

---

## 🖥️ Screenshots

<div align="center">
  <p><b>Task Dashboard</b></p>
  <img src="https://api.placeholder.com/900/400" alt="Task Dashboard" width="80%"/>
  <br><br>
  
  <p><b>Mobile View</b></p>
  <img src="https://api.placeholder.com/400/800" alt="Mobile View" width="30%"/>
</div>

---

## 🚀 Installation

```bash
# Clone the repository
git clone <repository-url>
cd todo-app

# Install dependencies
composer install

# Configure environment
cp .env.example .env

# Generate key
php artisan key:generate

# Run migrations
php artisan migrate

# Compile assets
npm install && npm run dev

# Start server
php artisan serve
```

Visit `http://localhost:8000` in your browser and start organizing your life! ✨

---

## 🗃️ Database Structure

<div align="center">
  <table>
    <tr>
      <th colspan="3" style="text-align:center;background-color:#FF2D20;color:white;">Tasks Table</th>
    </tr>
    <tr>
      <td><b>id</b></td>
      <td>Primary key</td>
    </tr>
    <tr>
      <td><b>title</b></td>
      <td>Task title</td>
    </tr>
    <tr>
      <td><b>description</b></td>
      <td>Task details</td>
    </tr>
    <tr>
      <td><b>due_date</b></td>
      <td>Deadline</td>
    </tr>
    <tr>
      <td><b>status</b></td>
      <td>pending/in-progress/completed</td>
    </tr>
    <tr>
      <td><b>category_id</b></td>
      <td>Foreign key to categories</td>
    </tr>
    <tr>
      <td><b>label_color</b></td>
      <td>Color for task</td>
    </tr>
  </table>

  <table>
    <tr>
      <th colspan="3" style="text-align:center;background-color:#4479A1;color:white;">Categories Table</th>
    </tr>
    <tr>
      <td><b>id</b></td>
      <td>Primary key</td>
    </tr>
    <tr>
      <td><b>name</b></td>
      <td>Category name</td>
    </tr>
    <tr>
      <td><b>color</b></td>
      <td>Display color</td>
    </tr>
  </table>
</div>

---

## 🎯 How to Use

### 📝 Managing Tasks

1. **View Tasks** - Your dashboard displays all tasks with smart filtering
2. **Add a Task** - Click the vibrant ➕ button to create a new task
3. **Edit Task** - Tap the ✏️ icon to modify any task
4. **Delete Task** - Use the 🗑️ icon to remove tasks you no longer need
5. **Task Details** - Click any task to see its complete information

### 🔖 Managing Categories

1. **Create Categories** - Set up colorful categories like "Work" 💼, "Personal" ❤️, "Shopping" 🛒
2. **Assign Colors** - Pick from a full color spectrum for each category
3. **Filter by Category** - Click a category to see only relevant tasks

### 🔍 Smart Filtering

1. **By Status** - Toggle between Pending 🟠, In Progress 🔵, and Completed 🟢
2. **By Category** - Filter using your custom color-coded categories
3. **By Due Date** - Organize tasks by upcoming deadlines ⏰

---

## 💡 Challenges & Solutions

### 🎨 Color Picker Enhancement

**Challenge:** The color picker wasn't properly integrated with the UI in category creation and updates.

**Solution:** Implemented a custom HTML5 color input with proper data binding, ensuring colors are correctly saved and displayed across the application.

---

## 🔮 Future Enhancements

- ⭐ Task priorities with visual indicators
- 🔔 Smart due date reminders
- 📱 Native mobile app version
- 🌓 Elegant dark mode
- 📊 Progress statistics and charts

---

## 📹 Live Demo

<div align="center">
  <a href="https://youtu.be/your-demo-link">
    <img src="https://api.placeholder.com/640/360" alt="Video Demo Thumbnail" width="60%"/>
    <br>
    <p>👆 Click to watch the demo!</p>
  </a>
</div>

---

## 🧠 Project Insights

This project was developed as part of a dev internship challenge, focusing on creating a practical, user-friendly task management system. The emphasis was on:

- Clean, maintainable code structure
- Intuitive user experience
- Responsive design principles
- Practical functionality over complexity

---

<div align="center">
  <p>Made with ❤️ using Laravel</p>
  <p>© 2025 | MIT License</p>
</div>
