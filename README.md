# SaveSmart

SaveSmart is a Laravel-based application designed to help users manage their finances by tracking income, expenses, and financial goals. It offers an intuitive interface for creating, updating, and deleting financial records, as well as managing user profiles.

## Features

### User Management
- Secure registration and authentication
- Add multiple users under the same family account
- Update and delete user accounts
- Manage user profiles

### Income Management
- Create, update, and delete income records
- View a list of income records
- Search for specific income records

### Expense Management
- Create, update, and delete expense records
- View a list of expense records
- Search for specific expense records
- Add customizable categories (e.g., Food, Housing, Entertainment, Savings)

### Financial Goal Management
- Create, update, and delete savings goals
- Track progress towards financial goals
- Display progress of saved amounts

### Budget Visualization and Optimization
- Graphical visualization of finances (tables, charts)
- Budget optimization algorithm based on logical rules
- Implementation of the 50/30/20 method (50% Needs / 30% Wants / 20% Savings)
- Export data in PDF or CSV format

## Technologies Used
- **Laravel**: PHP framework used for development
- **postgresql**: Database for storing information
- **PHPUnit**: Unit and functional testing tool
- **tailwind**: CSS framework for responsive design
- **apex.js**: For displaying graphical visualizations

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/Youcode-Classe-E-2024-2025/Anouar-elbarry_saveSmart-.git
    ```

2. Navigate to the project directory:
    ```bash
    cd savesmart
    ```

3. Install dependencies:
    ```bash
    composer install
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Run migrations to set up the database:
    ```bash
    php artisan migrate
    ```

6. Start the local development server:
    ```bash
    php artisan serve
    ```

7. Access the application:
    Open `http://localhost:8080` in a web browser.

## Running Tests

To run the application tests, use the following command:

```bash
php artisan test
```
Contributors
Contributions are welcome! To propose changes:

Fork the repository
Create a new branch
Make modifications and commit them
Open a Pull Request