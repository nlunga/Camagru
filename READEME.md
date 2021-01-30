# Camagru

Camagru is a small web application that allows a user to make basic photo and video editing using your webcam and some predefined images.

## Objective

Create a Web Application with elements similar to Instagram / Snapchat. Users should be able to capture a photos using the webcam or upload photos in the absence of a webcam. They should be able to select an image in a list of superposable images (for instance a picture frame, or other “we-don’t-wanna-know-what-you-are-using-this-for” objects), take a picture with their webcam and admire the result that should be merging both pictures.  
All captured images should be public, likeable and comment-able.

Allowed languages:

- PHP (Server-side)
- HTML
- CSS
- JavaScript

No frameworks allowed with the exception of CSS frameworks that does not user any forbidden JavaScript

## Features

### User Features

- The application should allow a user to sign up by asking at least a valid email address, a username and a password with at least a minimum level of complexity.
- At the end of the registration process, the user should confirm their account via a unique link sent to the email address fulfilled in the registration form.
- The user should then be able to connect to the application, using their username and password. They also should be able to tell the application to send a password re-initialization mail, if they forget their password.
- The user should be able to disconnect in one click at any time on any page.
- Once connected, the user should be able to modify their username, email address or password.

### Gallery Features

- This part is to be public and must display all the images edited by all users, ordered by date of creation. It should also allow (only) a connected user to like them and/or comment them.
- When an image receives a new comment, the author of the image should be notified via email. This preference must be set as true by default but can be deactivated in the user’s preferences.
- The list of images must be paginated, with at least 5 elements per page.

### Editing Features

Editing / uploading should be accessible only to users that are authenticated/connected and reject all other users that attempt to access it without being successfully logged in.

This page should contain 2 sections:

- A main section containing the preview of the user’s webcam, the list of superposable images and a button allowing to capture a picture.
- A section displaying thumbnails of all previous pictures taken.

Superposable images must be selectable and the button allowing to take the picture should be inactive (not clickable) as long as no superposable image has been selected.

- The creation of the final image (so among others the superposing of the two images) must be done on the server side, in PHP.
- Because not everyone has a webcam, you should allow the upload of a user image instead of capturing one with the webcam.
- The user should be able to delete his edited images, but only his, not other users’ creations.


## Requirements

- A MySQL instance, eg. [Xampp](https://www.apachefriends.org/download.html) or [Mamp](https://bitnami.com/stacks/infrastructure)
- PHP (pre-installed with Xampp or Mamp)
- HTML
- CSS
- JavaScript
- For editing ONLY: a text editor, eg. [VS Code](https://code.visualstudio.com/)

## Constraints & Mandatory

The project should contain imperatively:

- A index.php file, containing the entering point of the site and located at the root of the file hierarchy.
- A config/setup.php file, capable of creating or re-creating the database schema, by using the info contained in the file config/database.php.
- A config/database.php file, containing the database configuration, that will be instanced via PDO in the following format:

`DSN` (Data Source Name) contains required information needed to connect to the database, for instance `mysql:dbname=testdb;host=127.0.0.1`. Generally, a DSN is composed of the PDO driver name, followed by a specific syntax for that driver. For more details take a look at the PDO doc of each driver1.
<!-- ## Installation

Use the package manager [pip](https://pip.pypa.io/en/stable/) to install foobar.

```bash
pip install foobar
```

## Usage

```python
import foobar

foobar.pluralize('word') # returns 'words'
foobar.pluralize('goose') # returns 'geese'
foobar.singularize('phenomena') # returns 'phenomenon'
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/) -->