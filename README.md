## Damn Vulnerable Laravel App

### Intro
Damn Vulnerable Laravel App or DVLA is a lesson on how not to write a Laravel/PHP/JS based application. With intentionally misconfigured code and more. While I do include Laravel issues, there are some PHP and JavaScript centric issues in the application.

### Why?
Let me preface this by saying Laravel is a secure web framework, but like everything in programming, there are some edge cases that people need to be aware of that aren't always fully documented, some of which I've seen more than a few times. For example, there's one issue in this application which can be suprisingly easy to create in Laravel with its defaults. You should also remember that PHP, while much, much better than the days of 4.*, still has [edge cases](https://www.php.net/manual/en/language.types.type-juggling.php) that new developers may not be aware of and could lead to issues down the line. This is also an excuse for me to come up with CTF ideas.

### Story
You have recently been contracted by a company that wanted to whip their ancient multipurpose PHP application codebase into shape with a Laravel application. They are mostly finished, but want a second opinion. The problem is that almost everything they worked on has security bugs of varing severity. Can you figure out what the issue is for each, why there is an issue and most importantly, a solution that fixes the issue and still meets the clients wishes?

Make sure to check the rules in the `challenges.md` file, as that does detail the stipulations required by the company.

### Installation
- Clone the Repo.
- Make a copy of the `.env.example` and name it `.env`.
- Run `php artisan key:generate` to generate an encryption key.
- If using OSX, follow the instructions for Laravel [Valet](https://laravel.com/docs/8.x/valet).
- If you are using a Linux Distro or Windows, you should use Laravel [Homestead](https://laravel.com/docs/8.x/homestead).
- After everything is configured, run `php artisan migrate:fresh --seed`.
- Start looking at the challenges file to find a scenario to tackle, try your hand at the following: 
1. Finding the issue and exploiting it without looking at the code.
2. Figuring out why it broke (you can then look at the code).
3. Creating a fix. 
- Afterwards, you can read my [blog](https://dpopkin.github.io/) where I cover the issues in detail (or use it if you are stumped).

