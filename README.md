# film-info
This is a WordPress, which covers basic functionality of WordPress to create film(movie) information website.


## 1 - Inside WordPress Admin Panel

1.1) Installed theme Unite. It has Bootstrap 3 inside.

1.2) Created child theme from Unite.

1.3) Added new type of post "Films" to add new film. 

1.4) Added following taxonimies to films: Genre, Country, Year and Actors

1.5) Added custom text fields "Ticket Price" and "Release Date".


## 2 - WordPress Public Front Page

2.1) Added values "Country", "Genre", "Ticket Price", "Release Date" at film page under description useing custom page in child theme.

2.2) Added values "Country", "Genre", "Ticket Price", "Release Date" at list of films useing WordPress hook.

2.3) createed shortcode to show last 5 films at right sidebar under search field.

## 3 - Instalation

3.1) Create database

3.2) Import dump data from db-dump folder in the root of project in database

3.2) Setup database connection with copy or rename wp-config-local.php to wp-config.php and change database connection information as your own


*Note: This project is not for using in production and just for learning*

