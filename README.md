[![Hng Internship](https://hng.tech/img/brand-logo.png)](https://hng.tech)

# HNGi7 Task 2 &mdash; Team Falcon :eagle:

## Instructions For Team Members

- Make sure you are on a personal computer
- [Fork] this repository by clicking on the fork button
- Clone your forked repository
- Checkout (I.e Change your branch) to **submissions** branch using ```git checkout -b submissions``` 
- Refresh then go to the **scripts** directory and:
  - create a new file in a server-side scripting language of your choice (i.e. PHP, Python or Javasript) a statement to return ```Hello World, this is [full name] with HNGi7 ID [HNG-ID] using [language] for stage 2 task. [email]```
  - E.g. ```"Hello World, this is CIROMA CHUKWUMA ADEKUNLE with HNGi7 ID HNG-00000 using Python for stage 2 task. adekunle.c.ciroma@gmail.com"```
  - with naming format _“yourhngid.extension”_ e.g HNG-00000.php, HNG-00000.py, HNG-00000.js
- Replace:
  - **[full name]** with your actual _fullname_,
  - **[id]** with your actual _HNG-ID_ found on your **[HNGBoard]**,
  - **[language]** with the _programming language_ you used and
  - **[email]** with your email.
- Python programmers should not forget that their output should be 'streamed' I.e [flushed]
- Add your commit message to the bottom (short description of what you did)
- Then create a pull request and type the title of the merge and a description of what you did. **Make sure to change the branch to 'submission'**.

#### N.B In event you notice a merge conflict when making your pull request, pull from the original repository by setting it as an upstream
-  Command to set upstream: ```git remote add upstream https://github.com/anubabajide/HNG-Task-2-Team-Falcon```
-  Command to pull from upstream: ```git pull upstream submissions```

Here is the link to the live server: https://teamfalcon.herokuapp.com/

## Instructions For The Mentors

- Clone the Repository
- Install the following dependencies
  - Python (3.6.10)
  - Php (7.4.6)
  - apache (2.4.43)
  - nginx (1.18.0)
  - Node.js (14.4.0)
  - Ruby (2.5.1)
  - JDK (1.8)
  - Maven (3.6.2)
- Run the PHP file using the dependencies installed
- index.php - Results are displayed in tabular format
- index.php?json - Results are presented in json format


[fork]: https://help.github.com/en/enterprise/2.13/user/articles/fork-a-repo#:~:text=A%20fork%20is%20a%20copy,point%20for%20your%20own%20idea.
[HNGBoard]: https://board.hng.tech/
[flushed]: https://www.sitepoint.com/faster-web-pages-php-buffer-flush
