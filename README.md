# A-PMS

<p align="center"><img src="./icon.png" width="100"></p>

## Contents

-   [About](#About)
-   [Features](#features)
-   [Todos](#todos)
-   [Installation](#installation)
-   [Technologies Used](#technologies-involved)
-   [Calculating project and tasks progress.](#Calculating-project-and-tasks-progress)
    -   [Example Calculation.](#example-calculation)

## About

It's apparently a web app, to help organise projects and involved tasks. Such that clients can also see the progress of the project in metrics at any time.

## Todos

-   [ ] Share Data (EX. Sessions) to views (Try Dot Notation)
-   [ ] Handle 419 errors
-   [ ] Custom error pages

## Features

-   [ ] Authentication and Security.
    -   [x] Login.
    -   [ ] Register.
    -   [ ] Email Verification.
    -   [ ] Password Recovery.
    -   [ ] Two Factor Authentication.
    -   [ ] Browser Sessions.
-   [ ] User Roles.
    -   [ ] Select user type after Registration (staff, client).
    -   [ ] After type selection Client gets client role.
    -   [ ] After type selection attach Staff gets no role. This means pending verification.
-   [ ] Dashboard.
    -   [ ] Projects.
    -   [ ] Project Invitations.
    -   [ ] Tasks Reminder.
-   [ ] Notifications.
    -   [ ] Projects.
    -   [ ] Invitations.
    -   [ ] Expiring tasks.
    -   [ ] Successful tasks.
-   [ ] Projects.
    -   [ ] Tasks.
        -   [ ] Invite Collaborator by email.
        -   [ ] Assign to Developer or Team.
        -   [ ] Adding Subtasks.
        -   [ ] Progress Calculation.
    -   [ ] Discussions
        -   [ ] Post.
        -   [ ] Reply.
        -   [ ] Reply.
        -   [ ] Edit - (show edited...).
-   [ ] Teams.
-   [ ] Direct Messaging and email.
    -   [ ] Chat Interface.
-   [ ] User Activities
    -   [ ] Projects
    -   [ ] Discussions

Still working on it, aiming for something big.

## Installation

-   Clone the repo

```bash
git clone https://github.com/anubra266/project-management.git
```

-   Install PHP dependencies

```bash
composer install
```

-   Install npm dependencies

```bash
npm install
```

-   Copy Environment File

```bash
cp .env.example .env
```

-   Generate App key

```bash
php artisan key:generate
```

-   Migrate Database

```bash
php artisan migrate --seed
```

-   Serve App

```bash
php artisan serve
```

## Technologies Involved

-   **[Laravel](https://laravel.com/)**
-   **[VueJs](https://vuejs.com/)**
-   **[InertiaJs](https://inertiajs.com/)**
-   **[AlpineJs](https://github.com/alpinejs/alpine)**

*   **[Jetstream](https://jetstream.laravel.com)**
*   **[Fortify](https://github.com/laravel/fortify)**
*   **[Sanctum](https://laravel.com/docs/8.x/sanctum)**
*   **[Spatie](https://spatie.be/docs/laravel-permission)**
    <br />
    <br />
    <br />

## Calculating project and tasks progress.

Project progress is average Task scores.

## Task Properties

-   Weight (1-10) - w
-   State - s (100)
    -   Todo - 5
    -   Progress - 80
    -   Testing - 10
    -   Complete - 5
    -   Cancelled - 0
-   Priority (low, normal, medium, high, highest) - p
-   Due Date - dd (100)

## Sub tasks

A Task with subtasks is in progress if at least one of the subtasks is in progress, and is completed only if all it's subtasks are completed.

## Task score

-   Initial score -> 1 = 1.
-   Weight Score = Score \* weight -> 1w.
-   State var = State Cumm / 100 -> s / 100
    -   If task has Subtasks. Progress is shared among subtasks.
        -   Variables
            -   Subtasks number -> n
            -   Completed subtasks -> c
        -   Task progress -> c / n \* 80
    -   progress = subtasks ? 80 : c / n \* 80
-   State Score = Weight Score / State var -> 1w \* s / 100.
-   Total Score = s / w
    <br />
    <br />
    <br />
    <br />

# Example Calculation

### Tasks

| Id  | Title         | Weight |     State |
| --- | :------------ | :----: | --------: |
| 1   | Learn React   |   8    | completed |
| 2   | Learn Vue     |   10   |  progress |
| 3   | Learn Svelte  |   5    |      todo |
| 4   | Learn Angular |   3    | cancelled |

<br />
<br />

### Sub Tasks

**Todo:** Would need an eloquent plan on managing task - subtask relationship, as well as assigned user.

| Id  | Title            | Weight | State     | task |
| --- | :--------------- | :----: | :-------- | ---: |
| 1   | Learn Vue UI     |   10   | completed |    2 |
| 2   | Learn Vuex       |   8    | progress  |    2 |
| 3   | Learn Vue Router |   5    | todo      |    2 |

<br />
<br />

## Calculation

Formular -> 1w \* s / 100

-   Task 1.

```js
w = 8
s = 5 + 80 + 10 + 5 = 100
result = 8 * 100 / 100 = 8
Total -> 8 / 8
```

-   Task 2.

```Js
w = 10
// Has Subtasks -> 1 Complete out of 3
s = 5 + progress = 5 + (1 / 3 * 80) = 31.7
result = 10 * 31.7 / 100 = 8
Total -> 3 / 10
```

-   Task 3.

```js
w = 5
s = 5 = 5
result = 5 * 5 / 100 = 0.25
Total -> 0.25 / 5
```

-   Task 4.

```js
/* Cancelled Task is excluded from Calculation */
```

## Average Score

```js
Progress = Total Score / Total Possible Score * 100
Total Score = 8 + 3 + 0.25 = 11.25
Total Possible Score = 8 + 10 + 5 = 23
Progress = 11.25 / 23 * 100 = 48.9%
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
