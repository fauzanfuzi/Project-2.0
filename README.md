# PocketPlanner
WebApp Project
- MUHAMMAD NURFAUZAN BIN MOHD FUZI 2210669
- FADLY MUHAMMAD 2117999
- ISKANDAR ZULQARNAEN BIN MOHAMMED 2215393
- MOHAMAD IRFAN FIRDAUS BIN MOHD BASRI 2218453	

Website functionality(Finalized)
- User need to login
- if no account exist, just register then login
- User will go to dashboard
- below the dashboard nav bar, there is Pocket Planner
- Click the Pocket planner Nav Bar to browse in the system
- Setting page allow the user to insert the data which will be displayed on home page and financial page

7/1/2025 
- Laravel Installed
- connection to database done
- table for testing done
- migration done
- model for testing done
- controller testing done
- testing view created
- route for testing created. Connected to controller
- testing page launched successfully
- testing create page created
    >make create function in testingcontroller created
    >form created
    >route to store function in controller
    >controller insert data in db
    >data seen in testing table
- testing index page use for data retrival
    >create table and insert data from db
    >data retrival successful
    >add edit button
    >edit button is route to controller edit function
- edit page created which is almost same as create page
    >code from create page copied to edit page
    >using put method
    >route to update controller
    >test updating the data
    >updating data success
    >adding delete button 
    >route tu router then controller
    >data deleted successfully

Project Pocket Planner

7/1/2025

-master.layout created(for navigation bar)
-settings,home,expenses,profile created using blade engine
-controller for each page created

8/1/2025
Setting Page

- There will be 4 tables which are balances, budgets, upcomingbills and expenses
- input text for every data needed done
- Balances table successdfully create and connected, budget table ready for CRUD
- Budgets table successdfully create and connected, budget table ready for CRUD
- upcomingbills table successdfully create and connected, budget table ready for CRUD
- expenses table successdfully create and connected, budget table ready for CRUD
- when expense added, the balance will automatically deducted

9/1/2025

- Expenses page changed to Finance page because redundant with expenses table
- Timeframe and records for the page has too much error
- the records successfully retrieve from finance controller. Last time failed because using wrong controller
- for total amount and budget successfully done
- finance page done

- starting home page
- the UI changed
- current month and "how many left before budget reached" successed
- total due for current month and balance successfully retrieve
- progress bar for creation attempt
- pregress bar current month for total expenses, Expected Expenses(totalexpenses + total due bills) and budget create succesfully
- upcoming bills part completed. sort from shortest days left to longest days left from top to bottom

- finance page which is the expenses part sorted from latest to oldest from top to bottom

- every saethetic design has applied to every page

16/1/2025
Just noticed that auth is a requirement for the project
-project restarted but not from scratch and also new github
-old asset retrieve to new laravel project with jetstream(without testing part)
-the UI inserted in dashboard(master.layout no longer needed)
- welcome page is redesign

NOTES!!!!!
- for some reason github not inlude .env file
- .env file included manually in github website
- if error encounter just edit this part
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=PocketPlanner2.0
DB_USERNAME=root
DB_PASSWORD=




