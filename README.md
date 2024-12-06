# phpGuessTheGame

This is a simple web-based quiz game where users are shown images from various video games and are asked to guess the correct name of the game. The game is powered by PHP and uses a simple exam-like structure with randomized questions for an engaging user experience.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)

## Features

- Displays images from a random set of video games.
- Users input their guess for each image.
- Tracks the user's progress through the quiz.
- Serializes the exam data to preserve state across page reloads.
- Provides feedback when the user guesses correctly or incorrectly.

## Technologies Used

- **PHP**: The backend programming language for handling logic and form submissions.
- **HTML**: Structure and layout of the web pages.
- **CSS**: Styling for the quiz interface.
- **File System**: For storing images and game data.

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yingwastaken/phpGuessTheGame.git
    ```

2. Navigate to the project directory:
    ```bash
    cd phpGuessTheGame
    ```

3. Set up a PHP-enabled server. You can use local development environments like [XAMPP](https://www.apachefriends.org/index.html) or [MAMP](https://www.mamp.info/en/).

4. Place the project in the `htdocs` (XAMPP) or `www` (MAMP) directory.

5. Access the project in your browser via:
    ```bash
    http://localhost/phpGuessTheGame/
    ```

## Usage

1. Open the application in your web browser.
2. The first question will appear with an image.
3. Type your guess in the input field and press "GUESS".
4. If you answer correctly, you will move to the next question; otherwise, you can try again.
5. Your progress will be tracked and serialized to ensure the state is preserved across page reloads.

## Project Structure

/phpGuessTheGame
    /images          # Contains images used for the quiz questions. Each image should represent a video game.
      /seccion1
        /arcade
        /consola
        /pc
      /seccion2
        /arcade
        /consola
        /pc
      /seccion3
        /arcade
        /consola
        /pc
    /class           # Contains PHP classes responsible for the logic and structure of the quiz.
        Examen.php   
        Pregunta.php 
        Videojuegos.php
        Imagen.php
    index.php       
    style.css     
    README.md        # This file, which provides an overview of the project and how to use it.
