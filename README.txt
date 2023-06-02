Online Movie Store "Blu Ray Movies"

Team 9
Woo Sung Lee: Backend, database, query, php
Haopeng Zhang: Frontend, html, php, css
Okwuosar Nnyagu: Frontend, html, php, css 
Eric Chow: Backend, database, php, js

All members participated in all meetings, our way of collaboration is mostly working during meetings, 
but members also made some contribution during their free time. During meetings we share ideas and code 
through the feature of live share extension on visual studio code, which allows everyone to edit on different 
or same files at the same time. We also used github to make sure all files and changes are up to date. 
This way everyone had a deep understanding on all parts of code files and kept track of all changes made, 
we didn't have to spend extra time trying to explain everything to everybody after each milestone.

Structure of our files:
Main directory:
    category_image(folder containing a picture for each category)
    css(folder containing all css files)
    img(folder containing pictures used on head and background)
    js(folder containing javascript file)
    movie_image(folder containing all pictures for each movie product, whenever a new movie is added the picture uploaded for that movie will be here)
    php(folder containing all php files)
    sql(folder containing sql file)
    README.txt

To run the webpage:
Put the main folder under this path in the "xampp" folder, in this case the main folder is named "4300":
..\xampp\htdocs\4300

Start both "Apache" and "MySQL" on xampp

Go to localhost/phpmyadmin 

Make a new database and import our sql file called "moviestore.sql" in sql folder

Next in the browser, type the following link and press "enter" to navigate to the Homepage, given the main folder name is "4300":
localhost/4300/php/Homepage.php

Features:
1. Homepage: 
    -Displays all 8 categories that a users can click on to navigate to the page which contains all films from that category
    -A search bar on the top right of the page
    -Displays a navbar for navigating to certain pages: 
        while logged in as user "cart" and "logout" will be displayed and "login" will not
        while logged in as admin "cart", "logout" and "modify Movies" will be displayed and "login" will not
        Only when logged in will the user be able to see a logout button in the navbar which logs the user out

2. Category pages: 
    -A dynamic page 
    -Shows list of products in this category 
    -User can navigate to a product page by clicking on the movie cover that they are interested in

3. Product pages: 
    -A dynamic page 
    -Displays the information on a certain movie product 
    -User has access to an "add to cart" button which adds the product to cart once logged in

4. Login page: 
    -2 input boxes that allows user to input email and password 
    -A "login" button to log in
    -A register button that navigates to register page 
    -A failed attempt will be notified 

5. Registration: 
    -Input boxes for: 
        full_name(required)
        phone_number(required,format restricted: 10 digits number, *** ******* or *** *** ****, ***-***-*** or ***-*******)
        user_email(unique, required, format restricted:****@****) 
        confirm_email(required, match with email)
        password(required, input value hidden)
        confirm_password(required, match with password)
        address(required)
        city(required)
        state(required)
        zip(required, format restricted: 5 digits number)
        payment_card_number(required, format restricted, 16 digits number, with or without space in between every 4 digits)
        Exp_date(required, format restricted: **/** and has to be a valid month 01-12)
        name_on_card(required)
        security_code(required, format restricted: 3 or 4 digits number)
    -submit button -> goes to homepage if successful and adds info to the database, if email is already used then show error message
    -Any type of invalid input will be alerted in an alertbox after hitting the submit button and shows correct format
    -If confirm email or password does not match an alertbox will appear at top of the screen 

6. Cart: 
    -Only accessible from the navbar if logged in
    -Displays all the items in the cart 
    -User can delete an item using the delete button 
    -Displays the subtotal and total after tax

7. Order confirmation page:
    -Displays a message for thanking customer
    -Displays order summary
    -Displays total price after tax

8. Logout:
    -Logs the user out and navigate to homepage

8. Modify movies page: 
    -Displays a table with all the movies we have by category and title from the database
    -Delete buttons for deleting a movie from the database
    -A button that navigates to add movie page

9. Add movie page:
    -Inputs for adding a movie to the database:
        drop down menu to select category
        a button to select a file to upload for the movie cover image 
        input box for name (required)
        input box for price (required, format restricted: ***.** number)
        input box for director (required)
        input box for description (required, resizable)
    -A button that adds movie to the database 
    -Any type of invalid input will be alerted in an alertbox after hitting the submit button and shows correct format

Database:
	Tables:
	1. movies: category_name, ID(also used to reference the cover picture file, unique), name, price, director, description
	2. user: full_name, email(unique), password, phone, address, state, city, zip, card_num, name_on_card, exp_date, sec_code, admin(indicator, 1 for admin 0 for customer)
    3: cart: email(form user table), ID(form movies table)


Admin Account: admin@bluray.com password: password
            
