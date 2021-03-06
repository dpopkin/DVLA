# Challenges: 

## Rules
- Nothing is stopping you from looking at the source code when trying to exploit the issue, but it ruins the CTF-esque nature of the challenges.
- Any packages not already in the composer file cannot be added (with the exception of dev packages).
- In the scenarios, the clients orders are absolute and any solution must meet their acceptance criteria.

## Logins
You need a set of logins to access the main pages of DVLA. Here is a list of all available users you have access to. Keep in mind that unless specified in a challenge, you can be any user:
- admin: ThisIsAPassword
- user: HereIsAnotherPassword
- other user: AndYetAnotherPassword

## Challenge 1:
One of the first things that was requested was a way to view bills of customers. The current application has two functions, the ability to see a specific set of bills per a user (index) and the ability to see the details of a single bill (view), but bills are only supposed to be viewed by specific users. Can you gain access to a bill you can't see in the index? Click the bills link to begin.

### Hints
- Click the `bills` link to begin.
- As long as the index and view pages work, the client is happy.
- This is a much more common issue than one would expect and you see this specific issue all across the web.
- Every user has access to different bills.
- Index is fairly static.

## Challenge 2:
The next major part of their old codebase was an items database they sold to a small retail store. Like billing, it uses index and view to show all items. But it also gives any user the option to edit the description and location of it in the store. However, due to past abuse, only a super admin can change details like price. You don't have access to the super admin role, but is it still possible to say change the price of the bread to the price of the iPhone and vise-versa?

### Hints
- Click the `items` link to begin.
- The client must still be able to edit the price later as a super admin.
- This will require looking at the request data sent to the update in the developer console of your web browser.
- Look closly at the request data.
- Assume the column names in the database are as simple as you think they are.

## Challenge 3:
A company wanted a web application that could access low level commands on a server ("Use exec()" was their exact words). The developers, rightfully fearing abuse, locked it down to use only the whitelisted commands the company needed to do their job with Laravel validation and implemented some string parsing to remove metacharacters. But is it still possible to execute arbitary code?

### Hints
- First of all, this WILL execute commands on YOUR machine. YOU are RESPONSIBLE if you type `rm -rf --no-preserve-root /` or something similar into the line.
- Click the `commands` link to begin.
- Users must still have access to the base commands.
- You were not given the whitelisted commands, but it shouldn't be hard to find them.
- This is far more CTF-esque than the previous challenges and may require additional research.
- Per the client orders, EVERY whitelisted command runs without any restrictions besides the metacharacters.

## Challenge 4:
The Admin section of the site (`/admin`) has middleware set to protect it and there's no direct link to it, so there should be no issues. But can you find a way to access the admin page?

### Hints
- The condition for the auth logic itself must not be changed, but everything around it can.
- This is a multipart challenge.
- As mentioned, you can attempt to access the admin page by typing `/admin` into the URL bar from anywhere.

## Challenge 5:
The company has just started work on a task checklist that uses nothing but JavaScript and Vue.js for now. They want to allow multiple methods of input for tasks, but only JSON is implemented at the moment. They had just started to added permissions on the option to delete, so no one should have access to it yet, but someone on the team managed to access the button. Can you figure out what they did?

### Hints
- Click `Tasks` to start.
- Tasks are supposed to be sent in the following JSON format `{"priority":"task"}`. meaning the syntax should look something like: `{"Due Soon":"File Taxes"}`.
- This is a relatively new issue in the JS world, but we've technically covered this before.
- Vue is running in development mode. Meaning it should be easy to start debugging it.
- Try to save a task with the same priority as the first task. What happens?