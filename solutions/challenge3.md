# What:
The issue here is good old arbitary code execution. I plan to find at least one more way to execute arbitary code, but if anyone else has any ideas, go ahead and submit a PR. Anyway this issue can be found in multiple steps:
1. First, we must find out what commands are vulnerable. Trying anything will enumerate a nice list of commands for us.
2. Some quick testing shows sanitization has been set around most of the major methods of executing multiple commands (';', '&&', '||').
3. Is there any other method to chain commands?
4. Most of the commands besides `touch` and `open` are harmless, right? ...Right?
5. Enter backticks (`). which are used in scripts as a means of [command substitution](https://www.gnu.org/software/bash/manual/html_node/Command-Substitution.html).
6. Echo supports command substitution.
7. Type "echo `uname -a`" in the box and you've got ACE.

# Why:
For some odd reason, rather than use [escapeshellcmd](https://www.php.net/manual/en/function.escapeshellcmd.php) or [escapeshellarg](https://www.php.net/manual/en/function.escapeshellarg.php), the developers based their sanitization on this Stack Overflow [question](https://stackoverflow.com/questions/13077241/execute-combine-multiple-linux-commands-in-one-line) where the echo edge case is absent.

# Fix:
In this case, the company doesn't need those metacharacter arguments. So simply adding `escapeshellcmd` should fix most potential holes. But lets say they do need some, the developers should find out which ones are needed from the list in `escapeshellcmd` and only allow those characters using what they had when performing the command sanitization. 