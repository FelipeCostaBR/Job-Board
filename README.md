# Job Board

## :pushpin: Objectives of the project

* Write a script to read the CSV file(jobs.csv) and store the data in a structured way.

* Users should be able to view a list of jobs with title, location and date.

* Users should be able to click on a job to view more details about it.

## :camera_flash: Job Board - usage instructions.


![Job Board gif](assets/Jobs-board.gif "app")

### Data Relation Structure
![Data Relation Structure](assets/jobs-board-ER-diagram.png "data relation structure")

### Technologies and Dependencies: 
* PHP Lumen
* ReactJs - Dependencies (axios, prettier, react-loading, react-router-dom, styled-components)



## Setup
* Install [Docker](https://docs.docker.com/get-started/)

### Clone the repository
* $ git clone https://github.com/FelipeCostaBR/Job-Board.git
* $ cd employee_onboarding
   
### Build and Run:
* $ `docker-compose build`
* $ `docker-compose up`

* Open a new terminal

### Insert data into the database
* $ `docker-compose exec coding-challenge-backend php artisan migrate`

## Open a the browser and access the localhost to use the application
* React frontend: http://localhost

