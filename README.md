# Artisan Workshop
## A Homepage for Laravel Artisans to manage their projects

Welcome to the Artisan Workshop. This is a project to create a dashboard for Laravel Artisans to manage their projects. The idea is to create a homepage for the artisans to manage their Laravel projects (Hopefully, supporting other frameworks in the future as well). The dashboard will have a few plugins to manage the projects and will be able to install/remove plugins as required.

## Roadmap

* :ballot_box_with_check: Set up Filament Base
* :black_square_button: Create Projects module
* :black_square_button: Load Projects on Sidebar/Top Nav. Load the selection in session
* :black_square_button: Create Plugin system
* :black_square_button: Create plugins Manager
* :black_square_button: Ability to Import/Export Workshop settings

### Projects Module
The toolkit will take the path of the Laravel project. Project Info: Name, location, link.

### Plugins to make

I am thinking to get the application with a few plugins already installed by default, the user should be able to install/remove plugins directly from their dashboard.

* **To-do list**: Set todo list for the project to track what needs to be done in the project. Also, find any To-do mentioned in the code and auto-fill in the list.
* **Database Explorer**: On loading the project, the system should be able to connect with the database for quick search of the data and get the schema of the table
* **PHPStan Report**: Run PHPStan and generate reports on the applicable projects.
* **Custom Wizards**: Ability to create custom wizards for automation based on project to project which should be coded in json format. (For example: Create new Module will create Model class, migration, Repository, Service classes as required)
* **Upgrade Checker**: Keep a check of any upgrades available in for the dependencies in composer.json/package.json
* **Tinker**: Web based Tinker for the project
* **Artisan Commands**: Scan all and run all artisan commands.
* **Custom Report Generator**: Generate GUI based reports in the application
* **Log Viewer**: View application logs, create notifications on specific log entry
* **Git Manager**
* **ChatGPT Integration**: Because... why not? 😜
