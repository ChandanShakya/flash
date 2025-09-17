# Flash - Typing Speed Test Platform

Flash is a web-based typing speed calculator and skill development platform that helps users enhance their typing abilities through timed tests, performance tracking, and detailed analytics.

## Features

### 🚀 Core Features
- **Typing Speed Tests**: Timed typing tests with real-time WPM, CPM, and accuracy calculations
- **Multiple Difficulty Levels**: Three levels (Easy, Medium, Hard) with varying time constraints
- **Performance Tracking**: Detailed progress monitoring for registered users
- **Virtual Keyboard**: Interactive on-screen keyboard with key highlighting
- **Mistake Detection**: Advanced error detection using Levenshtein distance algorithm
- **Results Analytics**: Comprehensive charts and statistics for performance analysis

### 👤 User Management
- User registration and authentication
- Password recovery system
- Session management
- Personal result history and downloads

### 📊 Metrics Calculated
- **WPM (Words Per Minute)**: Standard typing speed measurement
- **CPM (Characters Per Minute)**: Character-based speed calculation
- **Accuracy**: Percentage of correctly typed characters
- **Mistake Count**: Total errors using Levenshtein distance

## Project Structure

```
flash/
├── src/
│   ├── home.php              # Main landing page
│   ├── typing_test.php       # Core typing test interface
│   ├── login.php             # User authentication
│   ├── register.php          # User registration
│   ├── results.php           # Performance analytics
│   ├── typing_tips.php       # Typing improvement tips
│   ├── about_us.php          # Platform information
│   ├── menu.php              # Navigation component
│   └── database_connection.php # Database configuration
├── assets/
│   ├── css/                  # Stylesheets
│   ├── images/               # UI images and assets
│   └── js/                   # JavaScript files
├── sql/
│   └── project.sql           # Database schema
├── composer.json             # PHP dependencies
└── index.php                 # Entry point
```

## Database Schema

The project uses MySQL with the following main tables:

- **`user`**: User account information (id, fname, lname, uname, password, email)
- **`result`**: Typing test results (result_id, uname, level, wpm, mistake, cpm, date)
- **`download`**: Downloadable result records with user details

### Key Database Features
- Foreign key relationships between users and results
- Automatic triggers for data synchronization
- Cascade delete operations for data integrity

## Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Composer (for development dependencies)

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd flash
   ```

2. **Database Setup**
   ```bash
   # Import the database schema
   mysql -u your_username -p your_database < sql/project.sql
   ```

3. **Configure Database Connection**
   Update the database credentials in [`src/database_connection.php`](src/database_connection.php):
   ```php
   private static $host = 'localhost';
   private static $user = 'your_username';
   private static $pass = 'your_password';
   private static $db = 'your_database';
   ```

4. **Install Dependencies** (for development)
   ```bash
   composer install
   ```

5. **Web Server Configuration**
   - Point your web server document root to the project directory
   - Ensure PHP is properly configured
   - Enable URL rewriting if needed

## Usage

### For Guest Users
1. Visit the homepage to learn about the platform
2. Navigate to "Start Typing" for immediate testing
3. View typing tips for skill improvement
4. Results are temporary and not saved

### For Registered Users
1. **Register**: Create an account via the registration form
2. **Login**: Access your personal dashboard
3. **Take Tests**: Choose difficulty levels and track progress
4. **View Results**: Access detailed analytics and download reports
5. **Track Progress**: Monitor improvement over time

### Difficulty Levels
- **Level 1 (Easy)**: Longer time limits, simpler text
- **Level 2 (Medium)**: Moderate time constraints
- **Level 3 (Hard)**: Shorter time limits, complex text

## Development

### Code Quality Tools
The project includes development tools configured in [`composer.json`](composer.json):
- **Laravel Pint**: PHP code style fixer
- **Rector**: PHP code modernization tool

### Running Development Tools
```bash
# Fix code style
vendor/bin/pint

# Modernize PHP code
vendor/bin/rector process
```

## Technical Implementation

### Speed Calculation Algorithm
The platform uses sophisticated algorithms for accurate measurements:

- **Levenshtein Distance**: For precise mistake detection
- **Real-time Calculation**: Live WPM/CPM updates during typing
- **Accuracy Metrics**: Character-level accuracy tracking

### Security Features
- Password hashing using PHP's password_hash()
- SQL injection prevention
- Session management
- Input validation and sanitization

## Browser Compatibility

- Modern browsers with JavaScript enabled
- Responsive design for mobile and desktop
- CSS Grid and Flexbox support required

## Contributing

1. Fork the repository
2. Create a feature branch
3. Implement your changes
4. Run code quality tools
5. Submit a pull request

## Author

**Adarsha Shakya** - Original developer and maintainer

## License

This project is open source. Please check the license file for more details.

## Contact

- **Location**: Kathmandu, Nepal
- **Phone**: +977 9843462125
- **Email**: Flash@gmail.com

---

*Unlock your typing potential with Flash - The key to more efficient typing!*